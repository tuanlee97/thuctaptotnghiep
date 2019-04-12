<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*//* View Composer*/



Route::group(['prefix'=>'/'],function(){
		Route::get('/','MyController@getLogin');
		Route::post('/','MyController@postLogin');
	});

Route::get('logout',
[
    'as'=> 'logout',
    'uses'=> 'MyController@getlogout'
]);
 Route::get('home',//redirect
[   
    'as'=> 'home',//route
    'uses'=> 'MyController@getIndex'
]);
Route::group(['prefix'=>'e-stu','middleware'=>'forceLogin'],function(){

    Route::group(['prefix'=>'qlgiadien'],function(){
        Route::get('danhsach','GiaDienController@getDanhSach');

        Route::get('them','GiaDienController@getThem');
        Route::post('xulythem','GiaDienController@postThem');


        Route::get('sua/{id}','GiaDienController@getSua');

        
        Route::post('sua/{id}','GiaDienController@XuLySua');

        Route::get('xoa/{id}','GiaDienController@XuLyXoa');
    });

    Route::group(['prefix'=>'qlkh'],function(){
        Route::get('danhsach','KhachHangController@getDanhSach');

        Route::get('them','KhachHangController@getThem');
        Route::post('xulythem','KhachHangController@postThem');


        Route::get('sua/{id}','KhachHangController@getSua');

        
        Route::post('sua/{id}','KhachHangController@XuLySua');

        Route::get('xoa/{id}','KhachHangController@XuLyXoa');
    });
    Route::group(['prefix'=>'qlnv'],function(){
        Route::get('danhsach','NhanVienController@getDanhSach');

        Route::get('them','NhanVienController@getThem');
        Route::post('xulythem','NhanVienController@postThem');


        Route::get('sua/{id}','NhanVienController@getSua');

        
        Route::post('sua/{id}','NhanVienController@XuLySua');

        Route::get('xoa/{id}','NhanVienController@XuLyXoa');
    });
});

