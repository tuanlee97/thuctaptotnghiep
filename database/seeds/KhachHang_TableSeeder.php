<?php

use Illuminate\Database\Seeder;

class KhachHang_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {		
    	$data =[ 
        
    				['makh'=>"KH123",
    				'tenkh'=>"Diễm Tường",
    				'diachi'=>"Quận 8 , HCM",
    				'cmnd'=>"212552123",
    				'sdt'=>"0146563422",
    				'hinhanh'=>"tuong.jpg"
    				],

    				['makh'=>"KH087",
    				'tenkh'=>"Trọng Khang",
    				'diachi'=>"Quận 8 Plus , HCM",
    				'cmnd'=>"212552087",
    				'sdt'=>"0391233446",
    				'hinhanh'=>"khang.jpg"

    				],
    				['makh'=>"KH647",
    				'tenkh'=>"Thế Vinh",
    				'diachi'=>"Quận 8 , HCM",
    				'cmnd'=>"212552647",
    				'sdt'=>"0967564426",
    				'hinhanh'=>"vinh.jpg"

    				],


    			];

        DB::table('khachhang')->insert($data);
    }
}
