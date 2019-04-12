<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\User;
use App\Models\ChucVu;
use Gate;
use Hash;

class NhanVienController extends Controller
{
    public function getDanhsach()
    {   
        if(!Gate::allows('isAdmin')){
            abort(404,"Sorry, You can do this actions");
        }
        $nhanvien = User::paginate(5);
        $chucvu = ChucVu::all();
        return view('nhanvien.danhsach',['nhanvien'=>$nhanvien, 'chucvu'=>$chucvu]);
    }
    public function getThem()
    {   

        $chucvu = ChucVu::all();
        return view('nhanvien.them',['chucvu'=>$chucvu]);
    }

    public function postThem(Request $request)
    {
        ////sKiểm tra dữ liệu đầu vào (không được rỗng, giới hạn của dữ liệu được nhập)
        $this->validate($request,
            [
                'tennv'=>'required|min:4|max:20',
                'email'=>'required|unique:users,email',
                'password'=>'required|min:6|max:20',
                'sdt'=>'required|min:10|max:10',
                'cmnd'=>'required|min:9|max:9',
                'diachi'=>'required',
                'hinhanh'=>'required',
                'chucvu'=>'required',
                'confirm_password'=>'required|same:password',
                // Unique: Dữ liệu nhập vào không được trùng với dữ liệu hiện tại
                // Cú pháp của unique:tên_bảng,tên_cột
            ],  
            [   'tennv.required' => 'Chưa nhập tên nhân viên!',
                'email.required' => 'Chưa nhập email!',
                'email.unique' => 'Email đã tồn tại, vui lòng chọn email khác!',
                'tennv.max'=>'Tên phải chỉ gồm tối đa 20 ký tự!',
                'tennv.min'=>'Tên phải gồm ít nhất 4 ký tự!',
                'password.required' => 'Bạn chưa nhập mật khẩu!',
                'password.max'=>'Mật khẩu chỉ gồm tối đa 20 ký tự!',
                'password.min'=>'Mật khẩu gồm ít nhất 6 ký tự!',
                'confirm_password'=>'Mật khẩu không trùng khớp',
                'sdt.required'=>'SĐT phải gồm 10 ký tự!',
               'cmnd.required'=>'CMND phải gồm  9 ký tự!',
                'diachi.required'=>'Bạn chưa nhập địa chỉ',
                'hinhanh.required'=>'Bạn chưa nhập hình ảnh ',
                'chucvu.required'=>'Bạn chưa chọn chức vụ '
            ]);


        // Thêm dữ liệu vào CSDL, ở đây 1 record dữ liệu được xem như một đối tượng (object), vì ta sử dụng Eloquent nên tất cả các bảng trong CSDL đã được ánh xạ thành Model trong Laravel. Do đó dữ liệu mới được thêm vào bằng cách tạo 1 đối tượng mới.

        $nhanviens = new User;
        $nhanviens->manv = "PE".$request->chucvu.substr($request->cmnd,6);
        $nhanviens->tennv = $request->tennv;
        $nhanviens->email = $request->email;
        $nhanviens->password = Hash::make($request->password);
        $nhanviens->sdt = $request->sdt;
        $nhanviens->cmnd = $request->cmnd;
        $nhanviens->diachi = $request->diachi;
        if($request->hasFile('hinhanh'))
        {
            $file = $request->file('hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect()->back()->with('loi',"Bạn chọn sai định dạng file");
            }
            $name = $file->getClientOriginalName();
             $image="".$name;
            $file->move("img/users/",$image);
            $nhanviens->hinhanh=$image;
        }
        $nhanviens->chucvu = $request->chucvu;
       $nhanviens->save();
        return redirect()->back()->with('status1',"Thêm thành công");
}
    public function getSua($id)
    {
        $nhanvien = User::find($id);
        $chucvu = ChucVu::all();
        return view('nhanvien.sua',['nhanvien'=>$nhanvien,'chucvu'=> $chucvu]);
    }
    public function XuLySua(Request $request,$id)
    {
        $nhanviens = User::find($id);
          $this->validate($request,
            [
                'tennv'=>'required|min:4|max:20',
                'email'=>'required',
               
                'sdt'=>'required|min:10|max:10',
                'cmnd'=>'required|min:9|max:9',
                'diachi'=>'required'
                
                
                // Unique: Dữ liệu nhập vào không được trùng với dữ liệu hiện tại
                // Cú pháp của unique:tên_bảng,tên_cột
            ],  
            [   'tennv.required' => 'Chưa nhập tên nhân viên!',
                'email.required' => 'Chưa nhập email!',
                'tennv.max'=>'Tên phải chỉ gồm tối đa 20 ký tự!',
                'tennv.min'=>'Tên phải gồm ít nhất 4 ký tự!',
                'password.required' => 'Bạn chưa nhập mật khẩu!',
                'password.max'=>'Mật khẩu chỉ gồm tối đa 20 ký tự!',
                'password.min'=>'Mật khẩu gồm ít nhất 6 ký tự!',
                'sdt.required'=>'SĐT phải gồm 10 ký tự!',
               'cmnd.required'=>'CMND phải gồm  9 ký tự!',
                'diachi.required'=>'Bạn chưa nhập địa chỉ'
               
            ]);


        // Thêm dữ liệu vào CSDL, ở đây 1 record dữ liệu được xem như một đối tượng (object), vì ta sử dụng Eloquent nên tất cả các bảng trong CSDL đã được ánh xạ thành Model trong Laravel. Do đó dữ liệu mới được thêm vào bằng cách tạo 1 đối tượng mới.
        $nhanviens->manv = "PE".$request->chucvu.substr($request->cmnd,6);
        $nhanviens->tennv = $request->tennv;
        $nhanviens->sdt = $request->sdt;
        $nhanviens->cmnd = $request->cmnd;
        $nhanviens->diachi = $request->diachi;
        $nhanviens->email = $request->email;
        $nhanviens->chucvu = $request->chucvu;
        if($request->changepass == "on")
        {
            $this->validate($request,
        [
                'password'=>'required|min:6|max:20',
                'confirm_password'=>'required|same:password',
        ],
        [
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu phải có ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu phải chứ tối đa 20 kí tự',
                'confirm_password'=>'Mật khẩu không trùng khớp',
        ]);
            $nhanviens->password = Hash::make($request->password);

        }

       if($request->hasFile('hinhanh'))
        {
            $file = $request->file('hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('e-stu/qlnv/sua/'.$id)->with('loi',"Bạn chọn sai định dạng file");
            }
            $name = $file->getClientOriginalName();
             $image="".$name;
            $file->move("img/users/",$image);
            $nhanviens->hinhanh=$image;
        }

        $nhanviens->save();
        return redirect('e-stu/qlnv/sua/'.$nhanviens->manv)->with('status1',"Sửa thành công");
}
//
    public function XuLyXoa($id)
    {
          $nhanviens = User::find($id);
            $nhanviens->delete();
        return redirect()->back()->with('status1','Xóa Thành Công');
    }
}
