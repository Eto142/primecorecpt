@include('dashboard.header')
<div class="content">
    <div class="container">
        <div class="card-body">
            <div class="card-title">

            </div>
            <hr>
            <br>
            <br>
            <br>
            <br>

            <h3 style="text-align: center;">FUND YOUR ACCOUNT</h3>

        </div>

    </div>


</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <center>
                <h5 class="card-title"><a href="#">VIEW PRICING</a></h5>
                <hr>
                <h5 class="card-title"><a href="{{url('crypto_buy')}}">BUY BITCOIN OR ETHEREUM</a></h5>
                <hr>
            </center>

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
            @endif

            <form accept-charset="utf-8" method="post" action="{{url('get-deposit')}}">
                {{csrf_field()}}
                <div class="mb-3">
                    <label for="email" class="form-label">{{Auth::user()->currency}}</label>
                    <input type="number" name="amount" placeholder="Amount" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Pay With</label>

                    <select name="item" class="form-select" required>
                        <option value="Bitcoin">Bitcoin</option>
                        <option value="Ethereum">Ethereum</option>
                        <option value="Usdt">Usdt</option>

                    </select>



                </div>



                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" name="" value="Proceed to Payment">
                </div>
            </form>
        </div>
    </div>
</div>

</div>
</div>
</div>
<script type="text/javascript">
    function copybtc(){
var copyText = document.getElementById("btc");
copyText.select();


/* Copy the text inside the text field */
document.execCommand("copy");
copyText.setSelectionRange(0, 99999);
navigator.clipboard.writeText(copyText.value);

window.alert("Bitcoin Wallet Address copied");

}
</script>
<script type="text/javascript">
    function copyeth(){
var copyText = document.getElementById("eth");
copyText.select();


/* Copy the text inside the text field */
document.execCommand("copy");
copyText.setSelectionRange(0, 99999);
navigator.clipboard.writeText(copyText.value);
window.alert("Ethereum Wallet Address copied");

}
</script>
<script type="text/javascript">
    function copyusdt(){
var copyText = document.getElementById("usdt");
copyText.select();


/* Copy the text inside the text field */
document.execCommand("copy");
copyText.setSelectionRange(0, 99999);
navigator.clipboard.writeText(copyText.value);
window.alert("USDT Wallet Address copied");

}
</script>


@include('dashboard.footer')