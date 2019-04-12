<!DOCTYPE html>
<html lang="en">

<head>
  <base href="{{asset('')}}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>E-STU - Tập đoàn Điện lực STU</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/logo" rel="logo">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="/" method="post" >
         @csrf
        <h2 class="form-login-heading">ĐĂNG NHẬP</h2>
        <div class="login-wrap">
          <input id="manv" class="form-control{{ $errors->has('manv') ? ' is-invalid' : '' }}" name ="manv" type="manv" placeholder="Mã nhân viên" value="{{ old('manv') }}" required autofocus>
                                @if ($errors->has('manv'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('manv') }}</strong>
                                    </span>
                                @endif
      
       <br>
           <input id="password" type="password" placeholder="Mật khẩu" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required >
               @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
      
          <label class="checkbox" >
            <input type="checkbox" style="margin-left: 2px " name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>&emsp;&emsp;Lưu tài khoản
            <span class="pull-right">
            <a data-toggle="modal" href="#myModal"> Quên mật khẩu ?</a>
            </span>
            </label>
          <button class="btn btn-theme btn-block" href="#" type="submit"><i class="fa fa-lock"></i> ĐĂNG NHẬP</button>
             @if (session('status1'))
        <div class="alert alert-danger" role="alert" >
        {{ session('status1') }}
        </div>
          @endif
               @if (session('status2'))
        <div class="alert alert-success" role="alert" >
        {{ session('status2') }}
        </div>
          @endif
          <hr>
      
          <div class="registration">
            E-STU - Tập đoàn Điện lực STU
          </div>
        </div>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Quên mật khẩu ?</h4>
              </div>
              <div class="modal-body">
                <p>Nhập địa chỉ email của bạn vào ô bên dưới để tạo lại mật khẩu.</p>
                <input type="email" name="emailreset" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Hủy</button>
                <button class="btn btn-theme" type="button">Xác nhận</button>
              </div>
            </div>
          </div>
        </div>
        {{csrf_field()}}
        <!-- modal -->
      </form>
     
       
   
    </div>
  </div>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>
      <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
            var $submit = $("button[type = 'submit']");
            $submit.click(function() {
                // event.preventDefault();
            });
        });
    </script>

</body>

</html>
