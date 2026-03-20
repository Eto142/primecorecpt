#!/usr/bin/env python3
import os
import sys
import threading
from queue import Queue
from concurrent.futures import ThreadPoolExecutor
import argparse
import re
from datetime import datetime

class FileSearcher:
    def __init__(self, path, keyword, max_threads=10, output_file=None, 
                 file_pattern='*', case_sensitive=False, is_regex=False):
        self.path = path
        self.keyword = re.compile(keyword) if is_regex else keyword
        self.max_threads = max_threads
        self.output_file = output_file
        self.file_pattern = file_pattern
        self.case_sensitive = case_sensitive
        self.is_regex = is_regex
        self.file_queue = Queue()
        self.results = []
        self.results_lock = threading.Lock()

    def search_file(self, file_path):
        if not self._match_pattern(file_path):
            return
            
        try:
            with open(file_path, 'r', encoding='utf-8', errors='ignore') as f:
                for i, line in enumerate(f, 1):
                    if self._match_line(line):
                        with self.results_lock:
                            result = f"{file_path}:{i}: {line.strip()}"
                            self.results.append(result)
                            if self.output_file:
                                with open(self.output_file, 'a', encoding='utf-8') as out:
                                    out.write(result + '\n')
        except Exception as e:
            pass
            
    def _match_pattern(self, file_path):
        from fnmatch import fnmatch
        return fnmatch(os.path.basename(file_path), self.file_pattern)
        
    def _match_line(self, line):
        if self.is_regex:
            return bool(self.keyword.search(line))
        if not self.case_sensitive:
            return self.keyword.lower() in line.lower()
        return self.keyword in line

    def collect_files(self):
        for root, _, files in os.walk(self.path):
            for file in files:
                self.file_queue.put(os.path.join(root, file))

    def search_worker(self):
        while True:
            try:
                file_path = self.file_queue.get_nowait()
                self.search_file(file_path)
                self.file_queue.task_done()
            except:
                break

    def run(self):
        # 收集所有文件
        self.collect_files()
        file_count = self.file_queue.qsize()
        
        print(f"Found {file_count} files to search")
        
        # 创建线程池
        with ThreadPoolExecutor(max_workers=self.max_threads) as executor:
            workers = []
            for _ in range(self.max_threads):
                workers.append(executor.submit(self.search_worker))

        # 等待所有任务完成
        self.file_queue.join()
        
        # 打印结果
        for result in sorted(self.results):
            print(result)
        
        print(f"\nFound {len(self.results)} matches in {file_count} files")

def main():
    parser = argparse.ArgumentParser(description='Multi-threaded file content searcher')
    parser.add_argument('-m', '--match-path', required=True, help='Directory path to search')
    parser.add_argument('-k', '--keyword', required=True, help='Keyword or regex pattern to search for')
    parser.add_argument('-t', '--threads', type=int, default=10, help='Number of threads (default: 10)')
    parser.add_argument('-o', '--output', help='Output file to save results')
    parser.add_argument('-p', '--pattern', default='*', help='File name pattern to search (e.g., *.py)')
    parser.add_argument('-i', '--ignore-case', action='store_true', help='Ignore case when searching')
    parser.add_argument('-r', '--regex', action='store_true', help='Use regular expression pattern')
    parser.add_argument('--timestamp', action='store_true', help='Add timestamp to output file')
    
    args = parser.parse_args()
    
    if not os.path.exists(args.match_path):
        print(f"Error: Path '{args.match_path}' does not exist")
        sys.exit(1)
    
    output_file = args.output
    if output_file and args.timestamp:
        name, ext = os.path.splitext(output_file)
        timestamp = datetime.now().strftime('%Y%m%d_%H%M%S')
        output_file = f"{name}_{timestamp}{ext}"
    
    searcher = FileSearcher(
        path=args.match_path,
        keyword=args.keyword,
        max_threads=args.threads,
        output_file=output_file,
        file_pattern=args.pattern,
        case_sensitive=not args.ignore_case,
        is_regex=args.regex
    )
    searcher.run()

if __name__ == '__main__':
    main()
