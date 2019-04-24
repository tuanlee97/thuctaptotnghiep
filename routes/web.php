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

Route::group(['prefix'=>'e-stu','middleware'=>'forceLogin'],function(){
     Route::get('home',//redirect
[   
    'as'=> 'home',//route
    'uses'=> 'MyController@getIndex'
]);
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
     Route::group(['prefix'=>'qldk'],function(){
        Route::get('danhsach','DienKeController@getDanhSach');

        Route::get('them','DienKeController@getThem');
        Route::post('xulythem','DienKeController@postThem');


        Route::get('sua/{id}','DienKeController@getSua');

        
        Route::post('sua/{id}','DienKeController@XuLySua');

        Route::get('xoa/{id}','DienKeController@XuLyXoa');
    });
      Route::group(['prefix'=>'thanhtoan'],function(){
     

        Route::get('truycap','ThanhToanController@getTruycap');
        Route::post('truycap','ThanhToanController@postTruycap');


        Route::get('checkout/{id}','ThanhToanController@getCheckout');

         Route::post('postcheckout/{id}','ThanhToanController@postCheckout');
       
          Route::get('success','ThanhToanController@getSuccess');
        Route::get('print/{id}','ThanhToanController@getInhoadon');
    });
 Route::group(['prefix'=>'ghidien'],function(){

        Route::get('truycap','GhiDienController@getTruycap');
        Route::post('truycap','GhiDienController@postTruycap');

         Route::post('xulighidien/{id}','GhiDienController@xulighidien');
       
          Route::get('success','GhiDienController@getSuccess');
           
        Route::post('print/{id}','GhiDienController@postIngiaybao');
    });

       Route::group(['prefix'=>'tracuuno'],function(){
        Route::get('dsno','tracuunoController@dsno');
        Route::get('dskh','tracuunoController@dskh');
       Route::get('dsdk','tracuunoController@dsdk');
    });
});

