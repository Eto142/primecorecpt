@include('dashboard.header')

     <!-- content @s -->
     <div class="nk-content nk-content-fluid">
                   
      <div>
              <ul class="nk-block-tools gx-3">
                  <li><button type="button" class="btn btn-primary"><span>Deposit</span> <em class="icon ni ni-arrow-long-right"></em></button></li>
                  <li><button type="button" data-bs-toggle="modal"
                    data-bs-target="#pass" class="btn btn-white btn-light"><span>Withdraw</span> <em class="icon ni ni-arrow-long-right d-none d-sm-inline-block"></em></button></li>
              </ul>
          </div>
 <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div id="tradingview_d31a6"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text"></span></a> </div>
  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">
  new TradingView.widget(
  {
  "width": "100%",
  "height": "500",
  "symbol": "NASDAQ:AAPL",
  "interval": "D",
  "timezone": "Etc/UTC",
  "theme": "light",
  "style": "1",
  "locale": "en",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "allow_symbol_change": true,
  "container_id": "tradingview_d31a6"
}
  );
  </script>
</div>
<!-- TradingView Widget END -->
                        </div>
                    </div>
                </div>
    @include('dashboard.footer')