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
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
  
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
<!--main content start-->
    <section id="main-content">
    	      <section class="wrapper">
       <div class="row mt">
           <div class="col-lg-12">
            <h4><i class="fa fa-angle-right"></i> Thêm Điện Kế</h4>
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
                <form action="e-stu/qldk/xulythem" class="cmxform form-horizontal style-form"  method="post" enctype="multipart/form-data">
         				  @csrf
                     <div class="form-group ">
                    <label for="tendk" class="control-label col-lg-2">Tên điện kế</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="tendk" name="tendk" type="text" placeholder="Nhập tên điện kế" />
                    </div>
                  </div>
                 
                  <div class="form-group ">
                    <label for="ngaysanxuat" class="control-label col-lg-2">Ngày sản xuất</label>
                    <div class="col-lg-10">
                    <div id="datepicker2" class="input-group date" data-date-format="yyyy-mm-dd"> 
                      <input class="form-control" readonly="" type="text" name="ngaysanxuat"> 
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
                  </div>
                  </div>
                  </div>
        
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">

                      <button class="btn btn-theme" type="submit">Thêm</button>
                      <button class="btn btn-theme04" type="button" onclick="javascript:window.location.href='e-stu/qldk/danhsach';">Hủy</button> 

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

 
        <!-- /row -->

      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
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
$("#datepicker2").datepicker({         
autoclose: true,         
todayHighlight: true 
}).datepicker('update', new Date());
});
</script>
<link rel="stylesheet prefetch" href="lib/datepicker.css"><script src="lib/bootstrap-datepicker.js"></script>
@endsection

