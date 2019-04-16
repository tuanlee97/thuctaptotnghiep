<!DOCTYPE html>
<html lang="en">

<head>
  <base href="../../">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>E-STU - Tập đoàn điện lực STU</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
 <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" />
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
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>E -<span>STU</span></b></a>
      <!--logo end-->
     
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="login.html">Đăng xuất</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="index.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">Tên Nhân Viên</h5>
          <li class="mt">
            <a  href="index.html">
              <i class="fa fa-home"></i>
              <span>Trang chủ</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-search" ></i>
              <span>Tra cứu thông tin</span>
              </a>
              <ul class="sub">
              <li><a href="tra_theodoinotiendien.html"> <i class="fa fa-money"></i>Theo dõi nợ tiền điện</a></li>
              <li><a href="tra_khachhang.html"> <i class="fa fa-users"></i>Tra cứu khách hàng</a></li>
              <li><a href="tra_dienke.html"> <i class="fa fa-bolt"></i>Tra cứu điện kế</a></li>
            </ul>
          </li>
          <li>
            <a  href="ql_giadien.html">
              <i class="fa fa-signal" ></i>
              <span>Quản lí giá điện</span>
              </a>
          </li>
            <li>
            <a href="ql_dienke.html">
              <i class="fa fa-flash" ></i>
              <span>Quản lí điện kế</span>
              </a>
          </li>
             <li>
            <a href="ql_nhanvien.html">
              <i class="fa fa-user" ></i>
              <span>Quản lí nhân viên</span>
              </a>
          </li>
         <li>
            <a href="ql_khachhang.html">
              <i class="fa fa-users" ></i>
              <span>Quản lí khách hàng</span>
              </a>
          </li>
             <li>
            <a href="ql_ghisodien.html">
              <i class="fa fa-file-text" ></i>
              <span>Ghi số điện</span>
              </a>
          </li>
       <li>
            <a class="active" href="ql_thanhtoan.html">
              <i class="fa fa-money" ></i>
              <span>Thanh toán hóa đơn</span>
              </a>
          </li>
        
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
          <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
               <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i>Hóa đơn dịch vụ</h4>
                <hr>
                <div class="row mt">

              <div style="margin-bottom:10px;" >
                  <input style="float: right;margin-right:30px" type="search" name="search" placeholder="Tìm kiếm...">
                  <img style="float: right;"src="https://img.icons8.com/color/35/000000/search.png">
                </div>
             
              </div>
                <thead>
                  <tr>
                    <th><i class="fa fa-info-circle"></i> Mã khách hàng</th>
                    <th><i class="fa fa-user"></i> Tên khách hàng</th>
                    <th class="hidden-phone"><i class="fa fa-barcode"></i> Mã hóa đơn</th>
                    <th><i class="fa fa-calendar"></i> Kì</th>
                    <th><i class="fa fa-money"></i> Số tiền</th>
                    <th><i class="fa fa-bell"></i> Trình trạng</th>
                    <th><i class="fa fa-print"></i> In hóa đơn</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <a>KH01</a>
                    </td>
                    <td class="hidden-phone"><b>Lê Văn Đạt</b></td>
                    <td> HD0003</td>
                    <td> 15/3/2019</td>
                    <td> 59.645 đ </td>
                    <td><button type="button" class="btn btn-theme">Thanh toán</button></td>
                    <td>
                      
                    </td>
                  </tr>
                           <tr>
                    <td>
                      <a>KH01</a>
                    </td>
                    <td class="hidden-phone"><b>Lê Văn Đạt</b></td>
                    <td> HD0002</td>
                    <td> 12/2/2019</td>
                    <td> 110.254 đ </td>
                    <td>Đã thanh toán</td>
                    <td>
                      <button  class="btn btn-primary btn-xs"  onclick="javascript:window.location.href='controller/thanhtoan/inhoadon.html'; return false;"><i  class="fa fa-print"></i></button>
                 
                    </td>
                  </tr>
                        <tr>
                    <td>
                      <a>KH01</a>
                    </td>
                    <td class="hidden-phone"><b>Lê Văn Đạt</b></td>
                    <td> HD0001</td>
                    <td> 13/1/2019</td>
                    <td> 78.654 đ </td>
                    <td>Đã thanh toán</td>
                    <td>
                      <button  class="btn btn-primary btn-xs"  onclick="javascript:window.location.href='controller/thanhtoan/inhoadon.html'; return false;"><i class="fa fa fa-print"></i></button>
  
                    </td>
                  </tr>
                     
                </tbody>
              </table>
              <div> 
                <nav aria-label="...">
               <ul style="float: right;" class="pagination">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Trước</a>
                  </li>
                  <li class="page-item active"><a class="page-link" href="#">1<span class="sr-only">(current)</span></a></li>
                  <li class="page-item ">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Sau</a>
                  </li>
                </ul>
              </nav>
            </div>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>E-STU</strong>. All Rights Reserved 2019
        </p>
  
        <a href="ql_giadien.html" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
    <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script type="text/javascript">
    /* Formating function for row details */
    $(document).ready(function() {    
      var oTable = $('#table-list').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [1, 'asc']
        ]
      });

    });
  </script>

</body>

</html>