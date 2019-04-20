
@extends('master')
@section('link')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<!--    <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" /> -->
<!--   <link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" /> -->
  <!-- Custom styles for this template -->
<link href = "~/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel = "stylesheet" />
    <link href = "~/bootstrap-4.3.1-dist/css/bootstrap.css" rel = "stylesheet" />
    <style>
    
   label{
       color:deepskyblue;
   }
    .clr {
        color: deepskyblue;
        text-align: center;
    }
    .st1 {
        text-align:left;margin-top:15px;margin-left:100px;
    }
    .container-fluid{
        width:400px;
        background-position-x:center;
        background-color:aliceblue;
        padding:10px 10px 10px 10px;
    }
</style>
@endsection
@section('content')
    <!--main content start-->
    <body onload="window.print()">
    <section id="main-content">
      <section class="wrapper ">
    <div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <h3 class="clr">GIẤY BÁO TIỀN ĐIỆN</h3>
            <p class="clr">(NGÀY {{date('d/m/Y')}})</p>

            <p style="text-align:center;"><img src="img/energy.png"><br><text>ĐIỆN LỰC E-STU TRÂN TRỌNG THÔNG BÁO ĐẾN KHÁCH HÀNG</text><br><br><label style="font-size: 25px;text-transform: uppercase;">{{$khachhang->tenkh}}</label><br>

               <text>{{$khachhang->diachi}}</text> <br>
               <text>Số điện thoại : {{$khachhang->sdt}}</text> <br>
               <text>Mã KH: {{$khachhang->makh}}</text>
            </p>

        </div>
    </div>
      @foreach($cthd as $ct)
         
    <div>
        <h4 style="color:#6a7382;text-align:center;"><strong>THÁNG {{date('m/Y',strtotime($ct->denngay))}}</strong></h4>
    </div>
      <div class="col-md-12">
        <p style="text-align:center"><label>Chỉ số mới: </label>
         <text>{{$ct->cscuoi}}</text></p>
       <p style="text-align:center"><label>Chỉ số cũ: </label>
         <text>{{$ct->csdau}}</text></p>
       <p style="text-align:center"><label>Điện năng tiêu thụ: </label>
         <text>{{$ct->dntt}} (kWh)</text></p>
      <p style="text-align:center"><label>Tiền điện: </label>
         <text>{{$ct->tamtinh}} (đồng)</text></p>
      <p style="text-align:center"><label>Tiền thuế: </label>
         <text>{{$ct->thue}} (đồng)</text></p>
       <p style="text-align:center"><label>Tổng tiền: </label>
         <text>{{$ct->tongthanhtien}} (đồng)</text></p>
      <p style="text-align:center"><label>Nhân viên ghi điện: </label>
         <text>{{$nv->tennv}} - ({{$nv->sdt}})</text></p>
     <div>
        <p style="text-align:center"><label><input name="button" type="button" value="Tiếp tục ghi điện" class="btn btn-round btn-info hidden-print" onclick="javascript:window.location.href='e-stu/ghidien/truycap';"></label></p>
    </div>
  </div>
  @endforeach
               
</div>


      </section>
      <!-- /wrapper -->
    </section> </body>
  @endsection
  @section('script')
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
