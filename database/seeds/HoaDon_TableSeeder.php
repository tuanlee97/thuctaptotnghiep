<?php

use Illuminate\Database\Seeder;

class HoaDon_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data =[ 
                    ['mahd'=>"HD0219123",
                    'ky'=>"2019-02",
                    'ngaylap'=>"2019-02-13",
                    'tongtien'=>59637,
                    'trangthai'=>1,
                    'makh'=>"KH123",
                    'manv'=>"PE2002"
                    ],
    				['mahd'=>"HD0319123",
    				'ky'=>"2019-03",
    				'ngaylap'=>"2019-03-13",
    				'tongtien'=>59637,
    				'trangthai'=>0,
    				'makh'=>"KH123",
    				'manv'=>"PE2002"
    				]

    			];

        DB::table('hoadon')->insert($data);
    }
}
