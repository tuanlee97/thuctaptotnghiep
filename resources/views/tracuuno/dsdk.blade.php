@extends('master')
@section('link')
<link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" />

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
             <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i>Danh sách điện kế</h4>
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
                    <th><i class="fa fa-info-circle"></i> Mã điện kế</th>
                    <th><i class="fa fa-flag"></i> Ngày sản xuất</th>
                    <th class="hidden-phone"><i class="fa fa-tags"></i> Ngày lắp</th>
                    <th><i class="fa fa-money"></i> Trạng thái</th>
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
                    
                  </tr>
              @endforeach
                </tbody>
              </table>
               </div>
             </div>
           </table>
         
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

