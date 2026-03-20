<!DOCTYPE html>
<html>

<!-- Mirrored from  by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Dec 2021 09:08:22 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register | PrimeCore Capitals</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="icon" href="img/favicon.png">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<!-- Smartsupp Live Chat script --> 

<body class="hold-transition register-page" style="background-image: url('images/bg2.jpg');">


  <div class="nk-ovm mask-a shape-a"></div>
  <!-- Place Particle Js -->
  <div id="particles-bg" class="particles-container particles-bg"></div>
  </div>
  <div class="register-box">
    <div class="register-logo" style="margin-bottom: 1px;">
      <a href="/"><img src="io.png" class="img-responsive"></a>

    </div>

    <div class="register-box-body">
      <h3 class="login-box-msg"> Register</h3>
      <p class="login-box-msg"> Please Complete All Fields</p>
      <div
        style="height:62px; background-color: #1D2330; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; block-size:62px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38;padding:1px;padding: 0px; margin: 0px; width: 100%;">
        <div style="height:40px; padding:0px; margin:0px; width: 100%;"><iframe
            src="https://widget.coinlib.io/widget?type=horizontal_v2&amp;theme=dark&amp;pref_coin_id=1505&amp;invert_hover=no"
            width="100%" height="36px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0"
            style="border:0;margin:0;padding:0;"></iframe></div>
        <div
          style="color: #626B7F; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;">
          <a href="https://coinlib.io/" target="_blank"
            style="font-weight: 500; color: #626B7F; text-decoration:none; font-size:11px">Invest in Crypto!</a>&nbsp;
        </div>
      </div>
      <br>
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group has-feedback">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>


<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<script>
function myFunctio() {
  var x = document.getElementById("myInpu");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

      

        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password" id="myInput">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
           <input type="checkbox" onclick="myFunction()">Show Password
        </div>
        

        <div class="form-group has-feedback">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" id="myInpu">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          <input type="checkbox" onclick="myFunctio()">Show Password
        </div>
            

        <div class="form-group has-feedback">
          <input type="text" name="name" class="form-control" placeholder="First Name" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <select class="form-control" name="currency" required>
            <option value="$">USD</option>
            <option value='£'>GBP</option>
            <option value='€'>EUR</option>
            <option value='$'>AUD</option>
          </select>
        </div>
        <div class="form-group">
          <div class="custom-control custom-control-xs custom-checkbox">
            <input type="checkbox" required class="custom-control-input" id="checkbox">
            <label class="custom-control-label" for="checkbox">I Accept That I Am 18 Years Or Older And Accept Terms &
              Conditions And Privacy Policy <a tabindex="-1" href="{{url('privacy')}}">Privacy Policy</a> &amp; <a
                tabindex="-1" href="{{url('terms')}}"> Terms.</a></label>
          </div>
        </div>
        <br>
        <div class="form-group">
          <button name="next" {{ __('Register') }} class="btn btn-lg btn-primary btn-block">Create My Account</button>
        </div>
      </form><!-- form -->
      <div class="form-note-s2 pt-4"> Already have an account ? <a href="{{route('login')}}"><strong>Login</strong></a>
          <div class="form-note-s2 pt-4"> <a href="{{route('login')}}"><strong>Forgot Password?</strong></a>
      </div>
    </div>
    <!-- /.form-box -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery 3 -->
  <script src="dist/js/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="dist/js/bootstrap.min.js"></script>

</body>

<!-- Mirrored from Cityfxmarkets.cc/register.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Dec 2021 09:08:23 GMT -->

</html>