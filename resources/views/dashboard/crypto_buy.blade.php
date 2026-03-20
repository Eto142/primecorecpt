@include('dashboard.header')
 <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="buysell wide-xs m-auto">
                                <div class="buysell-nav text-center">
                                    <ul class="nk-nav nav nav-tabs nav-tabs-s2">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('crypto_buy')}}">Buy</a>
                                        </li>
                                       
                                    </ul>
                                </div><!-- .buysell-nav -->
                                <div class="buysell-title text-center">
                                    <h2 class="title">Click on the button below to get your Crypto</h2>
                                </div><!-- .buysell-title -->
                                <div class="buysell-block">
                                    <form action="#" class="buysell-form">
                                        
                                        <div class="buysell-field form-group">
                                            
                                             
                                        <div class="buysell-field form-action">
                                            
                                            <a href="https://www.localbitcoins.com/"  class="btn btn-lg btn-block btn-primary" >Buy from Localbitcoin</a><br><br>
                                            <a href="https://www.bitcoin.com/"  class="btn btn-lg btn-block btn-primary" >Buy from Bitcoin.com</a><br><br>
                                            <a href="https://www.binance.com/"  class="btn btn-lg btn-block btn-primary" >Buy from Binance</a><br><br>
                                            <a href="https://www.crypto.com/"  class="btn btn-lg btn-block btn-primary" >Buy from Crypto.com</a>
                                        </div><!-- .buysell-field -->
                                        
                                    </form><!-- .buysell-form -->
                                </div><!-- .buysell-block -->
                            </div><!-- .buysell -->
                        </div>
                    </div>
                </div>
                
    @include('dashboard.footer')