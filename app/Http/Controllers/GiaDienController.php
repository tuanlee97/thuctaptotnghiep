<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\GiaDien;
use Gate;


class GiaDienController extends Controller
{
    public function getDanhsach()
    {   
        if(!Gate::allows('isAdmin')){
            abort(404,"Sorry, You can do this actions");
        }
        $giadien = GiaDien::paginate(5);
        
        return view('giadien.danhsach',['giadien'=>$giadien]);
    }
    public function getThem()
    {   

        return view('giadien.them');
    }

    public function postThem(Request $request)
    {
        ////sKiểm tra dữ liệu đầu vào (không được rỗng, giới hạn của dữ liệu được nhập)
        $this->validate($request,
            [
                'tenbac'=>'required|min:4|max:20',
                'tusokwh'=>'required',
                'densokwh'=>'required',
                'dongia'=>'required',
                'ngayapdung'=>'required'
                // Unique: Dữ liệu nhập vào không được trùng với dữ liệu hiện tại
                // Cú pháp của unique:tên_bảng,tên_cột
            ],
            [   'tenbac.unique' => 'Tên đã tồn tại, vui lòng nhập lại!',
                'tenbac.max'=>'Tên phải chỉ gồm tối đa 20 ký tự!',
                'tenbac.min'=>'Tên phải gồm ít nhất 4 ký tự!',
                'tusokwh.required'=>'Bạn chưa nhập giá trị1',
                'densokwh.required'=>'Bạn chưa nhập giá trị2',
                'dongia.required'=>'Bạn chưa nhập giá trị đơn giá',
                'ngayapdung.required'=>'Bạn chưa nhập ngày áp dụng ',
            ]);


        // Thêm dữ liệu vào CSDL, ở đây 1 record dữ liệu được xem như một đối tượng (object), vì ta sử dụng Eloquent nên tất cả các bảng trong CSDL đã được ánh xạ thành Model trong Laravel. Do đó dữ liệu mới được thêm vào bằng cách tạo 1 đối tượng mới.

        $giadiens = new GiaDien;
        $giadiens->tenbac = $request->tenbac;
        $giadiens->tusokw = $request->tusokwh;
        $giadiens->densokw = $request->densokwh;
        $giadiens->dongia = $request->dongia;
        $giadiens->ngayapdung = $request->ngayapdung;

       $giadiens->save();
        return redirect()->back()->with('status1',"Thêm thành công");
}
    public function getSua($id)
    {
        $giadien = GiaDien::find($id);
        return view('giadien.sua',['giadien'=>$giadien]);
    }
    public function XuLySua(Request $request,$id)
    {
        $giadiens = GiaDien::find($id);
          $this->validate($request,
            [
                'tenbac'=>'required|min:4|max:20',
                'tusokwh'=>'required|integer',
                'densokwh'=>'required|integer',
                'dongia'=>'required',
                
                // Unique: Dữ liệu nhập vào không được trùng với dữ liệu hiện tại
                // Cú pháp của unique:tên_bảng,tên_cột
            ],
            [   
                'tenbac.max'=>'Tên phải chỉ gồm tối đa 20 ký tự!',
                'tenbac.min'=>'Tên phải gồm ít nhất 4 ký tự!',
                'tusokwh.required'=>'Bạn chưa nhập giá trị 1',
                'tusokwh.integer'=>'Giá trị phải là số nguyên',
                'densokwh.required'=>'Bạn chưa nhập giá trị 2',
                'densokwh.integer'=>'Giá trị phải là số nguyên',
                'dongia.required'=>'Bạn chưa nhập giá trị đơn giá',
                
                
            ]);

        // Thêm dữ liệu vào CSDL, ở đây 1 record dữ liệu được xem như một đối tượng (object), vì ta sử dụng Eloquent nên tất cả các bảng trong CSDL đã được ánh xạ thành Model trong Laravel. Do đó dữ liệu mới được thêm vào bằng cách tạo 1 đối tượng mới.

        
        $giadiens->tenbac = $request->tenbac;
        $giadiens->tusokw = $request->tusokwh;
        $giadiens->densokw = $request->densokwh;
        $giadiens->dongia = $request->dongia;
        $giadiens->ngayapdung = $request->ngayapdung;

       $giadiens->save();
        return redirect()->back()->with('status1',"Sửa thành công");
}
//
    public function XuLyXoa($id)
    {
         $giadiens = GiaDien::find($id);
            $giadiens->delete();
        return redirect('e-stu/qlgiadien/danhsach')->with('status1','Xóa Thành Công');
    }
}
