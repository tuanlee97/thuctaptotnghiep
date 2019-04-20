
@extends('master')
@section('link')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<!--    <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" /> -->
<!--   <link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" /> -->
  <!-- Custom styles for this template -->

@endsection
@section('content')
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
               <div class="row">

            <div class="content-panel">
       
         	<div class="content-panel alert alert-success text-center" >
         		<b><h1>THÀNH CÔNG!</h1></b> 
         		<br><img width="100px" height="100px" src="img/success.png"><br><br>
         		<h3>Hoàn tất ghi điện! <h3><br>
         			<form class="form-inline" role="form" method="post" enctype="multipart/form-data" action="e-stu/ghidien/print/{{$khachhang->makh}}">
                      @csrf
                        <button type="submit" class="btn btn-theme" >In Giấy báo </button>
         				{{csrf_field()}}
              </form>
         			
         	</div>


        </div>
        


        <!--  /row -->
      </section>
      <!-- /wrapper -->
    </section> 
  @endsection
  @section('script')
@endsection
