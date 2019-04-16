<?php

use Illuminate\Database\Seeder;

class DienKe_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data =[     [
                        'madk'=>"DKCE-14G",
                        'tendk'=>"CE-14G",
        				'ngaysx'=>"2018-04-11",
        				'ngaylap'=>"2019-04-14",
        				'trangthai'=>1,
                        'makh'=>"KH087"
                    ]
    			];

        DB::table('dienke')->insert($data);
    }
}
