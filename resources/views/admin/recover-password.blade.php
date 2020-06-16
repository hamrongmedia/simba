<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('admin/adminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/adminLTE/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('admin/adminLTE/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/adminLTE/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/admin.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('admin/adminLTE/plugins/iCheck/square/blue.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="bottom-login">
  <div id="page-login" class="w-full justify-center items-center flex h-screen bg-img" style="background-image: url({{asset('images/vuexy-login-bg.jpg')}});background-position: 50%;background-repeat: no-repeat;background-size: cover;">
    <div class="content-login">
     <div class="row no-margin flex justify-center items-center">
      <div class="logo-login col-md-6 col-sm-12 no-padding  text-center">
        <img src="{{asset('images-demo/AdminLTELogo.png')}}" alt="">
      </div>
      <div class="cont-login col-md-6 col-sm-12 no-padding items-center flex">
        <form action="" method="post" class="w-full">
          <div class="box-body">
            <h2 class="text-center">RECOVER YOUR PASSWORD</h2>
            
            <p class="text-center">Please enter your email address and we'll send you instructions on how to reset your password.</p>
            <h6>Email</h6>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="text" class="form-control" placeholder="Email" name="recover_username">
            </div>
            <div class="form-group clearfix checkbox">
              <div class="row ">
                <div class="col-xs-6 text-right">
                  <button type="button" class="btn btn-primary btn-info ">Back To Login</button>
                </div>
                <div class="col-xs-6 ">
                    <button type="button" class="btn btn-primary btn-info ">Recover Password</button>

                </div>
              </div>
            </div>

          </div>
        </form>
      </div>

    </div>
  </div>
</div>

</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{asset('admin/adminLTE/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('admin/adminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('admin/adminLTE/plugins/iCheck/icheck.min.js')}}"></script>

</body>
</html>
