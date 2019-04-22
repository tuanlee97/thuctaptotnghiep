@extends('master')
@section('link')
<!-- 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
 -->
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
            <h4><i class="fa fa-angle-right"></i> Sửa Điện Kế</h4>
            <div class="form-panel">
               @if(session('alert'))
               <div class="alert alert-danger">{{session('alert')}} </div> 
                @endif
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
                <form action="e-stu/qldk/sua/{{$dienke->madk}}" class="cmxform form-horizontal style-form"  method="post" enctype="multipart/form-data">
         				  @csrf
                     <div class="form-group ">
                    <label for="tendk" class="control-label col-lg-2">Tên điện kế</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="tendk" name="tendk" type="text" value="{{$dienke->tendk}}" />
                    </div>
                  </div>
               
                  <div class="form-group ">
                    <label for="ngaysanxuat" class="control-label col-lg-2">Ngày sản xuất</label>
                    <div class="col-lg-10">
                    <div id="datepicker2" class="input-group date" data-date-format="yyyy-mm-dd"> 
                      <input class="form-control" readonly="" type="text" name="ngaysanxuat" value="{{$dienke->ngaysx}}"> 
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
                  </div>
                  </div>
                  </div>
                  <div class="form-group">

                                        <label for="tinhtrang" class="control-label col-lg-2">Cập nhập trình trạng :</label>
                                        <div class="col-lg-10">
                                    <div class="btn-group">
                                      <select name="trangthai" class="form-control">

                                          @if($dienke->makh == null)
                                                <option value="0"@if($dienke->trangthai==0) selected='selected' @endif >Chưa lắp</option>
                                               <option value="2"@if($dienke->trangthai==2) selected='selected' @endif >Bảo trì</option> 
                                          @endif
                                          @if($dienke->makh != null)
                                          <option value="1"@if($dienke->trangthai==1) selected='selected' @endif >Đã lắp</option>
                                           <option value="2"@if($dienke->trangthai==2) selected='selected' @endif >Bảo trì</option> @endif 
                                           
                                             
                                       </select>
                                 </div>
                            </div>
                                    </div>
                    @if ($dienke->trangthai < 2)                
                    <div class="form-group">
                         

          <!-- page start-->
          <div class="form-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="1" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
          			<th>Chọn</th>
                    <th>Mã KH</th>
                    <th>Tên Khách Hàng</th>
                    <th>Địa Chỉ</th>
                    <th class="hidden-phone">CMND</th>
                    <th class="hidden-phone">SĐT</th>
                  </tr>
                </thead>
                <tbody>
             <!-- TH1 : Nếu điện kế đã có chủ , table hiện chủ đầu tiên và có checked -->
                 @if($dienke->makh != null)
                    <tr>
                    <td><input type="radio" name= "makh" id="{{$hasKH->makh}}" class='parent'  value="{{$hasKH->makh}}" checked="checked" /></td>
                     <td>{{$hasKH->makh}}</td>
                      <td>{{$hasKH->tenkh}}</td>
                    <td>{{$hasKH->diachi}}</td>
                    <td class="center hidden-phone">{{$hasKH->cmnd}}</td>
                    <td class="center hidden-phone">{{$hasKH->sdt}}</td>
                  </tr>
                  <!-- Sau đó sẽ xuất những list khách hàng khác mã với mã kh là chủ sở hữu của điện kế này, vì có trường hợp sửa lại chủ -->
                     @foreach ($otherKH as $other )
                    <tr>
                    <td><input type="radio" name= "makh" id="{{$other->makh}}" class='parent'  value="{{$other->makh}}" /></td>
                     <td>{{$other->makh}}</td>
                      <td>{{$other->tenkh}}</td>
                    <td>{{$other->diachi}}</td>
                    <td class="center hidden-phone">{{$other->cmnd}}</td>
                    <td class="center hidden-phone">{{$other->sdt}}</td>
                  </tr>
                 @endforeach
                  @endif


              <!-- TH2 : Nếu điện kế chưa có chủ , table hiện toàn bộ khách hàng để lựa chọn -->
                  @if ($dienke->makh == null  )
                     @foreach ($khachhang as $kh)
                  <tr>
                    <td><input type="radio" name= "makh" id="{{$kh->makh}}" class='parent'  value="{{$kh->makh}}" /></td>
                     <td>{{$kh->makh}}</td>
                      <td>{{$kh->tenkh}}</td>
                    <td>{{$kh->diachi}}</td>
                    <td class="center hidden-phone">{{$kh->cmnd}}</td>
                    <td class="center hidden-phone">{{$kh->sdt}}</td>
                  </tr>
                 @endforeach
                 @endif

                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->

                  </div>@endif
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">

                      <button class="btn btn-theme" type="submit">Sửa</button>
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
<!-- 
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script> -->
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

              
    
  <script type="text/javascript">
$(function () {  
$("#datepicker2").datepicker({         
autoclose: true,         
todayHighlight: true 
})
});
</script>

    
<link rel="stylesheet prefetch" href="lib/datepicker.css"><script src="lib/bootstrap-datepicker.js"></script>

@endsection

