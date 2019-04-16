<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\DienKe;
use App\Models\KhachHang;
use Gate;


class DienKeController extends Controller
{
     public function getDanhsach()
    {   
        if(!Gate::allows('isAdmin')){
            abort(404,"Sorry, You can do this actions");
        }
        $dienke = DienKe::paginate(5);
        
        return view('dienke.danhsach',['dienke'=>$dienke]);
    }
    public function getThem()
    {   

        return view('dienke.them');
    }

    public function postThem(Request $request)
    {
        ////sKiểm tra dữ liệu đầu vào (không được rỗng, giới hạn của dữ liệu được nhập)
        $this->validate($request,
            [
                'tendk'=>'required|unique:dienke,tendk|min:4|max:20',
                'ngaysanxuat'=>'required'
                // Unique: Dữ liệu nhập vào không được trùng với dữ liệu hiện tại
                // Cú pháp của unique:tên_bảng,tên_cột
            ],
            [   'tendk.unique' => 'Tên đã tồn tại, vui lòng nhập lại!',
                'tendk.max'=>'Tên phải chỉ gồm tối đa 20 ký tự!',
                'tendk.min'=>'Tên phải gồm ít nhất 4 ký tự!',
                'ngaysanxua.required'=>'Bạn chưa nhập ngày sản xuất ',
            ]);


        // Thêm dữ liệu vào CSDL, ở đây 1 record dữ liệu được xem như một đối tượng (object), vì ta sử dụng Eloquent nên tất cả các bảng trong CSDL đã được ánh xạ thành Model trong Laravel. Do đó dữ liệu mới được thêm vào bằng cách tạo 1 đối tượng mới.

        $dienkes = new DienKe;
        $dienkes->madk = "DK".$request->tendk;
        $dienkes->tendk = $request->tendk;
        $dienkes->ngaysx = $request->ngaysanxuat;


       $dienkes->save();
        return redirect()->back()->with('status1',"Thêm thành công");
}
    public function getSua($id)
    {
        $dienke = DienKe::find($id);
            $khachhang = KhachHang::all();
            $otherKH = KhachHang::Where('makh','<>',$dienke->makh)->get();
            $hasKH = KhachHang::find($dienke->makh);

    
        return view('dienke.sua',['dienke'=>$dienke,'khachhang'=>$khachhang,'hasKH'=>$hasKH,'otherKH'=>$otherKH]);
    }
    public function XuLySua(Request $request,$id)
     {      
        $dienkes = DienKe::find($id);
          $this->validate($request,
            [
               'tendk'=>'required|min:4|max:20',
                'ngaysanxuat'=>'required'
                // Unique: Dữ liệu nhập vào không được trùng với dữ liệu hiện tại
                // Cú pháp của unique:tên_bảng,tên_cột
            ],
            [   'tendk.unique' => 'Tên đã tồn tại, vui lòng nhập lại!',
                'tendk.max'=>'Tên phải chỉ gồm tối đa 20 ký tự!',
                'tendk.min'=>'Tên phải gồm ít nhất 4 ký tự!',
                'ngaysanxuat.required'=>'Bạn chưa nhập ngày sản xuất ',
            ]);

        // Thêm dữ liệu vào CSDL, ở đây 1 record dữ liệu được xem như một đối tượng (object), vì ta sử dụng Eloquent nên tất cả các bảng trong CSDL đã được ánh xạ thành Model trong Laravel. Do đó dữ liệu mới được thêm vào bằng cách tạo 1 đối tượng mới.
          $dienkes->madk = "DK".$request->tendk;
        $dienkes->tendk = $request->tendk;
        $dienkes->ngaysx = $request->ngaysanxuat;
        if($request->trangthai==2){
            $dienkes->makh = null;
            $dienkes->trangthai = $request->trangthai;
            $dienkes->ngaylap = null;
          }

        if($request->makh!=null && $dienkes->trangthai==0){
            $dienkes->makh = $request->makh;
            $dienkes->trangthai = 1;
            $dienkes->ngaylap = date('Y-m-d H:i:s');
        }
         if($request->trangthai==0 && $dienkes->trangthai==2){
            $dienkes->trangthai = $request->trangthai; 
        }
       $dienkes->save();
        return redirect()->back()->with('status1',"Sửa thành công");
        }

//
    public function XuLyXoa($id)
    {
         $dienkes = DienKe::find($id);
            if($dienkes->makh!=null){
                $alert='Điện kế đang được sử dụng. Không thể xóa';
                return redirect()->back()->with('alert',$alert);
            }
            $dienkes->delete();
        return redirect('e-stu/qldk/danhsach')->with('status1','Xóa Thành Công');
    }
}
