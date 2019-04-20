@extends('master')
@section('link')
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
<!--   <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <script src="lib/chart-master/Chart.js"></script> -->
  <!-- Custom styles for this template -->

@endsection
@section('content')
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->

    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <section id="main-content">
      <section class="wrapper">
       <div class="row mt">
           <div class="col-lg-12">
            <h4><i class="fa fa-angle-right"></i> Thêm Bậc Giá Điện</h4>
            <div class="form-panel">
               @if (session('status1'))
        <div class="alert alert-success" role="alert" >
        {{ session('status1') }}
        </div>
          @endif
                  @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach ($errors -> all() as $err)
                    {{$err}}<br>
                    @endforeach
                </div>

                @endif

           
             <div class="form">     
                <form action="e-stu/qlgiadien/xulythem" class="cmxform form-horizontal style-form"  method="post" enctype="multipart/form-data">
         				  @csrf
                  <div class="form-group ">
                    <label for="tenbac" class="control-label col-lg-2">Tên Bậc</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="tenbac" name="tenbac" type="text" placeholder="Nhập tên bậc" />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="tusoKWh" class="control-label col-lg-2">Từ Số KWh</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="tusoKWh" name="tusokwh" type="text" placeholder="Từ Số KWh" />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="densoKWh" class="control-label col-lg-2">Đến Số KWh</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="densoKWh" name="densokwh" type="text" placeholder="Đến Số KWh" />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="dongia" class="control-label col-lg-2">Đơn Giá</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="dongia" name="dongia" type="text" placeholder="Nhập Đơn giá" />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="ngayapdung" class="control-label col-lg-2">Ngày áp dụng</label>
                    <div class="col-lg-10">
                    <div id="datepicker2" class="input-group date" data-date-format="yyyy-mm-dd"> 
                      <input class="form-control" readonly="" type="text" name="ngayapdung"> 
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
                  </div>
                  </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">

                      <button class="btn btn-theme" type="submit">Thêm</button>
                      <button class="btn btn-theme04" type="button" onclick="javascript:window.location.href='e-stu/qlgiadien/danhsach';">Hủy</button> 

                    </div>
                  </div>

 {{csrf_field()}}
                </form>

              </div>

            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->

        <!-- row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
@endsection
    
@section('script')

  <!--script for this page-->

  
 <!--  <script src="lib/jquery.sparkline.js"></script>
    <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <script src="lib/sparkline-chart.js"></script> -->
  <script src="lib/zabuto_calendar.js"></script>
  
<!-- <script src="js/jquery-1.11.1.min.js"></script> -->
<script type="text/javascript">
$(function () {  
$("#datepicker2").datepicker({         
autoclose: true,         
todayHighlight: true 
}).datepicker('update', new Date());
});
</script>
<link rel="stylesheet prefetch" href="lib/datepicker.css"><script src="lib/bootstrap-datepicker.js"></script>
  <!--script for this page-->

  
@endsection

