@extends('master')
@section('link')

<!--    <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" /> -->
  
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
           <!-- INLINE FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">

              @if (session('loi'))
                <div class="alert alert-danger" role="alert" >
                {{ session('loi') }}
                </div>
               @endif
              
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Ghi số điện</h4>
              <form class="form-inline" role="form" method="post" action="e-stu/ghidien/truycap">
                      @csrf
                <div class="form-group">
                  <label class="sr-only" for="exampleInputID">Mã khách hàng</label>
                  <input type="text" class="form-control{{ $errors->has('makh') ? ' is-invalid' : '' }}" name="makh"  id="makh" placeholder="Nhập mã khách hàng" value="{{ old('makh') }}" required autofocus> 
                </div>
                <button type="submit" class="btn btn-theme">Kiểm tra</button>
                {{csrf_field()}}
              </form>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->

@endsection
    
@section('script')

 


@endsection
