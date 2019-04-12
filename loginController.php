<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

class loginController extends Controller
{
    public function getLogin(){
    	return view('adpanel.login');
    }
     public function postLogin(Request $request){
        $login = [
        'manv' =>$request ->manv,
        'password'=> $request ->password
        ];
    		
        if(Auth::attempt($login))
            return redirect('home');
        else
           { 
         	return redirect('/');}
        
    }
}
