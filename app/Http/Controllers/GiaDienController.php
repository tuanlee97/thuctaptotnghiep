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
        // return view('giadien.aa');
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
                'tenbac'=>'required|unique:giadien,tenbac|min:4|max:20',
                'tusokwh'=>'required|integer',
                'densokwh'=>'required|integer',
                'dongia'=>'required|numeric',
                'ngayapdung'=>'required'
                // Unique: Dữ liệu nhập vào không được trùng với dữ liệu hiện tại
                // Cú pháp của unique:tên_bảng,tên_cột
            ],
            [   'tenbac.required' => 'Bạn chưa nhập tên bậc!',
                'tenbac.unique' => 'Tên đã tồn tại, vui lòng nhập lại!',
                'tenbac.max'=>'Tên phải chỉ gồm tối đa 20 ký tự!',
                'tenbac.min'=>'Tên phải gồm ít nhất 4 ký tự!',
                'tusokwh.required'=>'Bạn chưa nhập giá trị từ số',
                'tusokwh.integer'=>'Giá trị phải là số nguyên',
                'densokwh.required'=>'Bạn chưa nhập giá trị đến số',
                'densokwh.integer'=>'Giá trị phải là số nguyên',
                
                'dongia.required'=>'Bạn chưa nhập giá trị đơn giá',
                'dongia.numeric'=>'Giá trị phải là kiểu số',
                
                'ngayapdung.required'=>'Bạn chưa nhập ngày áp dụng ',
            ]);


        // Thêm dữ liệu vào CSDL, ở đây 1 record dữ liệu được xem như một đối tượng (object), vì ta sử dụng Eloquent nên tất cả các bảng trong CSDL đã được ánh xạ thành Model trong Laravel. Do đó dữ liệu mới được thêm vào bằng cách tạo 1 đối tượng mới.
        if($request->tusokwh > $request->densokwh ) return redirect()->back()->with('loi',"Giá trị từ số phải nhỏ hơn đến số");
        if((double)$request->dongia <= 0 ) return redirect()->back()->with('loi',"Đơn giá phải lớn hơn 0");
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
        $other_name = GiaDien::Where('tenbac','<>',$giadiens->tenbac)->get();
          $this->validate($request,
            [
                'tenbac'=>'required|min:4|max:20',
                'tusokwh'=>'required|integer',
                'densokwh'=>'required|integer',
                'dongia'=>'required|numeric|min:0',
                
                // Unique: Dữ liệu nhập vào không được trùng với dữ liệu hiện tại
                // Cú pháp của unique:tên_bảng,tên_cột
            ],
            [   
                'tenbac.required' => 'Bạn chưa nhập tên bậc!',
           
                'tenbac.max'=>'Tên phải chỉ gồm tối đa 20 ký tự!',
                'tenbac.min'=>'Tên phải gồm ít nhất 4 ký tự!',
                'tusokwh.required'=>'Bạn chưa nhập giá trị 1',
                'tusokwh.integer'=>'Giá trị phải là số nguyên',
                'densokwh.required'=>'Bạn chưa nhập giá trị 2',
                'densokwh.integer'=>'Giá trị phải là số nguyên',
           
                'dongia.required'=>'Bạn chưa nhập giá trị đơn giá',
                'dongia.numeric'=>'Giá trị phải là kiểu số',
                'dongia.min'=>'Đơn giá không được nhỏ hơn 0',
                
                
            ]);

        // Thêm dữ liệu vào CSDL, ở đây 1 record dữ liệu được xem như một đối tượng (object), vì ta sử dụng Eloquent nên tất cả các bảng trong CSDL đã được ánh xạ thành Model trong Laravel. Do đó dữ liệu mới được thêm vào bằng cách tạo 1 đối tượng mới.
         foreach ($other_name as $other) {
              if($request->tenbac == $other->tenbac)
                return redirect()->back()->with('alert',"Tên bậc đã tồn tại, vui lòng chọn tên khác");
         }
         
        if($request->tusokwh > $request->densokwh ) return redirect()->back()->with('alert',"Giá trị từ số phải nhỏ hơn đến số");
        if((double)$request->dongia <= 0 ) return redirect()->back()->with('alert',"Đơn giá phải lớn hơn 0");
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
