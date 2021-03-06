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
                    ],
                    [
                        'madk'=>"DKCE-41G",
                        'tendk'=>"CE-41G",
                        'ngaysx'=>"2018-01-11",
                        'ngaylap'=>"2019-01-13",
                        'trangthai'=>1,
                        'makh'=>"KH123"
                    ]
    			];

        DB::table('dienke')->insert($data);
    }
}
