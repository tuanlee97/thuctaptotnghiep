@extends('master')
@section('link')
<!-- 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

   <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" /> -->
  <!-- Custom styles for this template -->

<!--   <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" /> -->
  <!-- Custom styles for this template -->

<!--   <script src="lib/chart-master/Chart.js"></script> -->
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
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover" id="table-list">
                <h4><i class="fa fa-angle-right"></i>Quản lí giá điện</h4>
                <hr>
                <div class="row mt">
                       
               @if (session('status1'))
        <div class="alert alert-success" role="alert" >
        {{ session('status1') }}
        </div>
          @endif
              <div style="margin-bottom:10px;" >
                 
                 <button style="margin-left:30px" type="button" onclick="javascript:window.location.href='e-stu/qlgiadien/them'" class="btn btn-success"><i class="fa fa-plus-circle">&nbsp;Thêm giá điện</i></button>
             
                </div>
             
             
                <thead>
                  <tr>
                    <th><i class="fa fa-info-circle"></i> Mã bậc</th>
                    <th><i class="fa fa-flag"></i> Tên bậc</th>
                    <th class="hidden-phone"><i class="fa fa-tags"></i> Mô tả</th>
                    <th><i class="fa fa-money"></i> Giá tiền</th>
                    <th><i class=" fa fa-edit"></i> Thao tác</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                	@foreach ($giadien as $gia)
                  <tr>
                    <td>
                      &emsp;&emsp;<b>{{$gia->mabac}}</b>
                    </td>
                    <td class="hidden-phone"><b>{{$gia->tenbac}}</b></td>
                    @if($gia->densokw==9999) <td>Từ {{$gia->tusokw}} kWh trở lên </td> 
                    @else<td>Từ {{$gia->tusokw}} - {{$gia->densokw}} kWh </td>@endif
                    <td><span class="label label-info label-mini">{{$gia->dongia}}</span></td>
                    <td>
                      <button class="btn btn-primary btn-xs" onclick="javascript:window.location.href='e-stu/qlgiadien/sua/{{$gia->mabac}}';"><i class="fa fa-pencil"></i></button>
                    <a class="delete" href="e-stu/qlgiadien/xoa/{{$gia->mabac}}">  <button type="button" class="btn btn-danger btn-xs" 
                      ><i class="fa fa-trash-o "></i></button></a>
                    </td>
                  </tr>
            	@endforeach
                </tbody>
              </table>
              
              <div> 
                <nav aria-label="...">
               <div style="float: right;" >{{$giadien->links()}}</div>
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
@endsection
    
@section('script')
 <!-- <script src="lib/jquery.sparkline.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script> -->
  <!--script for this page-->
 <!--  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script> -->
  <!--script for this page-->
<script type="text/javascript">
        $(document).ready(function() {
            $('.delete').click(function() {
                var r = confirm("Bạn có chắc chắn muốn xóa ?");
                if (r == true) {
                    return true;
                } else {
                  return false;
              }
          });
        });
    </script>
 
@endsection

