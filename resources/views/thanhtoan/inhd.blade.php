@extends('master')
@section('link')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
        width:1000px;
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
      <section class="wrapper">
      <div class="container-fluid">
       
    <div class="row">
        <div  class="col-md-4">
          <div style="padding-left: 60px">  <img src="img/logo.png">  </div>
        <h5 style="color: deepskyblue"><strong>E-STU - TẬP ĐOÀN ĐIỆN LỰC STU</strong></h5>

        </div>

        <div class="col-md-4">
            <h3 class="clr">HOÁ ĐƠN GTGT(TIỀN ĐIỆN)</h3>
            <p class="clr">(Bản thể hiện của hoá đơn điện tử)</p>
            <p style="text-align:center"><text>Kỳ: </text><label>{{date('m/Y',strtotime($ct->denngay))}}</label></p>
            <p style="text-align:center"><text>Từ ngày: </text><label>{{date('d/m/Y',strtotime($ct->tungay))}}</label>&emsp;<text>Đến ngày: </text><label>{{date('d/m/Y',strtotime($ct->denngay))}}</label></p>
        </div>
        <div class="col-md-4">
            <div class="st1">
                <label>Mẫu số:</label><text> 01/GTGT/0101</text><br />
                <label>Ký hiệu: </label><text> MY/13E</text><br />
                <label>Mã HĐ: </label><text> {{$ct->mahd}}</text>
            </div>
        </div>
    </div>
    <br />
  
    <div>
        <label>Địa chỉ : </label><text> 180 Cao Lỗ, Phường 4, Quận 8, Tp. Hồ Chí Minh</text>
    </div>
    <div class="row">
        <div class="col-md-3">
            <label>Điện thoại: </label>
            <text>083 850 5520</text>
        </div>
           <div class="col-md-3">
           
        </div>
        <div class="col-md-3">
           <label>MST: </label>
            <text>0300051119004</text>
        </div>
   
        <div class="col-md-3">
            <label>SĐT Sửa Chữa: </label>
            <text>039 556 3446</text>
        </div>

    </div>
    <div><br>
        <label><strong> Tên khách hàng: </strong></label>
        <text>{{$khachhang->tenkh}}</text>
    </div>

   

    <div class="row">


    </div>
    <div class="row">
        <div class="col-md-3">
            <label>Mã KH: </label>
            <text>{{$khachhang->makh}}</text>
        </div>
        <div class="col-md-3">
            <label>Địa chỉ: </label>
            <text>{{$khachhang->diachi}}</text>
        </div>
        <div class="col-md-3">
            <label>Điện thoại: </label>
            <text>{{$khachhang->sdt}}</text>
        </div>
        
    </div>


    <table class="table table-bordered">
        <tr>
            <th>BỘ CS</th>
            <th>CHỈ SỐ MỚI</th>
            <th>CHỈ SỐ CŨ</th>
            <th>CS NHÂN</th>
            <th>ĐN TIÊU THỤ</th>
            <th>ĐN TRỰC TIẾP</th>
            <th>ĐN TRỪ PHỤ</th>
            <th>ĐN THỰC TẾ</th>
            <th>ĐƠN GIÁ</th>
            <th>THÀNH TIỀN</th>
        </tr>
        <tr>
            <td>KT</td>
            <td>{{$ct->cscuoi}}</td>
            <td>{{$ct->csdau}}</td>
            <td>1</td>
            <td>{{$ct->dntt}}</td>
            <td>0</td>
            <td>0</td>
            <td>{{$ct->dntt}}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
              <?php
                $DNTT = $ct->dntt;
                $arrDNTT = array();
                $vonglap = 0;
                  while ($DNTT > 0) {
                    $vonglap ++;
                    if($vonglap < 3){
                            if($DNTT >=50) {
                                $arrDNTT[] = 50;
                                $DNTT -=50;
                              }
                          else{
                             $arrDNTT[] = $DNTT;
                             $DNTT -=$DNTT;
                              }
                                      }
                    else{
                        if($DNTT >= 100) {
                  $arrDNTT[] = 100;
                 $DNTT -= 100 ;
                  
                }
                else{
                 $arrDNTT[] = $DNTT;
                             $DNTT -=$DNTT;
                }


                    }
                    }
                 //đơn giá 
                  $arrDG = array();
                foreach ($giadien as $gia) {
                  if($vonglap > 0)
                      $arrDG[] = $gia->dongia;
                  $vonglap -- ;
                }         
                   //thành tiền
                  $arrTT = array();
                  for($i=0;$i<count($arrDNTT);$i++)
                  {
                    $arrTT[] = $arrDG[$i] * $arrDNTT[$i];
                  }
                  //số - > chữ
                       function convert_number_to_words( $number )
      {
      $hyphen = ' ';
      $conjunction = '  ';
        $separator = ' ';
        $negative = 'âm ';
        $decimal = ' phẩy ';
      $dictionary = array(
    0 => 'Không',
    1 => 'Một',
    2 => 'Hai',
    3 => 'Ba',
    4 => 'Bốn',
    5 => 'Năm',
    6 => 'Sáu',
    7 => 'Bảy',
    8 => 'Tám',
    9 => 'Chín',
    10 => 'Mười',
    11 => 'Mười một',
    12 => 'Mười hai',
    13 => 'Mười ba',
    14 => 'Mười bốn',
    15 => 'Mười năm',
    16 => 'Mười sáu',
    17 => 'Mười bảy',
    18 => 'Mười tám',
    19 => 'Mười chín',
    20 => 'Hai mươi',
    30 => 'Ba mươi',
    40 => 'Bốn mươi',
    50 => 'Năm mươi',
    60 => 'Sáu mươi',
    70 => 'Bảy mươi',
    80 => 'Tám mươi',
    90 => 'Chín mươi',
    100 => 'trăm',
    1000 => 'ngàn',
    1000000 => 'triệu',
    1000000000 => 'tỷ',
    1000000000000 => 'nghìn tỷ',
    1000000000000000 => 'ngàn triệu triệu',
    1000000000000000000 => 'tỷ tỷ'
  );

  if( !is_numeric( $number ) )
  {
    return false;
  }

  if( ($number >= 0 && (int)$number < 0) || (int)$number < 0 - PHP_INT_MAX )
  {
    // overflow
    trigger_error( 'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING );
    return false;
  }

  if( $number < 0 )
  {
    return $negative . convert_number_to_words( abs( $number ) );
  }

  $string = $fraction = null;

  if( strpos( $number, '.' ) !== false )
  {
    list( $number, $fraction ) = explode( '.', $number );
  }

  switch (true)
  {
    case $number < 21:
      $string = $dictionary[$number];
      break;
    case $number < 100:
      $tens = ((int)($number / 10)) * 10;
      $units = $number % 10;
      $string = $dictionary[$tens];
      if( $units )
      {
        $string .= $hyphen . $dictionary[$units];
      }
      break;
    case $number < 1000:
      $hundreds = $number / 100;
      $remainder = $number % 100;
      $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
      if( $remainder )
      {
        $string .= $conjunction . convert_number_to_words( $remainder );
      }
      break;
    default:
      $baseUnit = pow( 1000, floor( log( $number, 1000 ) ) );
      $numBaseUnits = (int)($number / $baseUnit);
      $remainder = $number % $baseUnit;
      $string = convert_number_to_words( $numBaseUnits ) . ' ' . $dictionary[$baseUnit];
      if( $remainder )
      {
        $string .= $remainder < 100 ? $conjunction : $separator;
        $string .= convert_number_to_words( $remainder );
      }
      break;
  }

  if( null !== $fraction && is_numeric( $fraction ) )
  {
    $string .= $decimal;
    $words = array( );
    foreach( str_split((string) $fraction) as $number )
    {
      $words[] = $dictionary[$number];
    }
    $string .= implode( ' ', $words );
  }

  return $string;
}

                  $sothanhchu = convert_number_to_words(array_sum($arrTT)+ array_sum($arrTT)*0.1);

                ?>
                @foreach($arrDNTT as $key => $value)
              <div><text>{{$value}}</text></div>
                @endforeach
            </td>
            <td>
             
              @foreach($arrDG as $key => $dg)
              <div><text>{{$dg}}</text></div>
                @endforeach

               
            </td>
            <td>
                 @foreach($arrTT as $key => $tt)
              <div><text>{{$tt}}</text></div>
                @endforeach
            </td>
        </tr>

        <tr>
            <td colspan="7">
                <label>Cộng:</label>
            </td>
            <td>{{$ct->dntt}}</td>
            <td></td>
            <td>{{array_sum($arrTT)}}</td>

        </tr>
        <tr>
            <td colspan="7">
                <label>Thuế xuất GTGT: </label>
                <text>10%</text>
            </td>
            <td colspan="2">
                <label>Thuế GTGT: </label>
            </td>


            <td>
                <text>{{array_sum($arrTT)*0.1}}</text>
            </td>

        </tr>
        <tr>
            <td colspan="9">
                <label>Tổng cộng tiền thanh toán: </label>
            </td>
            <td>
                <text>{{array_sum($arrTT)+ array_sum($arrTT)*0.1}} VNĐ</text>
            </td>

        </tr>
        <tr>
            <td colspan="10">
             
                <label>Số tiền viết bằng chữ: </label>
                <text>{{$sothanhchu}} (VNĐ)</text>
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:right">
                <div>Ngày ký: <text>{{date('d/m/Y')}}</text></div>
                <div>Người ký(Ông/Bà): <text> {{$nv->tennv}}</text></div>

            </td>

        </tr>

    </table>
         
</div>

         
        <!--  /row -->
      </section>
      <!-- /wrapper -->
    </section> </body>
  @endsection
  @section('script')
@endsection
