@include('dashboard.header')
  <!-- content @s -->
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div style="margin-right:520px" class="nk-content-body">
                            <div class="buysell wide-xs m-auto">
                                <!-- TradingView Widget BEGIN -->
<div  class="tradingview-widget-container">
  <div id="tradingview_3a3d1"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text"></span></a></div>
  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">
  new TradingView.widget(
  {
  "width": 500,
  "height": 600,
  "symbol": "NASDAQ:AAPL",
  "interval": "D",
  "timezone": "Etc/UTC",
  "theme": "light",
  "style": "1",
  "locale": "en",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "withdateranges": true,
  "hide_side_toolbar": false,
  "allow_symbol_change": true,
  
  "container_id": "tradingview_3a3d1"
}
  );
  </script>
</div>
<!-- TradingView Widget END -->
                
    @include('dashboard.footer')