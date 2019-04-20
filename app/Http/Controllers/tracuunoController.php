<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Hoadon;
use App\Models\KhachHang;
use Gate;
use App\Models\DienKe;
use App\Models\Chitiet_HD;

/**
 * 
 */
class tracuunoController extends Controller
{
	
	public function dsno()
	{
		
		$hoadon = Hoadon::Where('trangthai','=',0)->get();
		
		$ct_hoadon = Chitiet_HD::all();

		$khachhang = KhachHang::all();
		return view('tracuuno.dsno',['hoadon'=>$hoadon,'khachhang'=>$khachhang,'ct_hoadon'=>$ct_hoadon]);
	}
	public function dskh()
	{
		$hoadon = Hoadon::paginate(5);
		$khachhang = KhachHang::paginate(5);
		return view('tracuuno.dskh',['hoadon'=>$hoadon,'khachhang'=>$khachhang]);
	}
	public function dsdk()
	{
		$dienke = DienKe::paginate(5);
		return view('tracuuno.dsdk',['dienke'=>$dienke]);
	}
}