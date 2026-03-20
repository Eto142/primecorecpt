@include('dashboard.header')
<!-- main header @e -->
<!-- content @s -->
{{--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-head-sub"><span>Welcome!</span>
                </div>
                <div class="nk-block-between-md g-4">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title fw-normal">{{Auth::user()->name}}</h2>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <ul class="nk-block-tools gx-3">
                            <li><a href="{{url('dep')}}" class="btn btn-primary"><span>Deposit</span> <em
                                        class="icon ni ni-arrow-long-right"></em></a></li>
                            <li><a href="{{url('withdrawals')}}" class="btn btn-white btn-light"><span>Withdraw</span>
                                    <em class="icon ni ni-arrow-long-right d-none d-sm-inline-block"></em></a></li>
                        </ul>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->


            <div class="nk-block">
                <div class="row gy-gs">
                    <div class="col-lg-5 col-xl-4">
                        <div class="nk-block">
                            <div class="nk-block-head-xs">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title title">Overview</h5>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">


                                <div class="buysell-field form-action">
<marquee style="color:blue"><b>Notification: {{Auth::user()->update_notification}}</b></marquee>
                                    <a href="#" class="btn btn-lg btn-block btn-primary">TRADING
                                        CAPITAL<br>{{Auth::user()->currency}}{{$deposit}}.00</a><br><br>
                                    <a href="#" class="btn btn-lg btn-block btn-primary">TOTAL
                                        BALANCE<br>{{Auth::user()->currency}}{{$user_balance}}.00</a><br><br>
                                    <a href="#" class="btn btn-lg btn-block btn-primary">TRADING
                                        PROFIT<br>{{Auth::user()->currency}}{{$profit}}.00</a><br><br>
                                    <a href="#" class="btn btn-lg btn-block btn-primary">TRADING
                                        BONUS<br>{{Auth::user()->currency}}{{$referral}}.00</a><br><br>
                                </div>
                                {{-- <div class="card card-bordered text-light is-dark h-100">


                                    <div class="card-inner">
                                        <div class="nk-wg7">

                                            <div class="nk-wg7-stats-group">
                                                <div class="nk-wg7-stats w-80">
                                                    <div class="nk-wg7-title">TRADING CAPITAL</div>
                                                    <div class="number-lg"> {{Auth::user()->currency}}{{$deposit}}.00
                                                    </div>
                                                </div>
                                                <div class="nk-wg7-stats w-50">
                                                    <div class="nk-wg7-title">TOTAL BALANCE</div>
                                                    <!--  <div class="number">
                                                                        0                                                                    </div> -->

                                                    <div class="number">{{Auth::user()->currency}}{{$balance}}.00</div>
                                                </div>



                                            </div>
                                            <div class="nk-wg7-stats-group">
                                                <div class="nk-wg7-stats w-80">
                                                    <ul>
                                                        <li>
                                                            <div class="nk-wg7-title">TRADING PROFIT</div>
                                                            <div class="number">{{Auth::user()->currency}}{{$profit}}.00
                                                                </di>
                                                        </li><br>
                                                        <li>
                                                            <div class="nk-wg7-title"> TRADING BONUS</div>
                                                            <div class="number">
                                                                {{Auth::user()->currency}}{{$referral}}.00</di>
                                                        </li><br>

                                                    </ul>


                                                </div><br>



                                            </div><!-- .nk-wg7 --> --}}
                                        </div><!-- .card-inner -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div><!-- .nk-block -->
                        </div>
                        {{--
                        <div class="container">
                            <h2>Signal Strength</h2>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                                    aria-valuemax="100" style="width:30%">
                                    <span class="sr-only">70% Complete</span>
                                </div>
                            </div> --}}

                            <br>
                            <h4>Signal Strength</h4>
                            <div class="progress progress-lg">

                                <div class="progress-bar" data-progress="{{Auth::user()->signal_strength}}%"
                                    style="width:{{Auth::user()->signal_strength}}% "></div>
                                <span class="sr-only">{{Auth::user()->signal_strength}}%</span>
                            </div>
                            <br>
                        </div>
                        <!-- .col -->
                        <div class="col-lg-7 col-xl-8" style="display:none;">
                            <div class="nk-block">
                                <div class="nk-block-head-xs">
                                    <div class="nk-block-between-md g-2">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title title">Digital Wallets</h5>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <a href="crypto/wallets.php" class="link link-primary">See All</a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="row g-2">
                                    <div class="col-sm-4">
                                        <div class="card bg-light">
                                            <div class="nk-wgw sm">
                                                <div class="nk-wgw-name">
                                                    <div class="nk-wgw-icon">
                                                        <em class="icon ni ni-sign-btc"></em>
                                                    </div>
                                                    <h5 class="nk-wgw-title title">Bitcoin Wallet</h5>
                                                </div>
                                                <div class="nk-wgw-balance">
                                                    <div class="amount">0.00000<span
                                                            class="currency currency-btc">BTC</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .col -->
                                    <div class="col-sm-4">
                                        <div class="card bg-light">
                                            <div class="nk-wgw sm">
                                                <div class="nk-wgw-name">
                                                    <div class="nk-wgw-icon">
                                                        <em class="icon ni ni-sign-eth"></em>
                                                    </div>
                                                    <h5 class="nk-wgw-title title">Ethereum Wallet</h5>
                                                </div>
                                                <div class="nk-wgw-balance">
                                                    <div class="amount">0.00000<span
                                                            class="currency currency-eth">ETH</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .col -->
                                    <div class="col-sm-4">
                                        <div class="card bg-light">
                                            <div class="nk-wgw sm">
                                                <div class="nk-wgw-name">
                                                    <div class="nk-wgw-icon">
                                                        <em class="icon ni ni-sign-btc"></em>
                                                    </div>
                                                    <h5 class="nk-wgw-title title">NioWallet</h5>
                                                </div>
                                                <div class="nk-wgw-balance">
                                                    <div class="amount">Locked<span
                                                            class="currency currency-nio">NIO</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div><!-- .nk-block -->
                            <div class="nk-block nk-block-md">
                                <div class="nk-block-head-xs">
                                    <div class="nk-block-between-md g-2">
                                        <div class="nk-block-head-content">
                                            <h6 class="nk-block-title title">Fiat Accounts</h6>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <a href="crypto/wallets.php" class="link link-primary">See All</a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="row g-2">
                                    <div class="col-sm-4">
                                        <div class="card bg-light">
                                            <div class="nk-wgw sm">
                                                <div class="nk-wgw-name">
                                                    <div class="nk-wgw-icon">
                                                        <em class="icon ni ni-sign-usd"></em>
                                                    </div>
                                                    <h5 class="nk-wgw-title title">USD Wallet</h5>
                                                </div>
                                                <div class="nk-wgw-balance">
                                                    <div class="amount">Locked<span
                                                            class="currency currency-usd">USD</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .col -->
                                    <div class="col-sm-4">
                                        <div class="card bg-light">
                                            <div class="nk-wgw sm">
                                                <div class="nk-wgw-name">
                                                    <div class="nk-wgw-icon">
                                                        <em class="icon ni ni-sign-eur"></em>
                                                    </div>
                                                    <h5 class="nk-wgw-title title">Euro Wallet</h5>
                                                </div>
                                                <div class="nk-wgw-balance">
                                                    <div class="amount">Locked<span
                                                            class="currency currency-btc">EUR</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .col -->
                                    <div class="col-sm-4">
                                        <div class="card bg-light">
                                            <div class="nk-wgw sm">
                                                <div class="nk-wgw-name">
                                                    <div class="nk-wgw-icon">
                                                        <em class="icon ni ni-sign-chf"></em>
                                                    </div>
                                                    <h5 class="nk-wgw-title title">Swiss Franc Wallet</h5>
                                                </div>
                                                <div class="nk-wgw-balance">
                                                    <div class="amount">Locked<span
                                                            class="currency currency-eth">CHF</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div> <!-- .nk-block -->
                        </div><!-- .col -->




                    </div>
                    <!-- .nk-block -->
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container hide-deskop">
                        <div id="tradingview_0e9f8"></div>
                        <div class="tradingview-widget-copyright"><a
                                href="https://www.tradingview.com/symbols/USDCAD/?exchange=OANDA" rel="noopener"
                                target="_blank"><span class="blue-text"></span></a></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                        <script type="text/javascript">
                            new TradingView.widget(
  {
  "width":"400",
  "height": "400",
  "symbol": "OANDA:USDCAD",
  "interval": "D",
  "timezone": "Etc/UTC",
  "theme": "light",
  "style": "1",
  "locale": "en",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "allow_symbol_change": true,
  "container_id": "tradingview_0e9f8"
}
  );
                        </script>
                    </div>
                    <!-- TradingView Widget END -->
                    <div class="tradingview-widget-container hide-dektop">
                        <div id="tradingview_0e9f8"></div>
                        <div class="tradingview-widget-copyright"><a
                                href="https://www.tradingview.com/symbols/USDCAD/?exchange=OANDA" rel="noopener"
                                target="_blank"><span class="blue-text"></span></a></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                        <script type="text/javascript">
                            new TradingView.widget(
  {
  "width":"100%",
  "height": "4000",
  "symbol": "OANDA:USDCAD",
  "interval": "D",
  "timezone": "Etc/UTC",
  "theme": "light",
  "style": "1",
  "locale": "en",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "allow_symbol_change": true,
  "container_id": "tradingview_0e9f8"
}
  );
                        </script>
                    </div>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .nk-block -->
        <div class="nk-block nk-block-lg hide-desktop">
            <div class="row gy-gs">
                <div class="col-md-6">
                    <div class="card-head">
                        <div class="card-title  mb-0">
                            <h5 class="title">Recent Activities</h5>
                        </div>

                    </div><!-- .card-head -->

                </div><!-- .col -->
                <div class="col-md-6">
                    <div class="card-head">
                        <div class="card-title mb-0">
                            <h5 class="title">Price Flow</h5>
                        </div>
                    </div><!-- .card-title -->
                    <div class="card card-bordered" style="padding-bottom: 90px;">
                        <div class="card-inner" style="padding-top: 0px;">
                            <div class="nk-ck3">
                                <!-- TradingView Widget BEGIN -->
                                <div class="tradingview-widget-container">
                                    <div id="tradingview_b74f7"></div>
                                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                                    <script type="text/javascript">
                                        new TradingView.MediumWidget(
    {
    "symbols": [
      [
        "Etherium/Tether",
        "BINANCE:ETHUSDT|1D"
      ],
      [
        "Bitcoin/Tether",
        "BINANCE:BTCUSDT|1D"
      ],
      [
        "Solana/Tether",
        "BINANCE:SOLUSDT|1D"
      ]
    ],
    "chartOnly": false,
    "width": "415",
    "height": "400",
    "locale": "en",
    "colorTheme": "light",
    "isTransparent": true,
    "autosize": false,
    "showVolume": false,
    "hideDateRanges": false,
    "scalePosition": "right",
    "scaleMode": "Normal",
    "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
    "noTimeScale": false,
    "valuesTracking": "1",
    "chartType": "line",
    "fontColor": "#787b86",
    "gridLineColor": "rgba(42, 46, 57, 0.06)",
    "container_id": "tradingview_b74f7"
  }
    );
                                    </script>
                                </div>
                                <!-- TradingView Widget END -->
                            </div>
                        </div><!-- .card-inner -->
                    </div><!-- .card -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .nk-block -->


    </div>
    <style>
        @media screen and (min-width: 480px) {
            .hide-mobile {
                display: none;
            }

        }

        .hide-desktop {
            display: none;
        }
    </style>
    <div class="col-lg-7 col-xl-8 hide-mobile">
        <div class="nk-block">
            <div class="nk-block-head-xs">
                <div class="nk-block-between-md g-2">

                    <div class="nk-block-head-content">

                    </div>
                    <!-- .nk-block -->
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div id="tradingview_0e9f8"></div>
                        <div class="tradingview-widget-copyright"><a
                                href="https://www.tradingview.com/symbols/USDCAD/?exchange=OANDA" rel="noopener"
                                target="_blank"><span class="blue-text"></span></a></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                        <script type="text/javascript">
                            new TradingView.widget(
  {
  "width":"100%",
  "height": "400",
  "symbol": "OANDA:USDCAD",
  "interval": "D",
  "timezone": "Etc/UTC",
  "theme": "light",
  "style": "1",
  "locale": "en",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "allow_symbol_change": true,
  "container_id": "tradingview_0e9f8"
}
  );
                        </script>
                    </div>
                    <!-- TradingView Widget END -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .nk-block -->
        <div class="nk-block nk-block-lg">
            <div class="row gy-gs">
                <div class="col-md-6">
                    <div class="card-head">
                        <div class="card-title  mb-0">
                            <h5 class="title">Recent Activities</h5>
                        </div>

                    </div><!-- .card-head -->

                </div><!-- .col -->

            </div><!-- .row -->
        </div><!-- .nk-block -->


    </div>
</div>
</div>


@include('dashboard.footer')