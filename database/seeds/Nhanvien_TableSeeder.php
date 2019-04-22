<?php

use Illuminate\Database\Seeder;

class Nhanvien_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[ 
    				[ 
                        'manv'=>"PE1082",
                        'tennv'=>"Lê Tuân",
        				'email'=>"letuan@stu",
        				'password' => Hash::make("123456"),
        				'diachi'=>"Bình Tân , HCM",
        				'cmnd'=>"212579082",
        				'sdt'=>"0395563446",
        				'hinhanh'=>"tuan.jpg",
        				'chucvu'=>"1"
    				],

    				[
                        'manv'=>"PE2002",
                        'tennv'=>"Huỳnh An",
        				'email'=>"huynhan1996@stu",
        				'password' => Hash::make("123456"),
        				'diachi'=>"Tân Phú , HCM",
        				'cmnd'=>"212579002",
        				'sdt'=>"0145561261",
        				'hinhanh'=>"an.jpg",
        				'chucvu'=>"2"
    				],
    				[   'manv'=>"PE3003",
                        'tennv'=>"Cẩm Tú",
        				'email'=>"camtu@stu",
        				'password' => Hash::make("123456"),
        				'diachi'=>"Quận 8 , HCM",
        				'cmnd'=>"212579003",
        				'sdt'=>"0135634145",
        				'hinhanh'=>"tu.jpg",
        				'chucvu'=>"3"
    				],


    			];

        DB::table('users')->insert($data);
    }
}
