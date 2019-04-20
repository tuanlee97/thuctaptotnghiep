@extends('master')
@section('link')

<!--    <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" /> -->
  <!-- Custom styles for this template -->

@endsection
@section('content')
<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
               <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i>Quản lí Nhân Viên</h4>
                <hr>
               @if (session('status1'))
                                    <div class="alert alert-success" role="alert" >
                                    {{ session('status1') }}
                                    </div>
                                     @endif
                <div class="row mt">
                  
              <div style="margin-bottom:10px;" >
             
                 <button style="margin-left:30px" type="button" onclick="javascript:window.location.href='e-stu/qlnv/them'" class="btn btn-success"><i class="fa fa-plus-circle">&nbsp;Thêm Nhân Viên</i></button>
                
                </div>
             
              </div>
                <thead>
                  <tr>
                    <th><i class="fa fa-info-circle"></i> Mã nhân viên</th>
                    <th><i class="fa fa-user"></i> Tên nhân viên</th>
                    <th class="hidden-phone"><i class="fa fa-sitemap"></i> Chức vụ</th>
                    <th><i class="fa fa-phone"></i> SĐT</th>
                    <th><i class=" fa fa-edit"></i> Thao tác</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($nhanvien as $nv)
                  <tr>
                    <td>
                       &emsp;&emsp;<b>{{$nv->manv}}</b>
                    </td>
                    <td class="hidden-phone"><b>{{$nv->tennv}}</b></td>

                    <td>  
                      @foreach($chucvu as $cv)
                        @if($cv->macv == $nv->chucvu && $nv->chucvu == 1)
                        <span class="label label-danger">{{$cv->tencv}}</span>
                        @endif
                        @if($cv->macv == $nv->chucvu && $nv->chucvu== 2)
                        <span class="label label-warning">{{$cv->tencv}}</span>
                        @endif
                         @if($cv->macv == $nv->chucvu && $nv->chucvu== 3)
                        <span class="label label-success">{{$cv->tencv}}</span>
                        @endif
                      @endforeach
                      </td>
                    <td><span class="label label-info label-mini">{{$nv->sdt}}</span></td>
                    <td>
                       <button class="btn btn-primary btn-xs" onclick="javascript:window.location.href='e-stu/qlnv/sua/{{$nv->manv}}'; "><i class="fa fa-pencil"></i></button>
                     <a class="delete" href="e-stu/qlnv/xoa/{{$nv->manv}}"> <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                    </td>
                  </tr>
                    @endforeach
                     
                </tbody>
              </table>
              <div> 
                <nav aria-label="...">
               <ul style="float: right;" class="pagination">
                  <div style="float: right;" >{{$nhanvien->links()}}</div>
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
@endsection
    
@section('script')

<!--   <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script>
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

