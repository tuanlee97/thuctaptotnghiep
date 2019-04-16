<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;
class MyController extends Controller
{
    public function getLogin(){
    	return view('login');
    }
     public function postLogin(Request $request){

$this->validate($request,
        [
                'manv'=>'required',
                'password'=>'required|min:6|max:32',
        ],

        [
                'manv.required'=>'Vui lòng nhập mã nhân viên',
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu không được nhỏ hơn 6 kí tự',
                'password.max'=>'Mật khẩu không được lớn hơn 32 kí tự'

        ]);

        $datalogin = [
        'manv' =>$request->manv,
        'password'=> $request->password,
        ];
    		
         if(Auth::attempt($datalogin) )
        {
           
            return redirect('e-stu/home');

        }
        else
           { 
         	return redirect()->back()->with('status1','Mã nhân viên hoặc mật khẩu không đúng !');
         }
        
    }
    public function getIndex()
    {
        return view('home');
    }

public function getlogout()
    {
        Auth::logout();
        return redirect('/')->with('status2','Đăng xuất thành công');
    }




}
