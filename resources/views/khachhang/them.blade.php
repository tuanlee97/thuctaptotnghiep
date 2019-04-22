@extends('master')
@section('link')
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
<!--   <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <script src="lib/chart-master/Chart.js"></script> -->
  <!-- Custom styles for this template -->
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-fileupload/bootstrap-fileupload.css" />
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
       <section id="main-content">
      <section class="wrapper">
       <div class="row mt">
          <div class="col-lg-12">
            <h4><i class="fa fa-angle-right"></i> Thêm khách hàng</h4>
            <div class="form-panel">
     @if (session('thongbao'))
        <div class="alert alert-danger" role="alert" >
        {{ session('thongbao') }}
        </div>
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
                @csrf
                <form class="cmxform form-horizontal style-form" id="signupForm" method="post" enctype="multipart/form-data" action="e-stu/qlkh/xulythem">
                  <div class="form-group ">
                    <label for="tenkh" class="control-label col-lg-2">Tên khách hàng</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="tennv" name="tenkh" type="text" placeholder="Nhập tên khách hàng..."/>
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="sdt" class="control-label col-lg-2">SĐT</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="sdt" name="sdt" type="text" placeholder="Số điện thoại..."/>
                    </div>
                  </div>

                    <div class="form-group ">
                    <label for="cmnd" class="control-label col-lg-2">CMND</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="cmnd" name="cmnd" type="text" placeholder="Số CMND..." />
                    </div>
                  </div>
                       <div class="form-group ">
                    <label for="diachi" class="control-label col-lg-2">Địa chỉ</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="diachi" name="diachi" type="text" placeholder="Nhập địa chỉ..." />
                    </div>
                  </div>
               
                 <div class="form-group ">
                     <label class="control-label col-lg-2"></label>
                  <div class="col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-paperclip"></i> Chọn hình</span>
                          <span class="fileupload-exists"><i class="fa fa-undo"></i> Thay đổi</span>
                        <input  id="hinhanh" name="hinhanh" type="file" class="default" />
                        </span>
                        
                      </div>
                    </div>
                    
                  </div>
                      </div>
                    
             
                
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit">Thêm</button>
                      <button class="btn btn-theme04" type="button" onclick="javascript:window.location.href='e-stu/qlkh/danhsach';">Hủy</button>
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
        <!-- DATE TIME PICKERS --> 
        <!-- row -->
        <!--  TIME PICKERS -->
        
                  </div>
                </div>
              </form>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
@endsection
    
@section('script')
  <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="lib/advanced-form-components.js"></script>
  <script src="lib/jquery.sparkline.js"></script>
    <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>

   <script type="text/javascript">
$(document).ready(function(){
  // convert selects already on the page at dom load
  $('select.form-control').combobox();  
    
  $('#it').click(function(e){
    $('ul.dropdown-menu').toggle();
  });
  

});

</script>

  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  


  
@endsection

