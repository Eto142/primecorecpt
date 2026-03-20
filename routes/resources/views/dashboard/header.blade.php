<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
  <base href="../">
  <meta charset="utf-8">
  <meta name="author" content="Softnio">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description"
    content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
  <!-- Fav Icon  -->
  <link rel="shortcut icon" href="images/favicon.png">
  <!-- Page Title  -->
  <title>Dashboard | PrimeCore Capitalss</title>
  <!-- StyleSheets  -->

  <link rel="stylesheet" href="{{asset('assets1/css/dashlite.css')}}">
  <link id="skin-default" rel="stylesheet" href="{{asset('assets1/css/theme.css')}}">
  <script src="{{asset('https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js')}}"></script>
  <script src=" {{asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js')}}"></script>
 <!-- toastr-->
    <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css')}}" rel="stylesheet">
	
    <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js')}}"></script>

	<link rel="stylesheet" type="text/css" 
     href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css')}}">
	
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js')}}"></script>
  <style>
    .accordion {
      background-color: transparent;
      color: #444;
      cursor: pointer;
      padding: 18px;
      width: 100%;
      text-align: left;
      border: none;
      outline: none;
      transition: 0.4s;
    }

    /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
    .active,
    .accordion:hover {}

    /* Style the accordion panel. Note: hidden by default */
    .panel2 {
      padding: 0 18px;
      background-color: white;
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.2s ease-out;
    }
  </style>
</head>

<!-- Smartsupp Live Chat script --> <script type="text/javascript"> var _smartsupp = _smartsupp || {}; _smartsupp.key = 'c93031517dbf2a336e66dc8a35151471e78bd354'; window.smartsupp||(function(d) { var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[]; s=d.getElementsByTagName('script')[0];c=d.createElement('script'); c.type='text/javascript';c.charset='utf-8';c.async=true; c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s); })(document); </script>

<body onload="show()" class="nk-body npc-crypto bg-white has-sidebar ">

  <!-- .modal -->
  <!-- @@ Buy Coin Modal @e -->
  <script src="blueimp-md5/js/md5.js"></script>
  <script src="blueimp-md5/js/md5.min.js"></script>
  <input type="hidden" id="test" value="" class="btn btn-primary btn-lg">
  <input type="hidden" id="key1" value="" class="btn btn-primary btn-lg">
  <input type="hidden" id="key2" value="" class="btn btn-primary btn-lg">


  <div class="modal fade" tabindex="-1" role="dialog" id="buy-coin">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
        <div class="modal-body modal-body-lg">
          <div class="nk-block-head nk-block-head-xs text-center">
            <h5 class="nk-block-title">Confirm Order</h5>
            <div class="nk-block-text">
              {{-- <div class="caption-text">
                You are about to get <strong>{{$btc_balance}}</strong> BTC for
                <strong>{{$user_balance}}</strong> USD* --}}
              </div>
              <span class="sub-text-sm">Exchange rate: 1 BTC = USD</span>
            </div>
          </div>
          <div class="nk-block">
            <div class="buysell-overview">
              <ul class="buysell-overview-list">
                <li class="buysell-overview-item">
                  <span class="pm-title">Pay with</span>
                  <span class="pm-currency"><em class="icon bi-currency-bitcoin"></em>
                    <span>Cyptocurrency</span></span>
                </li>
                <li class="buysell-overview-item">
                  <span class="pm-title">Total</span>
                  <span class="pm-currency">500.00 USD</span>
                </li>
              </ul>

            </div>
            <div class="buysell-field form-group">
              <div class="form-label-group">
                <label class="form-label">Choose what currency to pay with</label>

              </div>
              <div class="form-group">
                <div class="form-control-wrap">
                  <select class="form-select js-select2">
                    <option value="default_option">Cryptocurrency</option>
                    <option value="option_select_name">Bitcoin</option>
                    <option value="option_select_name">Ethereum</option>
                  </select>
                </div>
              </div>
              <!-- .dropdown -->
            </div>
            <!-- .buysell-field -->
            <div class="buysell-field form-action text-center">
              <div>
                <a href="#" class="btn btn-primary btn-lg" data-bs-dismiss="modal" data-bs-toggle="modal"
                  data-bs-target="#confirm-coin">Confirm the Order</a>
              </div>
              <div class="pt-3">
                <a href="#" data-bs-dismiss="modal" class="link link-danger">Cancel Order</a>
              </div>
            </div>
          </div>
          <!-- .nk-block -->
        </div>
        <!-- .modal-body -->
      </div>
      <!-- .modal-content -->
    </div>
    <!-- .modla-dialog -->
  </div>


  <!-- .modal PASS -->
  <!-- @@ Confirm Coin Modal @e -->
  <div class="modal fade" tabindex="-1" role="dialog" id="pass">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <a href="{{url('withdrawals')}}" class="close" ><em class="icon ni ni-cross-sm"></em></a>
        {{-- <div class="modal-body modal-body-lg text-center">
          <div class="nk-modal">
            <form action="" method="post">
              <h4 class="nk-modal-title">Please to confirm this is you kindly enter your password</h4>
              <div class="nk-modal-text">
                <input type="password" name="conpass" id="conpass"
                  class="form-control form-control-lg form-control-number" placeholder="******">
                <input type="hidden" id="check" value="25d55ad283aa400af464c76d713c07ad"
                  class="form-control form-control-lg form-control-number" placeholder="******">
              </div> --}}
              {{-- <div class="nk-modal-action-lg">
                <ul class="btn-group gx-4">
                  <li>
                    <button class="btn btn-lg btn-mw btn-primary" name="password">Confirm</button>
                  </li>
                </ul>
              </div>
            </form> --}}
          </div>
        </div>
        <!-- .modal-body -->
      </div>
      <!-- .modal-content -->
    </div>
    <!-- .modla-dialog -->
  </div>

  <div class="modal fade" tabindex="-1" role="dialog" id="keyb">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
        <div class="modal-body modal-body-lg text-center">
          <div class="nk-modal">
            <form action="" method="post">
              <h4 class="nk-modal-title">WITHDRWAL ACTIVATION KEY</h4>
              <div class="nk-modal-text">
                <input type="number" id="activation_key" name="activation_key"
                  class="form-control form-control-lg form-control-number" placeholder="256978">
              </div>
              <div class="nk-modal-action-lg">
                <ul class="btn-group gx-4">
                  <li>
                    <button class="btn btn-lg btn-mw btn-primary" name="request">Request For Activation Key</button>
                  </li>
                  <li>
                    <p id="act_key"></p>
                  </li>
                  <li>
                    <button name="submit_key" class="btn btn-lg btn-mw btn-primary">Submit Key</button>
                  </li>
                </ul>
              </div>
            </form>
          </div>
        </div>
        <!-- .modal-body -->
      </div>
      <!-- .modal-content -->
    </div>
    <!-- .modla-dialog -->
  </div>
  <!-- .modla-dialog -->
  </div>

  <div class="modal fade" tabindex="-1" role="dialog" id="payment_method">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
        <div class="modal-body modal-body-lg text-center">
          <div class="nk-modal">
            <h4 class="nk-modal-title">PAYMENT METHOD</h4>
            <div class="buysell-field form-group">
              <div class="form-pm-group">
                <ul class="buysell-pm-list">
                  <li class="buysell-pm-item">
                    <input class="buysell-pm-control" type="radio" name="bs" id="bitcoin" />
                    <label class="buysell-pm-label" for="bitcoin">
                      <span class="pm-name">Bitcoin</span>
                      <span class="pm-icon"><em class="tranx-icon sm icon ni ni-sign-btc"></em></span>
                    </label>
                  </li>
                  <li class="buysell-pm-item">
                    <input class="buysell-pm-control" type="radio" name="bs" id="ethereum" />
                    <label class="buysell-pm-label" for="ethereum">
                      <span class="pm-name">Ethereum</span>
                      <span class="pm-icon"><em class="tranx-icon sm icon ni ni-sign-eth"></em></span>
                    </label>
                  </li>
                  <li class="buysell-pm-item">
                    <input class="buysell-pm-control" type="radio" name="bs" id="bank" />
                    <label class="buysell-pm-label" for="bank">
                      <span class="pm-name">Bank</span>
                      <span class="pm-icon"><em class="icon ni ni-cc-alt-fill"></em></span>
                    </label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="nk-modal-action-lg">
              <ul class="btn-group gx-4">
                <li>
                  <a href="#" onclick="pay_met()" class="btn btn-lg btn-mw btn-primary" name="request" id="pick"
                    data-bs-dismiss="modal" data-bs-toggle="modal">Proceed</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- .modal-body -->
      </div>
      <!-- .modal-content -->
    </div>
    <!-- .modla-dialog -->
  </div>
  <!-- .modla-dialog -->
  </div>

  <div class="modal fade" tabindex="-1" role="dialog" id="btc">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
        <div class="modal-body modal-body-lg text-center">
          <div class="nk-modal">
            <form action="" method="post">
              <h4 class="nk-modal-title">Bitcoin Withdrawal</h4>
              <div class="nk-modal-text">
                <input type="number" name="amount" id="activation_key"
                  class="form-control form-control-lg form-control-number" step="0.00005"
                  placeholder="Amount In BITCOIN">
                <input type="text" value="Btc" name="payment" class="form-control form-control-lg form-control-number">
              </div>
              <div class="nk-modal-action-lg">
                <ul class="btn-group gx-4">
                  <li>
                    <button class="btn btn-lg btn-mw btn-primary" name="pay">Place Order</button>
                  </li>
                </ul>
              </div>
            </form>
          </div>
        </div>
        <!-- .modal-body -->
      </div>
      <!-- .modal-content -->
    </div>
    <!-- .modla-dialog -->
  </div>
  <!-- .modla-dialog -->
  </div>

  <div class="modal fade" tabindex="-1" role="dialog" id="eth">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
        <div class="modal-body modal-body-lg text-center">
          <div class="nk-modal">
            <form action="" method="post">
              <h4 class="nk-modal-title">Ethereum Withdrawal</h4>
              <div class="nk-modal-text">
                <input type="number" name="amount" id="activation_key"
                  class="form-control form-control-lg form-control-number" step="0.00005"
                  placeholder="Amount In BITCOIN">
                <input type="hidden" value="Eth" name="payment"
                  class="form-control form-control-lg form-control-number">
              </div>
              <div class="nk-modal-action-lg">
                <ul class="btn-group gx-4">
                  <li>
                    <button class="btn btn-lg btn-mw btn-primary" name="pay">Place Order</button>
                  </li>
                </ul>
              </div>
            </form>
          </div>
        </div>
        <!-- .modal-body -->
      </div>
      <!-- .modal-content -->
    </div>
    <!-- .modla-dialog -->
  </div>
  <!-- .modla-dialog -->
  </div>


  <!-- JavaScript -->
  <script type="text/javascript">
    if (document.getElementById('bitcoin').checked == false) {
      document.getElementById('pick').disabled = true;
    }
  
    function show() {
      if (document.getElementById("test").value == "1") {
        $('#key').modal('show');
      } else if (document.getElementById("test").value == "2") {
        if (document.getElementById('key2').value == "yes") {
          $('#payment_method').modal('show');
        } else {
          $('#key').modal('show');
          alert("Nahhh");
        }
      } else if (document.getElementById("test").value == "3") {
        $('#confirm_wit').modal('show');
      }
    }
    
    // function activate() {
      // $('#payment_method').modal('show');
    // }
    function pay_met() {
      // document.getElementById('bitcoin').addEventListener('click', event=>{
        // if(event.target.checked){
          // alert("btc");
        // }
      // });
      if (document.getElementById('bitcoin').checked) {
        $('#btc').modal('show');
      } else if (document.getElementById('ethereum').checked){
        $('#eth').modal('show');
      } else if (document.getElementById('bank').checked){
        $('#bank').modal('show');
      }

      // alert("sss");
    }
  </script>
  <script>
    function modal() {
      let e = md5(document.getElementById('conpass').value);
      var a = document.getElementById('check').value;
      if (e == a) {
        // $('#key').modal('show');
        alert("sss");
      } else {
        alert("Invalid Password");
      }
    }
  </script>
  
                      <script>
 @if(Auth::user()->kyc_status=='1')
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("Kyc status verified");

  @else
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  toastr.warning("kyc not verified, please verify your kyc document");
  @endif
</script>

  <div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
      <!-- sidebar @s -->
      <div class="nk-sidebar nk-sidebar-fixed is-light" data-content="sidebarMenu">
        <div class="nk-sidebar-element nk-sidebar-head">
          <div class="nk-sidebar-brand">
            <a href="{{url('/home')}}" class="logo-link nk-sidebar-logo">


              <img class="logo-dark" style="width:192px; height:62px;" src="layer_1.png" />







            </a>
          </div>
          <div class="nk-menu-trigger me-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                class="icon ni ni-arrow-left"></em></a>
          </div>
        </div><!-- .nk-sidebar-element -->
        <div class="nk-sidebar-element">
          <div class="nk-sidebar-body" data-simplebar>
            <div class="nk-sidebar-content">
              <div class="nk-sidebar-widget d-none d-xl-block">
                <div class="user-account-info between-center">
                  <div class="user-account-main">
                    <h6 class="overline-title-alt">Available Balance</h6>
                    <div class="user-balance">{{$btc_balance}} <small class="currency currency-btc">BTC</small></div>
                    <!-- <div class="user-balance-alt">18,934.84 <span class="currency currency-btc">BTC</span></div> !-->
                  </div>
                  <!--<a href="#" class="btn btn-white btn-icon btn-light"><em class="icon ni ni-line-chart"></em></a>-->
                </div>
                <ul class="user-account-data gy-1">
                  <li>
                    <!-- <div class="user-account-label">
                                            <span class="sub-text">Profits (7d)</span>
                                        </div>
                                        <div class="user-account-value">
                                            <span class="lead-text">+ 0.0526 <span class="currency currency-btc">BTC</span></span>
                                            <span class="text-success ms-2">3.1% <em class="icon ni ni-arrow-long-up"></em></span>
                                        </div> !-->
                  </li>
                  <li>
                    <div class="user-account-label">
                      <span class="sub-text">Deposit in orders</span>
                    </div>
                    <div class="user-account-value">
                      <span class="sub-text">{{Auth::user()->currency}}{{$user_balance}} <span class="currency currency-btc"></span></span>
                    </div>
                  </li>
                </ul>
                <div class="user-account-actions">
                  <ul class="g-3">
                    <li><a href="{{url('dep')}}" class="btn btn-lg btn-primary"><span>Deposit</span></a></li>
                    <li>
                      <a href="{{url('withdrawals')}}" class="btn btn-lg btn-warning" ><span>Withdraw</span></a>
                    </li>
                  </ul>
                </div>
              </div><!-- .nk-sidebar-widget -->


              <div class="nk-sidebar-widget nk-sidebar-widget-full d-xl-none pt-0">
                <a class="nk-profile-toggle toggle-expand" data-target="sidebarProfile" href="#">
                  <div class="user-card-wrap">
                    <div class="user-card">
                      <div class="user-avatar">

                        <span><img src="{{asset('user/uploads/id/'.Auth::user()->photo)}}" alt="Example Image"></span>
                      </div>
                      <div class="user-info">
                        <span class="lead-text">{{Auth::user()->name}}</span>
                        <span class="sub-text">{{Auth::user()->email}}</span>
                      </div>
                      <div class="user-action">
                        <em class="icon ni ni-chevron-down"></em>
                      </div>
                    </div>
                  </div>
                </a>
                <div class="nk-profile-content toggle-expand-content" data-content="sidebarProfile">
                  <div class="user-account-info between-center">
                    <div class="user-account-main">
                      <h6 class="overline-title-alt">Available Balance</h6>
                      <div class="user-balance">{{$btc_balance}} <small class="currency currency-btc">BTC</small></div>
                      <!-- <div class="user-balance-alt">18,934.84 <span class="currency currency-btc">BTC</span></div> !-->
                    </div>
                    <!--<a href="#" class="btn btn-white btn-icon btn-light"><em class="icon ni ni-line-chart"></em></a>-->
                  </div>
                  <ul class="user-account-data gy-1">
                    <li>
                      <!-- <div class="user-account-label">
                                            <span class="sub-text">Profits (7d)</span>
                                        </div>
                                        <div class="user-account-value">
                                            <span class="lead-text">+ 0.0526 <span class="currency currency-btc">BTC</span></span>
                                            <span class="text-success ms-2">3.1% <em class="icon ni ni-arrow-long-up"></em></span>
                                        </div> !-->
                    </li>
                    <li>
                      <div class="user-account-label">
                        <span class="sub-text">Deposit in orders</span>
                      </div>
                      <div class="user-account-value">
                        <span class="sub-text">{{Auth::user()->currency}}{{$user_balance}} <span class="currency currency-btc"></span></span>
                      </div>
                    </li>
                  </ul>
                  <ul class="user-account-links">
                    <li>
                      <a href="{{url('withdrawals')}}" class="link"><span>Withdraw Funds</span> <em
                          class="icon ni ni-wallet-out"></em>
                      </a>
                    </li>
                    <li><a href="{{url('dep')}}" class="link"><span>Deposit Funds</span> <em
                          class="icon ni ni-wallet-in"></em></a></li>
                  </ul>
                  <ul class="link-list">
                    <li><a href="{{url('profile')}}"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a>
                    </li>
                  </ul>
                  <ul class="link-list">
                    <li><a href="{{Route('logout')}}"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                  </ul>
                </div>
              </div>
              <!-- .nk-sidebar-widget -->
              <div class="nk-sidebar-menu">
                <!-- Menu -->
                <ul class="nk-menu">
                  <li class="nk-menu-heading">
                    <h6 class="overline-title">Menu</h6>
                  </li>
                  
                   <li class="nk-menu-item">
                    <a href="{{url('bot')}}" class="nk-menu-link">
                      <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
                      <span class="nk-menu-text">QAI PROTECT</span>
                    </a>
                  </li>
                  <li class="nk-menu-item">
                    <a href="{{url('/home')}}" class="nk-menu-link">
                      <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                      <span class="nk-menu-text">Dashboard</span>
                    </a>
                  </li>

                  <li class="nk-menu-item">
                    <span class="accordion nk-menu-text toggle-expand" style="margin-left: 2%;">
                      <span class="nk-menu-icon" style="padding-right: 4%;">
                        <em class="icon ni ni-layout-alt"></em>
                      </span>
                      <span class="nk-menu-text">Trading Options</span>
                      <em class="icon ni ni-caret-down-fill"></em>
                    </span>
                    <ul class="panel2">
                      <li class="nk-menu-item">
                        <a href="{{url('forex')}}" class="nk-menu-link">
                          <span class="nk-menu-text">Forex Trade</span>
                        </a>
                      </li>
                      <li class="nk-menu-item">
                        <a href="{{url('binary')}}" class="nk-menu-link">
                          <span class="nk-menu-text">Binary Trade</span>
                        </a>
                      </li>
                      <li class="nk-menu-item">
                        <a href="{{url('stocks')}}" class="nk-menu-link">
                          <span class="nk-menu-text">Stocks Trade</span>
                        </a>
                      </li>
                      <li class="nk-menu-item">
                        <a href="{{url('crypto')}}" class="nk-menu-link">
                          <span class="nk-menu-text">Crypto Trade</span>
                        </a>
                      </li>

                      <!--<li class="nk-menu-item">-->
                      <!--  <a href="{{url('bot')}}" class="nk-menu-link">-->
                      <!--    <span class="nk-menu-text">QAI Protect</span>-->
                      <!--  </a>-->
                      <!--</li>-->
                    </ul>
                    <div class="nk-profile-content toggle-expand-content" data-content="sidebarProfile">

                      </a>

                  </li>

                  <li class="nk-menu-item">
                    <a href="{{url('wallet')}}" class="nk-menu-link">
                      <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span>
                      <span class="nk-menu-text">Wallet</span>
                    </a>
                  </li>
                  <li class="nk-menu-item">
                    <a href="{{url('copy')}}" class="nk-menu-link">
                      <span class="nk-menu-icon"><em class="icon ni ni-target"></em></span>
                      <span class="nk-menu-text">Copy Trade</span>
                    </a>
                  </li>
                  <li class="nk-menu-item">
                    <a href="{{url('dep')}}" class="nk-menu-link">
                      <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                      <span class="nk-menu-text">Deposit</span>
                    </a>
                  </li>

                  <li class="nk-menu-item">
                    <a href="{{url('withdrawals')}}" class="nk-menu-link">
                      <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                      <span class="nk-menu-text">Withdrawals</span>
                    </a>
                  </li>
                  <li class="nk-menu-item">
                    <a href="{{url('crypto_buy')}}" class="nk-menu-link">
                      <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                      <span class="nk-menu-text">Crypto</span>
                    </a>
                  </li>
                  <li class="nk-menu-item">
                    <a href="{{url('profile')}}" class="nk-menu-link">
                      <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                      <span class="nk-menu-text">My Profile</span>
                    </a>
                  </li>

                  {{-- <li class="nk-menu-item">
                    <a href="{{url('buy-plan')}}" class="nk-menu-link">
                      <span class="nk-menu-icon"><em class="icon ni ni-navigate"></em></span>
                      <span class="nk-menu-text">Subscribe To A Plan</span>
                    </a>
                  </li> --}}

                  <li class="nk-menu-item">
                    <a href="{{url('accounthistory')}}" class="nk-menu-link">
                      <span class="nk-menu-icon"><em class="icon ni ni-archive"></em></span>
                      <span class="nk-menu-text">Transaction History</span>
                    </a>
                  </li>

                  <li class="nk-menu-item">
                    <a href="{{url('bonus')}}" class="nk-menu-link">
                      <span class="nk-menu-icon"><em class="icon ni ni-trend-up"></em></span>
                      <span class="nk-menu-text">Bonus Packages</span>
                    </a>
                  </li>
                  <li class="nk-menu-item">
                    <a href="{{url('referuser')}}" class="nk-menu-link">
                      <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                      <span class="nk-menu-text">Refer Family & Friends</span>
                    </a>
                  </li>

                </ul><!-- .nk-menu -->
              </div><!-- .nk-sidebar-menu -->


            </div><!-- .nk-sidebar-content -->
          </div><!-- .nk-sidebar-body -->
        </div><!-- .nk-sidebar-element -->
      </div>
      <!-- sidebar @e -->
      <!-- wrap @s -->
      <div class="nk-wrap ">
        <!-- main header @s -->
        <div class="nk-header nk-header-fluid nk-header-fixed is-light">
          <div class="container-fluid">
            <div class="nk-header-wrap">
              <div class="nk-menu-trigger d-xl-none ms-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em
                    class="icon ni ni-menu"></em></a>
              </div>
              <div class="nk-header-brand d-xl-none">
                <a href="{{url('/home')}}" class="logo-link">

                  <img class="logo-dark" style="width:192px; height:62px;" src="layer_1.png" />


                </a>
              </div>
              <div class="nk-header-news d-none d-xl-block">
                <div class="nk-news-list">
                  {{-- <a class="nk-news-item" href="./mail/mailer.php"> --}}
                    <div class="nk-news-icon">
                      <em class="icon ni ni-card-view"></em>
                    </div>
                    <div class="nk-news-text">

                      {{-- <p>Email has not been verified <span> Click here to verify</span></p> --}}



                      <em class="icon ni ni-external"></em>
                    </div>
                  </a>
                </div>
              </div>
              <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                  <li class="dropdown language-dropdown d-none d-sm-block me-n1">
                    <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                      {{-- <div class="quick-icon border border-light">
                        {{Auth::user()->name}}
                      </div> --}}
                    </a>

                  </li><!-- .dropdown -->
                  <li class="dropdown user-dropdown">
                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                      <div class="user-toggle">
                        <div class="user-avatar sm">

                          <span><img src="{{asset('user/uploads/id/'.Auth::user()->photo)}}" alt="Example Image">
                          </span>
                        </div>
                        <div class="user-info d-none d-md-block">
                          @if(Auth::user()->kyc_status==='0')
                          <div class="user-status user-status-unverified">Unverified</div>
                          @elseif(Auth::user()->kyc_status==='1')
                          <div class="user-status user-status-verified">verified</div>
                          @elseif(Auth::user()->kyc_status==='2')
                          <div class="user-status user-status-unverified">Failed</div>
                          @endif
                          <div class="user-name dropdown-indicator">{{Auth::user()->name}}</div>
                        </div>
                      </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                      <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                        <div class="user-card">
                          <div class="user-avatar">

                            <span><img src="{{asset('user/uploads/id/'.Auth::user()->photo)}}"
                                alt="Example Image"></span>
                          </div>
                          <div class="user-info">
                            <span class="lead-text">{{Auth::user()->name}}</span>
                            <span class="sub-text">{{Auth::user()->email}}</span>
                          </div>
                        </div>
                      </div>
                      <div class="dropdown-inner user-account-info">
                        <h6 class="overline-title-alt">Btc Wallet Account</h6>
                        <div class="user-balance">{{$btc_balance}} <small class="currency currency-btc">BTC</small>
                        </div>
                        <div class="user-balance-sub">Locked <span>{{$btc_balance}} <span
                              class="currency currency-btc">BTC</span></span></div>
                        <a href="{{url('withdrawals')}}" class="link" ><span>Withdraw
                            Funds</span> <em class="icon ni ni-wallet-out"></em></a>
                      </div>
                      <div class="dropdown-inner">
                        <ul class="link-list">
                          <li><a href="{{ url('profile') }}"><em class="icon ni ni-user-alt"></em><span>View
                                Profile</span></a></li>
                          <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark
                                Mode</span></a></li>
                        </ul>
                      </div>
                      <div class="dropdown-inner">
                        <ul class="link-list">
                          <li><a href="{{ route('logout.perform') }}"><em class="icon ni ni-signout"></em><span>Sign
                                out</span></a></li>
                        </ul>
                      </div>
                    </div>
                  </li>

                </ul>
              </div>
            </div>
          </div>
        </div>
        
        <script src="//code.tidio.co/pnj0lily1m2ccilyf0elhrzi7s64qoyu.js" async></script>