<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
use App\User;
use App\Models\Hoadon;
use App\Models\GiaDien;
use App\Models\DienKe;
use App\Models\Chitiet_HD;
use Gate;

class GhiDienController extends Controller
{	
	public function getTruycap()
    {   
        if(!Gate::allows('isAdmin')&&!Gate::allows('isGhidien')){
            abort(404,"Sorry, You can do this actions");
        }
        return view('ghidien.truycap');
    }

    public function postTruycap(Request $request)
    {     $this->validate($request,
        [
                'makh'=>'required', 
        ],

        [
                'makh.required'=>'Vui lòng nhập mã nhân viên',

        ]);

        $khachhang = KhachHang::find($request->makh);
        $dienke = DienKe::Where('makh','=',$request->makh)->first();
    	if(!$khachhang || $dienke==null)
            return redirect()->back()->with('loi','Mã khách hàng không tồn tại hoặc chưa được cấp điện kế !');
        else
         { 

         	 return view('ghidien.xulighidien',['dienke'=>$dienke,'khachhang'=>$khachhang]);
         }

    }

    
    public function postInhoadon($id)
   {   		
       $khachhang = KhachHang::find($id);

        $hoadon = Hoadon::Where('makh','=',$id)
        					->where('trangthai','=',0)
        					->first();
       	    $cthd = Chitiet_HD::Where('mahd','=',$hoadon->mahd)->get();
            $nv = User::find($hoadon->manv);
        return view('ghidien.ingiaybao',['cthd'=>$cthd,'khachhang'=>$khachhang,'nv'=>$nv]);
   }

  
      public function xulighidien(Request $request,$id){
      	$this->validate($request,
       	[
         'cscuoi' => 'required|numeric'
     	],
     [
        'cscuoi.required'=>'Bạn chưa nhập chỉ số điện mới',
        'cscuoi.numeric'=>'Chỉ số mới phải là kiếu số',

        
	    ]);	
        if((double)$request->cscuoi < 0) return redirect()->back()->with('loi',"Chỉ số mới phải lớn hơn 0, vui lòng kiểm tra lại");
	      	$khachhang = KhachHang::find($id);
	      	$prev_month = strtotime(date("Y-m-d", strtotime(date('my'))) . " -1 month");
	  		$prev_month = strftime("%m%y", $prev_month);
	  		$ID = "CT".$prev_month.substr($khachhang->makh,2);
	     	$previous_CTHD = Chitiet_HD::Where('idchitiet','=',$ID)->first();
	     
	   		if($previous_CTHD!=null && $request->cscuoi < $previous_CTHD->cscuoi )
	   		return redirect()->back()->with('loi',"Chỉ số mới nhỏ hơn chỉ số cũ, vui lòng kiểm tra lại");
	      	

			$dienke = DienKe::Where('makh','=',$id)->first();
       			//Tạo hóa đơn
       		$hoadon = new Hoadon();
       		$hoadon->mahd = "HD".date('my',strtotime($request->ngayghi)).substr($khachhang->makh,2);
          $testmhd = Hoadon::find($hoadon->mahd);
          if($testmhd)
            return redirect()->back()->with('loi',"Khách hàng này đã được ghi điện tháng này");
       		$hoadon->ky = date('Y-m',strtotime($request->ngayghi));
       		$hoadon->ngaylap = date('Y-m-d',strtotime($request->ngayghi));
       		$hoadon->tongtien = 0; //Khởi tạo cột tổng tiền
      		
      		$hoadon->makh = $id;//Mã khách hàng
      		$hoadon->manv = auth()->user()->manv;//Mã nhân viên đang thực hiện ghi điện
      		$hoadon->save();
      		// //Tạo CT hóa đơn
      		$cthoadon = new Chitiet_HD();
      		$cthoadon->idchitiet = "CT".date('my',strtotime($request->ngayghi)).substr($khachhang->makh,2);
      		
      		
      		//tìm về chi tiết hóa đơn tháng trước

      		
  			
      		
      		if(!$previous_CTHD)
      		{	$cthoadon->tungay = $dienke->ngaylap;
      			$cthoadon->csdau=0 ;
      			$cthoadon->cscuoi=$request->cscuoi;
      		}
      		else{
      			$cthoadon->tungay = $previous_CTHD->denngay;
      			$cthoadon->csdau=$previous_CTHD->cscuoi ;
      			$cthoadon->cscuoi=(double)$request->cscuoi;
      			
      		}
      		 $cthoadon->denngay = $hoadon->ngaylap;
      		 $cthoadon->mahd =  $hoadon->mahd;
      		$dntt =$cthoadon->cscuoi  - $cthoadon->csdau;
      		$cthoadon->dntt =$dntt;
      		$banggia = GiaDien::all();
      		$i = 0 ;
      		$tien = 0;
				foreach ($banggia as $gia) {
					
		if($dntt > 0){
					if($i < 2 ){
									if($dntt >= 50) {
										$tien += 50 * $gia->dongia;
										$dntt -= 50 ;
										$i++;
									}
									else{
										$tien += $dntt * $gia->dongia;
										$dntt -= $dntt;
									}
								}
					else{
									if($dntt >= 100) {
									$tien += 100 * $gia->dongia;
									$dntt -= 100 ;
									
								}
								else{
									$tien += $dntt * $gia->dongia;
									$dntt -= $dntt;
								}

					}
					

				} 
		else break;
					
				}

       		$cthoadon->tamtinh =$tien;
       		$cthoadon->thue = $cthoadon->tamtinh*0.1;
       		$cthoadon->tongthanhtien = $cthoadon->tamtinh + $cthoadon->thue;
      		$cthoadon->save();
      	
      // 			//cập nhập lại tổng tiền về hóa đơn
      			$hoadon->tongtien = $cthoadon->tongthanhtien;
      			$hoadon->save();
      	
      			 return view('ghidien.success',['khachhang'=>$khachhang]);
     			
     }
     // protected function tinhtien($csdau , $cscuoi){
     // 	$dntt = $cscuoi-$csdau;
     // 	dd($dntt);


     // }



}
