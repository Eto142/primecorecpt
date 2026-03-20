#!/usr/bin/env python3
"""
多线程文件内容搜索和替换工具

用法: 
搜索: python file_search_replace_mt.py -d <目录1> [<目录2> ...] -t <文件类型> -c <搜索内容> [-o <输出文件>] [-j <线程数>]
替换: python file_search_replace_mt.py -d <目录1> [<目录2> ...] -t <文件类型> -c <搜索内容> -r <替换内容> [-o <输出文件>] [-b] [-j <线程数>]

示例: 
搜索: python file_search_replace_mt.py -d /home/user/project1 /home/user/project2 -t py -c "import os" -o path.log -j 4
替换: python file_search_replace_mt.py -d /home/user/project1 /home/user/project2 -t py -c "import os" -r "import sys" -b -j 4
"""

import os
import argparse
import sys
import shutil
from datetime import datetime
import threading
import queue
import time

# 线程安全的日志队列
log_queue = queue.Queue()
# 线程安全的结果计数器
result_counter = {'found': 0, 'replaced': 0}
# 线程锁，用于更新计数器
counter_lock = threading.Lock()
# 线程锁，用于控制输出
print_lock = threading.Lock()

def worker(file_queue, file_type, content, replace_with, backup):
    """
    工作线程函数，处理队列中的文件
    
    Args:
        file_queue: 包含文件路径的队列
        file_type: 文件类型
        content: 要搜索的内容
        replace_with: 要替换的内容，如果为None则不替换
        backup: 是否在替换前创建备份
    """
    while True:
        try:
            # 从队列获取文件，如果队列为空，不等待直接退出
            file_path = file_queue.get(block=False)
        except queue.Empty:
            # 队列为空，线程退出
            break
        
        try:
            # 确保文件类型匹配
            if not file_path.endswith(f".{file_type}"):
                #file_queue.task_done()
                continue
                
            # 读取文件内容
            try:
                with open(file_path, 'r', encoding='utf-8', errors='ignore') as f:
                    file_content = f.read()
            except Exception as e:
                log_queue.put(f"无法读取文件 {file_path}: {str(e)}")
                # file_queue.task_done()
                continue
            
            # 检查文件是否包含搜索内容
            if content in file_content:
                # 找到匹配，更新计数器
                with counter_lock:
                    result_counter['found'] += 1
                
                # 记录匹配行
                matches_in_file = []
                for i, line in enumerate(file_content.splitlines(), 1):
                    if content in line:
                        matches_in_file.append((i, line.strip()))
                
                # 构建日志消息
                result = f"\n文件: {file_path}\n"
                for line_num, line_content in matches_in_file:
                    result += f"第 {line_num} 行: {line_content}\n"
                
                # 将结果放入日志队列
                log_queue.put(result)
                
                # 如果需要替换
                if replace_with is not None:
                    # 创建备份
                    if backup:
                        backup_path = f"{file_path}.bak"
                        shutil.copy2(file_path, backup_path)
                        log_queue.put(f"创建备份: {backup_path}")
                    
                    # 替换内容
                    new_content = file_content.replace(content, replace_with)
                    
                    # 写回文件
                    with open(file_path, 'w', encoding='utf-8') as f:
                        f.write(new_content)
                    
                    # 更新替换计数器
                    with counter_lock:
                        result_counter['replaced'] += 1
                    
                    log_queue.put(f"已替换: {file_path}")
        
        except Exception as e:
            log_queue.put(f"处理文件 {file_path} 时出错: {str(e)}")
        
        finally:
            # 标记任务完成
            file_queue.task_done()

def logger_thread(log_file_path, stop_event):
    """
    日志线程，将日志队列中的消息写入文件和控制台
    
    Args:
        log_file_path: 日志文件路径
        stop_event: 停止事件，用于通知日志线程退出
    """
    with open(log_file_path, 'a', encoding='utf-8') as log_file:
        while not stop_event.is_set() or not log_queue.empty():
            try:
                # 从队列获取日志消息，等待1秒
                message = log_queue.get(timeout=1)
                
                # 输出到控制台和文件
                with print_lock:
                    print(message)
                log_file.write(message + "\n")
                log_file.flush()
                
                # 标记任务完成
                log_queue.task_done()
            
            except queue.Empty:
                # 队列暂时为空，继续等待
                continue

def search_and_replace_files(directories, file_type, content, output_file="path.log", replace_with=None, backup=False, num_threads=4):
    """
    多线程在多个指定目录中搜索包含指定内容的指定类型文件，并可选择替换内容
    
    Args:
        directories (list): 要搜索的目录路径列表
        file_type (str): 文件类型（扩展名，不包含点）
        content (str): 要搜索的内容
        output_file (str): 输出日志文件名
        replace_with (str, optional): 替换的内容，如果为None则不替换
        backup (bool): 是否在替换前创建备份
        num_threads (int): 要使用的线程数
    
    Returns:
        tuple: (找到匹配内容的文件数量, 替换操作的文件数量)
    """
    # 验证所有目录是否存在
    valid_directories = []
    for directory in directories:
        if os.path.isdir(directory):
            valid_directories.append(directory)
        else:
            print(f"警告: 目录 '{directory}' 不存在，将被跳过")
    
    if not valid_directories:
        print("错误: 没有有效的目录可供搜索")
        return 0, 0
    
    # 确保文件类型格式正确
    if file_type.startswith('.'):
        file_type = file_type[1:]
    
    # 重置计数器
    result_counter['found'] = 0
    result_counter['replaced'] = 0
    
    # 创建文件队列
    file_queue = queue.Queue()
    
    # 写入日志头部
    with open(output_file, 'w', encoding='utf-8') as log_file:
        header = f"操作时间: {datetime.now().strftime('%Y-%m-%d %H:%M:%S')}\n"
        header += f"目录: {', '.join([os.path.abspath(d) for d in valid_directories])}\n"
        header += f"文件类型: .{file_type}\n"
        header += f"搜索内容: {content}\n"
        header += f"线程数: {num_threads}\n"
        
        if replace_with is not None:
            header += f"替换为: {replace_with}\n"
            if backup:
                header += "已创建备份文件\n"
        
        header += "-" * 80 + "\n"
        
        print(header)
        log_file.write(header)
    
    # 收集所有匹配的文件路径
    start_time = time.time()
    print(f"正在收集文件列表...")
    
    file_count = 0
    for directory in valid_directories:
        for root, _, files in os.walk(directory):
            for file in files:
                if file.endswith(f".{file_type}"):
                    file_path = os.path.join(root, file)
                    file_queue.put(file_path)
                    file_count += 1
    
    print(f"在 {len(valid_directories)} 个目录中找到 {file_count} 个 .{file_type} 文件，开始处理...")
    
    # 如果没有找到文件，直接返回
    if file_count == 0:
        with open(output_file, 'a', encoding='utf-8') as log_file:
            log_file.write(f"\n未找到 .{file_type} 文件\n")
        return 0, 0
    
    # 创建停止事件
    stop_event = threading.Event()
    
    # 启动日志线程
    logger = threading.Thread(target=logger_thread, args=(output_file, stop_event))
    logger.daemon = True
    logger.start()
    
    # 创建工作线程
    threads = []
    for _ in range(min(num_threads, file_count)):
        t = threading.Thread(
            target=worker, 
            args=(file_queue, file_type, content, replace_with, backup)
        )
        t.daemon = True
        threads.append(t)
        t.start()
    
    # 等待所有文件处理完成
    file_queue.join()
    
    # 通知日志线程可以退出
    stop_event.set()
    
    # 等待日志线程处理完所有消息
    logger.join()
    
    # 计算耗时
    elapsed_time = time.time() - start_time
    
    # 写入操作结果摘要
    with open(output_file, 'a', encoding='utf-8') as log_file:
        summary = f"\n操作完成:\n"
        summary += f"- 处理了 {file_count} 个 .{file_type} 文件\n"
        summary += f"- 找到 {result_counter['found']} 个包含 '{content}' 的文件\n"
        
        if replace_with is not None:
            summary += f"- 替换了 {result_counter['replaced']} 个文件中的 '{content}' 为 '{replace_with}'\n"
        
        summary += f"- 总耗时: {elapsed_time:.2f} 秒\n"
        
        print(summary)
        log_file.write(summary)
    
    return result_counter['found'], result_counter['replaced']

def main():
    """主函数，处理命令行参数并执行搜索/替换"""
    parser = argparse.ArgumentParser(description='多线程在指定目录中搜索和替换指定类型文件中的内容')
    parser.add_argument('-d', '--directory', required=True, nargs='+', help='要搜索的目录路径（可指定多个）')
    parser.add_argument('-t', '--type', required=True, help='文件类型（扩展名，不包含点）')
    parser.add_argument('-c', '--content', required=True, help='要搜索的内容')
    parser.add_argument('-r', '--replace', help='要替换的内容（如果不指定则只搜索不替换）')
    parser.add_argument('-o', '--output', default='path.log', help='输出日志文件名 (默认: path.log)')
    parser.add_argument('-b', '--backup', action='store_true', help='替换前创建备份文件')
    parser.add_argument('-j', '--jobs', type=int, default=4, help='并行线程数 (默认: 4)')
    
    args = parser.parse_args()
    
    # 限制线程数在合理范围内
    num_threads = max(1, min(args.jobs, 128))
    
    # 执行搜索和可选的替换
    found_count, replaced_count = search_and_replace_files(
        args.directory, 
        args.type, 
        args.content, 
        args.output, 
        args.replace, 
        args.backup,
        num_threads
    )
    
    if found_count == 0:
        print(f"未找到包含 '{args.content}' 的 .{args.type} 文件")
    elif args.replace is not None:
        print(f"替换操作已完成: {replaced_count}/{found_count} 个文件已更新")
    
    print(f"操作日志已保存到 {os.path.abspath(args.output)}")

if __name__ == "__main__":
    main()