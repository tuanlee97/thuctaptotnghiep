@extends('master')
@section('link')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!--    <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" /> -->
  <link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" />
  <!-- Custom styles for this template -->
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
<!--   <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <script src="lib/chart-master/Chart.js"></script> -->
@endsection
@section('content')
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">
          <div class="col-lg-12">    
            <div class="row content-panel">

              <div class="col-md-4 profile-text mt mb centered">
                
                <div class="right-divider hidden-sm hidden-xs">
                  <h5>NGÀY KÍ HỢP ĐỒNG</h5>
                  <h4>{{date('d/m/Y',strtotime($dienke->ngaylap))}}<h4>
                  <h5>ĐIỆN KẾ SỐ HIỆU</h5>
                  <h4>{{$dienke->madk}}</h4>
                </div>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 profile-text">
                <h3>{{$khachhang->tenkh}}</h3>
                
                <address>
                      <strong>Mã: {{$khachhang->makh}}</strong><br>
                 {{$khachhang->diachi}}<br>
                  SĐT: {{$khachhang->sdt}}
                </address>
              
                
              </div>

              <!-- /col-md-4 -->
              <div class="col-md-4 centered">
                <div class="profile-pic">
                  <p><img src="img\customers\{{$khachhang->hinhanh}}" class="img-circle"></p>
                </div>
              </div>
            
              <!-- /col-md-4 -->
            </div>
            <div style="margin: 10px;"></div>
            <!-- /row -->
            <!--Ghi điện -->

 
        <div class="row content-panel">

               @if (session('loi'))
        <div class="alert alert-danger" role="alert" >
        {{ session('status1') }}
        </div>
          @endif
              <form class="form-horizontal style-form"  method="post" enctype="multipart/form-data" action="e-stu/ghidien/xulighidien/{{$khachhang->makh}}">@csrf
                <label class="control-label col-md-3" >Ngày ghi điện: </label>
                <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy"> 
                  <input class="form-control" readonly="" type="text" name="ngayghi"> 
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
                </div>
                <label class="control-label col-md-3" >Nhập chỉ số cuối: </label>
                <div id="chisocuoi" class="input-group date"> 
                  <input class="form-control" name="cscuoi" type="text"> 
                </div>
                <div id="btnnhaplieu" class="input-group date">
                <button type="submit" class="btn btn-theme">Nhập liệu</button>
              </div>     {{csrf_field()}}
              </form>



        </div>
            <!-- /form-panel -->
    

              </div>
            <!--kết thúc-->
          </div>
          <!-- /col-lg-12 -->
          
          <!-- /row -->
        
        <!-- /container -->
      </section>
      <!-- /wrapper -->
    </section>
@endsection
    
@section('script')

<!--   <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script> -->
    <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--script for this page-->
<!-- <script type="text/javascript">
      $("#makh2").click(function() {
  $(":checkbox").not(this).prop("disabled", this.checked);

}); </script> -->

  <script type="text/javascript">
$(function () {  
$("#datepicker").datepicker({         
autoclose: true,         
todayHighlight: true 
}).datepicker('update', new Date());
});
</script>
<link rel="stylesheet prefetch" href="lib/datepicker.css"><script src="lib/bootstrap-datepicker.js"></script>
@endsection

