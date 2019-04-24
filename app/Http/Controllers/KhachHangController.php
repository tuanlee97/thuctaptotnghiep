<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\KhachHang;
use App\Models\DienKe;
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
                'tenkh'=>'required|min:4|max:20',
                'sdt'=>'required|unique:khachhang,sdt|numeric',
                'cmnd'=>'required|unique:khachhang,cmnd|numeric',
                'diachi'=>'required',
                'hinhanh'=>'required'
                // Unique: Dữ liệu nhập vào không được trùng với dữ liệu hiện tại
                // Cú pháp của unique:tên_bảng,tên_cột
            ],  
            [   'tenkh.required' => 'Chưa nhập tên khách hàng!',
                'tenkh.max'=>'Tên phải chỉ gồm tối đa 20 ký tự!',
                'tenkh.min'=>'Tên phải gồm ít nhất 4 ký tự!',
                'sdt.required'=>'Bạn chưa nhập SĐT!',
                'cmnd.required'=>'Bạn chưa nhập CMND!',
                'sdt.numeric'=>'SĐT phải là kiểu số!',
                'cmnd.numeric'=>'CMND phải là kiểu số!',
                'diachi.required'=>'Bạn chưa nhập địa chỉ',
                'hinhanh.required'=>'Bạn chưa nhập hình ảnh ',
                'sdt.unique' => 'SĐT đã tồn tại, vui lòng chọn SĐT khác!',
                'cmnd.unique' => 'CMND đã tồn tại, vui lòng chọn CMND khác!',
            ]);


        // Thêm dữ liệu vào CSDL, ở đây 1 record dữ liệu được xem như một đối tượng (object), vì ta sử dụng Eloquent nên tất cả các bảng trong CSDL đã được ánh xạ thành Model trong Laravel. Do đó dữ liệu mới được thêm vào bằng cách tạo 1 đối tượng mới.
        $err = "";
        if(strlen($request->sdt)!=10) $err .="Số điện thoại phải gồm 10 kí tự số !";
        if(strlen($request->cmnd)!=9) $err .=" CMND phải gồm 9 kí tự số !";
  
        if($err!="") return redirect()->back()->with('thongbao',$err);
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
        $testkh = KhachHang::Where('makh','<>',$khachhangs->makh)->get();
          $this->validate($request,
             [
                'tenkh'=>'required|min:4|max:20',
                'sdt'=>'required|numeric',
                'cmnd'=>'required|numeric',
                'diachi'=>'required',
                
              
                // Unique: Dữ liệu nhập vào không được trùng với dữ liệu hiện tại
                // Cú pháp của unique:tên_bảng,tên_cột
            ],
            [   
                'tenkh.max'=>'Tên phải chỉ gồm tối đa 20 ký tự!',
                'tenkh.min'=>'Tên phải gồm ít nhất 4 ký tự!',
                'sdt.required'=>'Bạn chưa nhập SĐT!',
                'cmnd.required'=>'Bạn chưa nhập CMND!',
                'sdt.numeric'=>'SĐT phải là kiểu số!',
                'cmnd.numeric'=>'CMND phải là kiểu số!',
                'diachi.required'=>'Bạn chưa nhập địa chỉ',
          
            ]);

        // Thêm dữ liệu vào CSDL, ở đây 1 record dữ liệu được xem như một đối tượng (object), vì ta sử dụng Eloquent nên tất cả các bảng trong CSDL đã được ánh xạ thành Model trong Laravel. Do đó dữ liệu mới được thêm vào bằng cách tạo 1 đối tượng mới.
 foreach ($testkh as $test) {
              if($test->sdt==$request->sdt)
            return redirect()->back()->with('thongbao',"SĐT đã tồn tại, vui lòng nhập SĐT khác");
        if($test->cmnd==$request->cmnd)
            return redirect()->back()->with('thongbao',"CMND đã tồn tại, vui lòng nhập CMND khác");
          }
          $err = "";
        if(strlen($request->sdt)!=10) $err .="Số điện thoại phải gồm 10 kí tự số !";
        if(strlen($request->cmnd)!=9) $err .=" CMND phải gồm 9 kí tự số !";
        
        if($err!="") return redirect()->back()->with('thongbao',$err);
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
          $dienke = DienKe::Where('makh','=',$khachhangs->makh)->first();
          if($dienke){
            $dienke->ngaylap=null;
            $dienke->trangthai = 0 ;
            $dienke->makh = null ;
            $dienke->save();
          }
          $khachhangs->delete();
        return redirect('e-stu/qlkh/danhsach')->with('status1','Xóa Thành Công');
            
    }
}
