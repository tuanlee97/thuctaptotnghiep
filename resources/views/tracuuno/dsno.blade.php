@extends('master')
@section('link')
 
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
                <h4><i class="fa fa-angle-right"></i>Danh sách khách hàng nợ</h4>
                <hr>       
                @if(session('alert'))
               <div class="alert alert-danger">{{session('alert')}} </div> 
                @endif
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
                    <th><i class="fa fa-info-circle"></i> Mã hóa đơn</th>
                    <th><i class="fa fa-info-circle"></i> Mã khách hàng</th>
                    <th><i class="fa fa-flag"></i> Tên khách hàng</th>
                    <th class="hidden-phone"><i class="fa fa-tags"></i>Kỳ</th>
                    <th><i class="fa fa-phone"></i> Số điện thoại</th>
                    <th><i class="fa fa-money"></i> Tổng Tiền Nợ</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($hoadon as $hd)
              
                  <tr>
                    <td>{{$hd->mahd}}</td>
                    <td>
                       @foreach ($khachhang as $kh)
                       @if($hd->makh==$kh->makh)
                      &emsp;&emsp;<b>{{$kh->makh}}</b>
                    </td>
                    <td class="hidden-phone"><b>{{$kh->tenkh}}</b></td>
                    <td><b>{{$hd->ky}}</b></td>
                    <td><b>{{$kh->sdt}}</b></td>
                    @endif
                    @endforeach
                    <td>{{$hd->tongtien}}</td>
                  </tr>
                 
              @endforeach
                </tbody>
              </table>
            </div>
       
            
              
           
            </div>
            <!-- /content-panel -->
          </div>
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

<!--   <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script> -->
    <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>

  <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>

  <!--script for this page-->
<script type="text/javascript">

 
      var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [1, 'asc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
      
  </script>
  </body>
@endsection