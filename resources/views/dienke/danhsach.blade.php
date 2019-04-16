@extends('master')
@section('link')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

   <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" />
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
<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
               <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover" id="table-list">
                <h4><i class="fa fa-angle-right"></i>Quản lí điện kế</h4>
                <hr>       
                @if(session('alert'))
               <div class="alert alert-danger">{{session('alert')}} </div> 
                @endif
                      @if (session('status1'))
                 <div class="alert alert-success" role="alert" >
              {{ session('status1') }}
              </div>
                @endif
                <div class="row mt">
                       
               
          
              <div style="margin-bottom:10px;" >
          
                 <button style="margin-left:30px" type="button" onclick="javascript:window.location.href='e-stu/qldk/them'" class="btn btn-success"><i class="fa fa-plus-circle">&nbsp;Thêm điện kế</i></button>
                  
                </div>
             
             
                <thead>
                  <tr>
                    <th><i class="fa fa-info-circle"></i> Mã điện kế</th>
                    <th><i class="fa fa-flag"></i> Ngày sản xuất</th>
                    <th class="hidden-phone"><i class="fa fa-tags"></i> Ngày lắp</th>
                    <th><i class="fa fa-money"></i> Trạng thái</th>
                    <th><i class=" fa fa-edit"></i> Thao tác</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                	@foreach ($dienke as $dk)
                  <tr>
                    <td>
                      &emsp;&emsp;<b>{{$dk->madk}}</b>
                    </td>
                    <td class="hidden-phone"><b>{{date('d/m/Y',strtotime($dk->ngaysx))}}</b></td>
                    <td><b>
                        <?php
                          $ngay=date('d/m/Y',strtotime($dk->ngaylap));
                          if($ngay=="01/01/1970")
                            echo "";
                            else 
                        echo $ngay; ?>
                       </b> </td>
                  
                    <td>
                      

                        @if($dk->trangthai == 0)
                        <span class="label label-success">Chưa lắp</span>
                        
                        @endif
                        @if($dk->trangthai == 1)
                        <span class="label label-warning">Đã lắp</span>
                        @endif
                         @if($dk->trangthai == 2)
                        <span class="label label-danger">Đang bảo trì</span>
                        @endif
    
                    </td>
                    <td>
                      <button class="btn btn-primary btn-xs" onclick="javascript:window.location.href='e-stu/qldk/sua/{{$dk->madk}}';"><i class="fa fa-pencil"></i></button>
                    <a class="delete" href="e-stu/qldk/xoa/{{$dk->madk}}">  <button type="button" class="btn btn-danger btn-xs" 
                      ><i class="fa fa-trash-o "></i></button></a>
                    </td>
                  </tr>
            	@endforeach
                </tbody>
              </table>
              
              <div> 
                <nav aria-label="...">
               <div style="float: right;" >{{$dienke->links()}}</div>
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

  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
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

