<!DOCTYPE html>
<html>

<!-- Mirrored from  by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Dec 2021 09:08:22 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register | Opts</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
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

<body class="hold-transition register-page" style="background-image: url('{{asset('images/bg2.jpg')}}');">


  <div class="nk-ovm mask-a shape-a"></div>
  <!-- Place Particle Js -->
  <div id="particles-bg" class="particles-container particles-bg"></div>
  </div>
  <div class="register-box">
    <div class="register-logo" style="margin-bottom: 1px;">
     <a href="/"><img src="{{asset('io.png')}}" class="img-responsive"></a>

    </div>

    <div class="register-box-body">
      <h3 class="login-box-msg"> Your PIN is on the way</h3>
      <p class="login-box-msg">
      <p>An email containing your 4-digit PIN is has been sent to {{Auth::user()->email}}


        If you haven’t received it in a minute or two, click
        <a href="{{route('resendCode',Auth::user()->id)}}">
          <p>‘Resend PIN’.</p>
        </a>
      </p>
                                                      @if (session('error'))
                                                <div class="alert alert-danger" role="alert">
                                                    {{ session('error') }}
                                                </div>
                                                @endif
                                                @if($message = Session::get('success'))
                                                <div class="alert alert-success">
                                                    <p>{{$message}}</p>
                                                </div>
                                                @endif
      <form method="POST" action="{{ route('code') }}">
        @csrf



        <div class="form-group has-feedback">
          <input type="number" name="digit" class="form-control" placeholder="Enter pin" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>




        <div class="form-group">
          <button name="next" class="btn btn-lg btn-primary btn-block">Next</button>
        </div>
        </form>
         <form method="POST" action="{{ route('logout') }}">
        @csrf
         <div class="form-group">
          <button name="next" class="btn btn-lg btn-primary btn-block">Logout</button>
        </div>
      </form><!-- form -->

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