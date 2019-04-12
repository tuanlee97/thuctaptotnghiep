<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\KhachHang;
use Gate;


class KhachHangController extends Controller
{
    public function getDanhsach()
    {   
        if(!Gate::allows('isAdmin')){
            abort(404,"Sorry, You can do this actions");
        }
        $khachhang = KhachHang::paginate(5);
        
        return view('khachhang.danhsach',['khachhang'=>$khachhang]);
    }
    public function getThem()
    {   

        return view('khachhang.them');
    }

    public function postThem(Request $request)
    {
        ////sKiểm tra dữ liệu đầu vào (không được rỗng, giới hạn của dữ liệu được nhập)
        $this->validate($request,
            [
                'tenkh'=>'required|unique:khachhang,tenkh|min:4|max:20',
                'sdt'=>'required|min:10',
                'cmnd'=>'required|min:9',
                'diachi'=>'required',
                'hinhanh'=>'required'
                // Unique: Dữ liệu nhập vào không được trùng với dữ liệu hiện tại
                // Cú pháp của unique:tên_bảng,tên_cột
            ],  
            [   'tenkh.required' => 'Chưa nhập tên khách hàng!',
                'tenkh.unique' => 'Tên đã tồn tại, vui lòng nhập lại!',
                'tenkh.max'=>'Tên phải chỉ gồm tối đa 20 ký tự!',
                'tenkh.min'=>'Tên phải gồm ít nhất 4 ký tự!',
                'sdt.required'=>'SĐT phải gồm ít nhất 10 ký tự!',
               'cmnd.required'=>'CMND phải gồm ít nhất 9 ký tự!',
                'diachi.required'=>'Bạn chưa nhập địa chỉ',
                'hinhanh.required'=>'Bạn chưa nhập hình ảnh ',
            ]);


        // Thêm dữ liệu vào CSDL, ở đây 1 record dữ liệu được xem như một đối tượng (object), vì ta sử dụng Eloquent nên tất cả các bảng trong CSDL đã được ánh xạ thành Model trong Laravel. Do đó dữ liệu mới được thêm vào bằng cách tạo 1 đối tượng mới.

        $khachhangs = new KhachHang;
        $khachhangs->makh = "KH".substr($request->cmnd,6);
        $khachhangs->tenkh = $request->tenkh;
        $khachhangs->sdt = $request->sdt;
        $khachhangs->cmnd = $request->cmnd;
        $khachhangs->diachi = $request->diachi;
        if($request->hasFile('hinhanh'))
        {
            $file = $request->file('hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('e-stu/qlkh/them')->with('thongbao','Bạn chọn sai định dạng file');
            }
            $name = $file->getClientOriginalName();
             $image="".$name;
            $file->move("img/customers/",$image);
            $khachhangs->hinhanh=$image;
        }

       $khachhangs->save();
        return redirect()->back()->with('status1',"Thêm thành công");
}
    public function getSua($id)
    {
        $khachhang = KhachHang::find($id);
        return view('khachhang.sua',['khachhang'=>$khachhang]);
    }
    public function XuLySua(Request $request,$id)
    {
        $khachhangs = KhachHang::find($id);
          $this->validate($request,
             [
                'tenkh'=>'required|min:4|max:20',
                'sdt'=>'required|min:10|max:10',
                'cmnd'=>'required|min:9|max:9',
                'diachi'=>'required',
              
                // Unique: Dữ liệu nhập vào không được trùng với dữ liệu hiện tại
                // Cú pháp của unique:tên_bảng,tên_cột
            ],
            [   
                'tenkh.max'=>'Tên phải chỉ gồm tối đa 20 ký tự!',
                'tenkh.min'=>'Tên phải gồm ít nhất 4 ký tự!',
                'sdt.required'=>'SĐT phải gồm 10 ký tự!',
               'cmnd.required'=>'CMND phải gồm ít nhất 9 ký tự!',
                'diachi.required'=>'Bạn chưa nhập địa chỉ',
          
            ]);

        // Thêm dữ liệu vào CSDL, ở đây 1 record dữ liệu được xem như một đối tượng (object), vì ta sử dụng Eloquent nên tất cả các bảng trong CSDL đã được ánh xạ thành Model trong Laravel. Do đó dữ liệu mới được thêm vào bằng cách tạo 1 đối tượng mới.
        $khachhangs->makh = "KH".substr($request->cmnd,6);
        $khachhangs->tenkh = $request->tenkh;
        $khachhangs->sdt = $request->sdt;
        $khachhangs->cmnd = $request->cmnd;
        $khachhangs->diachi = $request->diachi;


       if($request->hasFile('hinhanh'))
        {
            $file = $request->file('hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('e-stu/qlkh/sua/'.$id)->with('thongbao','Bạn chọn sai định dạng file');
            }
            $name = $file->getClientOriginalName();
             $image="".$name;
            $file->move("img/customers/",$image);
            $khachhangs->hinhanh=$image;
        }

        $khachhangs->save();
        return redirect('e-stu/qlkh/sua/'.$khachhangs->makh)->with('status1',"Sửa thành công");
}
//
    public function XuLyXoa($id)
    {
          $khachhangs = KhachHang::find($id);
            $khachhangs->delete();
        return redirect('e-stu/qlkh/danhsach')->with('status1','Xóa Thành Công');
    }
}
