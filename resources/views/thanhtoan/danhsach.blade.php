@extends('master')
@section('link')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!--    <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" /> -->
  <link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" />
  
  <!-- Custom styles for this template -->

@endsection
@section('content')
    <section id="main-content">
      <section class="wrapper">
               <div class="row mt">
          <div class="col-md-12">
            @if (session('thongbao'))
                <div class="alert alert-success" role="alert" >
                {{ session('thongbao') }}
                </div>
               @endif

          <div class="content-panel">
            <div class="adv-table">
               <h4><i class="fa fa-angle-right"></i><b>Hóa đơn dịch vụ<b></h4><hr>
              <table cellpadding="0" cellspacing="0" border="1" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                <th><i class="fa fa-info-circle"></i> Mã khách hàng</th>
                   <th><i class="fa fa-user"></i> Tên khách hàng</th>
                    <th class="hidden-phone"><i class="fa fa-barcode"></i> Mã hóa đơn</th>
                    <th><i class="fa fa-calendar"></i> Kì</th>
                    <th><i class="fa fa-money"></i> Số tiền</th>
                    <th><i class="fa fa-bell"></i> Trình trạng</th>
                    <th><i class="fa fa-print"></i> In hóa đơn</th>
                  </tr>
                </thead>
                <tbody>
            
                @foreach($dshoadon as $hd)
                    <tr>
                     <td>
                      <a>{{$khachhang->makh}}</a>
                    </td>
                    <td class="hidden-phone"><b>{{$khachhang->tenkh}}</b></td>
                    <td>{{$hd->mahd}}</td>
                    <td> {{date('m/Y',strtotime($hd->ngaylap))}}</td>
                    <td> {{$hd->tongtien}} </td>
                    @if($hd->trangthai==1)
                     <td> Đã thanh toán</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<button class="btn btn-primary btn-xs"  onclick="javascript:window.location.href='e-stu/thanhtoan/print/{{$hd->mahd}}';"><i  class="fa fa-print"></i></button>
                    </td>
                    @else
                    <td><button type="button" class="btn btn-theme" onclick="javascript:window.location.href='e-stu/thanhtoan/checkout/{{$khachhang->makh}}';">Thanh toán</button></td>
                    <td></td>@endif
                  </tr>
                 @endforeach

                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->

            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
@endsection
    
@section('script')

<!--   <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script> -->
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
    </script><!-- <script type="text/javascript">
      $("#makh2").click(function() {
  $(":checkbox").not(this).prop("disabled", this.checked);

}); </script> -->
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
