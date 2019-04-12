@extends('master')
@section('link')

  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->

  <script src="lib/chart-master/Chart.js"></script>
@endsection
@section('content')

    
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
 <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">
          <div class="col-lg-12">
            <div class="row content-panel">
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="mt10">
                    <span id="ContentPlaceHolder1_ctl00_1393_ltlTitle">TỔNG QUAN VỀ TẬP ĐOÀN ĐIỆN LỰC E-STU</span>
                </h1>
                <p>
                    <strong>
                        </strong>
                </p>
                <p>
                    <span id="ContentPlaceHolder1_ctl00_1393_FullDescirbe"></span></p><p style="text-align: justify;">Tổng công ty E-STU được thành lập theo Quyết định số 562/QĐ-TTg ngày 10/10/1994 của Thủ tướng Chính phủ trên cơ sở sắp xếp lại các đơn vị thuộc Bộ Năng lượng; tổ chức và hoạt động theo Điều lệ ban hành kèm theo Nghị định số 14/CP ngày 27/1/1995 của Chính phủ.</p>

<p style="text-align: justify;">Ngày 28/2/2018, Thủ tướng Chính phủ ban hành Nghị định số 26/2018/NĐ-CP&nbsp;về Điều lệ tổ chức và hoạt động của Tập đoàn Điện lực E-STU. Nghị định có hiệu lực thi hành kể từ ngày ban hành (thay thế cho Nghị định số 205/2013/NĐ-CP&nbsp;ngày 6/12/2013), với một số nội dung chính như sau:</p>

<p style="text-align: justify;"><strong>* Tên gọi:</strong></p>

<p style="text-align: justify;">- Tên gọi đầy đủ: TẬP ĐOÀN ĐIỆN LỰC E-STU.</p>

<p style="text-align: justify;">- Tên giao dịch: TẬP ĐOÀN ĐIỆN LỰC E-STU.</p>

<p style="text-align: justify;">- Tên giao dịch tiếng Anh: STU ELECTRICITY.</p>

<p style="text-align: justify;">- Tên gọi tắt: E-STU.</p>

<p style="text-align: justify;"><strong>* Loại hình doanh nghiệp: </strong>Công ty trách nhiệm hữu hạn một thành viên</p>

<p style="text-align: justify;"><strong>* Ngành, nghề kinh doanh chính: </strong></p>

<p style="text-align: justify;">- Sản xuất, truyền tải, phân phối và kinh doanh mua bán điện năng; chỉ huy điều hành hệ thống sản xuất, truyền tải, phân phối và phân bổ điện năng trong hệ thống điện quốc gia;</p>

<p style="text-align: justify;">- Xuất nhập khẩu điện năng;</p>

<p style="text-align: justify;">- Đầu tư và quản lý vốn đầu tư các dự án điện;</p>

<p style="text-align: justify;">- Quản lý, vận hành, sửa chữa, bảo dưỡng, đại tu, cải tạo, nâng cấp thiết bị điện, cơ khí, điều khiển, tự động hóa thuộc dây truyền sản xuất, truyền tải và phân phối điện, công trình điện; thí nghiệm điện.</p>

<p style="text-align: justify;">- Tư vấn quản lý dự án, tư vấn khảo sát thiết kế, tư vấn lập dự án đầu tư, tư vấn đấu thầu, lập dự toán, tư vấn thẩm tra và giám sát thi công công trình nguồn điện, các công trình đường dây và trạm biến áp.</p>

<p style="text-align: justify;">Thực hiện nhiệm vụ cung cấp điện cho nhu cầu phát triển kinh tế - xã hội của đất nước, E-STU hiện có <em>1 tổng công ty phát điện</em> Tổng công ty Điện lực STU (E-STU). Phụ trách lĩnh vực truyền tải điện của Tập đoàn Điện lực Việt Nam hiện nay là Tổng công ty Truyền tải điện Quốc gia (EVNNPT).</p>

<p style="text-align: justify;">&nbsp;<strong>Địa chỉ liên hệ:</strong></p>

<p style="text-align: justify;"><em><strong>Tập đoàn Điện lực E-STU (E-STU)</strong></em></p>

<p style="text-align: justify;">- Trụ sở chính:&nbsp;Số 180 Cao Lỗ, phường 4, quận 8, thành phố Hồ Chí Minh.</p>

<p style="text-align: justify;">- Điện thoại: (+844)66946789</p>

<p style="text-align: justify;">- Fax: (+844)66946666</p>

<p style="text-align: justify;">- Website: <a href="http://www.e-stu.tk/">http://www.e-stu.tk/</a></p>

                <p></p>
                <p>  </p>
                <hr class="mtn mbn">
            </div>







              
     
             </div>
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
         
          <!-- /col-lg-12 -->
         
          <!-- /row -->
        </div>
        <!-- /container -->
      </section>
      <!-- /wrapper -->
    </section>
@endsection
    
@section('script')
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Xin chào {{Auth::user()->tennv}} !',
        // (string | mandatory) the text inside the notification
        text: 'Chúc bạn một ngày làm việc vui vẻ ',
        // (string | optional) the image to display on the left
        image: 'img/users/{{Auth::user()->hinhanh}}',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
@endsection

