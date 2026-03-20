@include('dashboard.header')
<div class="main-panel bg-light">
            <div class="content bg-light">
                <div class="page-inner">
                    <div class="mt-2 mb-4">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    <h3 class="title1 text-dark">Transactions on your account</h3>
                    </div>
                    <div>
    </div>                  <div>
    </div>                  <div class="mb-5 row">
                    <div class="col text-center card p-4 bg-light">
                        
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
        
                                  <h4 class="pt-3 nav-item nav-link active " id="nav-home-tab" data-toggle="tab" href="#1" role="tab" aria-controls="nav-home" aria-selected="true"> Deposits</h4>
        
                                  <h4 class="pt-3 nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#2" role="tab" aria-controls="nav-profile" aria-selected="false">Withdrawals</h4>
        
                                  <h4 class="pt-3 nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#3" role="tab" aria-controls="nav-contact" aria-selected="false">Others</h4>
                                </div>
                            </nav>
                            
                            <div class="px-3 py-3 tab-content px-sm-0" id="nav-tabContent">
        
                                
                                <div class="tab-pane fade show active bg-light card p-3" id="1" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
                                    <table id="UserTable" class="UserTable table table-hover text-dark"> 
                                            <thead> 
                                                <tr> 
                                                    <th>Amount</th>
                                                    <th>Payment mode</th>
                                                    <th>Status</th> 
                                                    <th>Date created</th>
                                                </tr> 
                                            </thead> 
                                            <tbody> 
                                            @foreach($deposit as $deposithistory)
                                            <tr>
                                                    
                                                  
                                                    <td>{{$deposithistory->amount}}</td>
                                                    <td>{{$deposithistory->payment_method}}</td>
                                                    @if($deposithistory->status=='0')
                                                    <td>pending</td>
                                                    @else <td>approved</td>
                                                    @endif
                                                    <td>{{$deposithistory->created_at}}</td>
                                                    

                                                </tr>
                                              @endforeach
                                             </tbody> 
                                        </table>
                                    </div>
                                </div>
        
                                
                                <div class="tab-pane fade p-3 bg-light" id="2" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
                                    <table id="UserTable" class="UserTable table table-hover text-dark"> 
                                            <thead> 
                                                <tr> 
                                                    <th>Amount requested</th>
                                                    <th>Recieving mode</th>
                                                    <th>Status</th> 
                                                    <th>Date created</th>
                                                </tr> 
                                            </thead> 
                                            <tbody> 
                                            @foreach($withdrawal as $withdrawalhistory)
                                            <tr>   
                                                    <td>${{$withdrawalhistory->amount}}</td>
                                                    <td>{{$withdrawalhistory->mode}}</td>
                                                   
                                                    @if($withdrawalhistory->status=='0')
                                                    <td style="color:red;">pending</td>
                                                    @else <td style="color:green;">approved</td>
                                                    @endif
                                                    <td>{{$withdrawalhistory->created_at}}</td>
                                                </tr>
                                             @endforeach
                                          </tbody>
                                        </table>
                                    </div>
                                </div>
        
                                
                                <div class="tab-pane fade p-3 bg-light" id="3" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
                                        <table id="UserTable" class="UserTable table table-hover text-dark"> 
                                            <thead> 
                                                <tr> 
                                                    <th>Amount</th>
                                                    <th>Type</th>
                                                    <th>Plan/Narration</th>
                                                    <th>Date created</th>
                                                </tr> 
                                            </thead> 
                                            <tbody> 
                                            <tbody> 
                                            @foreach($earning as $earnings)
                                            <tr>   
                                                    <td>${{$earnings->amount}}</td>
                                                    <td>${{$earnings->type}}</td>
                                                    <td>{{$earnings->narration}}</td>
                                                    <td>{{$earnings->created_at}}</td>
                                                </tr>
                                       @endforeach
                                     </tbody> 
                                        </table>
                                        
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- Submit MT4 MODAL modal -->
            <div id="submitmt4modal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h4 class="modal-title text-dark">Subscribe to subscription Trading</h4>
                        <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
                  </div>
                    <div class="modal-body bg-light">
                        <form role="form" method="post" action="https://trader.digitalcryptocurrencytrade.com/dashboard/savemt4details">
                            <input type="hidden" name="_token" value="Fjidygf8htWNKYfzA1gghmAzNy14B2KG2mPGJlZ0">                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Subscription Duration</h5>
                                    <select class="form-control bg-light text-dark" onchange="calcAmount(this)" name="duration" class="duration" id="duratn">
                                        <option value="default">Select duration</option>
                                        <option>Monthly</option>
                                        <option>Quaterly</option>
                                        <option>Yearly</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Amount to Pay</h5>
                                    <input class="form-control subamount bg-light text-dark" type="text" id="amount" disabled><br/>
                                    
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark ">MT4 ID*:</h5>
                                    <input class="form-control bg-light text-dark"  type="text" name="userid" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark ">MT4 Password*:</h5>
                                    <input class="form-control bg-light text-dark"  type="text" name="pswrd" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark ">Account Type:</h5>
                                    <input  class="form-control bg-light text-dark" Placeholder="E.g. Standard" type="text" name="acntype" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark ">Currency*:</h5>
                                    <input  class="form-control bg-light text-dark" Placeholder="E.g. USD" type="text" name="currency" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark ">Leverage*:</h5>
                                    <input  class="form-control bg-light text-dark" Placeholder="E.g. 1:500"  type="text" name="leverage" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark ">Server*:</h5>
                                    <input  class="form-control bg-light text-dark" Placeholder="E.g. HantecGlobal-live"  type="text" name="server" required>
                                </div>
                                <div class="form-group col-12">
                                    <small class="text-dark">Amount will be deducted from your Account balance</small>
                                </div>
                                <div class="form-group col-md-6">
                                    <input id="amountpay" type="hidden" name="amount">
                                    <input type="submit" class="btn btn-primary" value="Subscribe Now">
                                </div>
                            </div>
                       </form>
                  </div>
                </div>
              </div>
            </div>
 

@include('dashboard.footer')