<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <base href="{{asset('')}}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title class="hidden-print">E-STU - Tập đoàn điện lực STU</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

@yield('link')
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->

</head>

<body >
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    @include('header')
        <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">

        <!-- sidebar menu start-->
        <ul class="sidebar-menu hidden-print" id="nav-accordion">
          
          <p class="centered"><a href="{{route('home')}}"><img src="img/users/{{Auth::user()->hinhanh}}" class="img-circle" width="80"></a></p>
          <h5 class="centered">{{Auth::user()->tennv}}</h5>
    
          <li class="mt">
            <a  href="{{route('home')}}">
              <i class="fa fa-home"></i>
              <span>Trang chủ </span>
              </a>
          </li>
          @can('isAdmin')
               <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-search" ></i>
              <span>Tra cứu thông tin</span>
              </a>
              <ul class="sub">
              <li><a href="e-stu/tracuuno/dsno"> <i class="fa fa-money"></i>Theo dõi nợ tiền điện</a></li>
              <li><a href="e-stu/tracuuno/dskh"> <i class="fa fa-users"></i>Tra cứu khách hàng</a></li>
              <li><a href="e-stu/tracuuno/dsdk"> <i class="fa fa-bolt"></i>Tra cứu điện kế</a></li>
            </ul>
          </li>


          <li>
            <a href="e-stu/qlgiadien/danhsach">
              <i class="fa fa-signal" ></i>
              <span>Quản lí giá điện</span>
              </a>
          </li>
            <li>
            <a href="e-stu/qldk/danhsach">
              <i class="fa fa-flash" ></i>
              <span>Quản lí điện kế</span>
              </a>
          </li>
             <li>
            <a href="e-stu/qlnv/danhsach">
              <i class="fa fa-user" ></i>
              <span>Quản lí nhân viên</span>
              </a>
          </li>
         <li>
            <a href="e-stu/qlkh/danhsach">
              <i class="fa fa-users" ></i>
              <span>Quản lí khách hàng</span>
              </a>
          </li>
          
            @endcan
            @if(Gate::check('isAdmin') || Gate::check('isGhidien'))
             <li>
            <a href="e-stu/ghidien/truycap">
              <i class="fa fa-file-text" ></i>
              <span>Ghi số điện</span>
              </a>
          </li>  
       @endif
        @if(Gate::check('isAdmin') || Gate::check('isThutien'))
       <li>
            <a href="e-stu/thanhtoan/truycap">
              <i class="fa fa-money" ></i>
              <span>Thanh toán hóa đơn</span>
              </a>
          </li>   
           @endif



        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    @yield('content')
    @include('footer')
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>

  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
   
  <!--script for this page-->
    @yield('script')
 
</body>

</html>
