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
    				['mahd'=>"HD03123",
    				'ky'=>"2019-03",
    				'ngaylap'=>"2019-03-15",
    				'tongtien'=>59637,
    				'trangthai'=>0,
    				'makh'=>"KH123",
    				'manv'=>"PE2002"
    				]

    			];

        DB::table('hoadon')->insert($data);
    }
}
