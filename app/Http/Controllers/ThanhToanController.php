<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
use App\User;
use App\Models\Hoadon;
use App\Models\GiaDien;
use App\Models\Chitiet_HD;
use Gate;
class ThanhToanController extends Controller
{
    public function getTruycap()
    {   
        if(!Gate::allows('isAdmin')&&!Gate::allows('isThutien')){
            abort(404,"Sorry, You can do this actions");
        }
        return view('thanhtoan.truycap');
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
    	if(!$khachhang)
            return redirect()->back()->with('loi','Mã khách hàng không tồn tại !');
        else
         { 
         	 $dshoadon = Hoadon::Where('makh','=',$request->makh)
         	 ->orderBy('ky', 'desc')
         	 ->get();
         	  return view('thanhtoan.danhsach',['dshoadon'=>$dshoadon,'khachhang'=>$khachhang]);
         }
    }

     public function getInhoadon($mahd)
    {   $giadien = GiaDien::all();
        $hoadon = Hoadon::find($id);
        $khachhang = KhachHang::Where('makh','=',$hoadon->makh)
                            ->first();
            $ct = Chitiet_HD::Where('mahd','=',$hoadon->mahd)->first();
            $nv = User::find($hoadon->manv);
         return view('thanhtoan.inhd',['ct'=>$ct,'khachhang'=>$khachhang,'giadien'=>$giadien,'nv'=>$nv]);
    }

    public function getCheckout($id)
    {    $khachhang = KhachHang::find($id);
        $hoadon = Hoadon::Where('makh','=',$id)
                         ->where('trangthai','=',0)
                         ->first();
             $ct = Chitiet_HD::Where('mahd','=',$hoadon->mahd)->first();
            $nv = auth()->user();
$giadien = GiaDien::all();
        $hoadon->trangthai = 1;
        $hoadon->save();
        return view('thanhtoan.inhd',['ct'=>$ct,'khachhang'=>$khachhang,'nv'=>$nv,'giadien'=>$giadien]);

    }

   



 // public function getCheckout($id)
 //    {	$khachhang = KhachHang::find($id);
 //        $hoadon = Hoadon::Where('makh','=',$id)
 //        					->where('trangthai','=',0)
 //        					->first();
 //       	    $cthd = Chitiet_HD::Where('mahd','=',$hoadon->mahd)->get();
 //            $nv = User::find($hoadon->manv);
 //        return view('thanhtoan.checkout',['cthd'=>$cthd,'khachhang'=>$khachhang,'nv'=>$nv]);

 //    }
 //    public function postCheckout(Request $request,$id)
 //    {   $hoadon = Hoadon::find($id);
 //        $hoadon->trangthai = 1;
 //        $hoadon->save();
 //        return redirect('e-stu/thanhtoan/success');
 //    }
   
 //     public function getSuccess()
 //    {   
 //        return view('thanhtoan.success');
 //    }
 }
