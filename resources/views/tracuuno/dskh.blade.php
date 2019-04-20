@extends('master')
@section('link')

<link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" />
@endsection
@section('content')
<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
               <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i>Danh Sách Khách hàng</h4>
                <hr>
               @if (session('status1'))
                                    <div class="alert alert-success" role="alert" >
                                    {{ session('status1') }}
                                    </div>
                                     @endif
                
                  
          <div class="form-group">
              <div class="adv-table">
               <table cellpadding="0" cellspacing="0" border="1" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                   <th><i class="fa fa-info-circle"></i> Mã khách hàng</th>
                   <th><i class="fa fa-user"></i> Tên khách hàng</th>
                    <th class="hidden-phone"><i class="fa fa-map-marker"></i> Địa chỉ</th>
                    <th><i class="fa fa-phone"></i> SĐT</th>
                
                  </tr>
                </thead>
                <tbody class="danhsach">
                  @foreach ($khachhang as $kh)
                  <tr>
                    <td>
                       &emsp;&emsp;<b>{{$kh->makh}}</b>
                    </td>
                    <td class="hidden-phone"><b>{{$kh->tenkh}}</b></td>
                    <td>{{$kh->diachi}}</td>
                    <td><span class="label label-info label-mini">{{$kh->sdt}}</span></td>
                   
                  </tr>
                    @endforeach
                     
                </tbody>
              </table>
            </div>
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
  <script type="text/javascript">
    /* Formating function for row details */


    $(document).ready(function() {
      
      var oTable = $('#hidden-table-info').dataTable({
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
@endsection

