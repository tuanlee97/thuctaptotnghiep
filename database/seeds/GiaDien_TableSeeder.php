<?php

use Illuminate\Database\Seeder;

class GiaDien_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[ 
    				['tenbac'=>"Bậc 1",
    				'tusokw'=>"0",
    				'densokw'=>"50",
    				'dongia'=>"1549",
    				'ngayapdung'=>"2017-12-30"],

    				['tenbac'=>"Bậc 2",
    				'tusokw'=>"51",
    				'densokw'=>"100",
    				'dongia'=>"1600",
    				'ngayapdung'=>"2017-12-29"],

    				['tenbac'=>"Bậc 3",
    				'tusokw'=>"101",
    				'densokw'=>"200",
    				'dongia'=>"1858",
    				'ngayapdung'=>"2017-12-28"]
    			];

        DB::table('giadien')->insert($data);
    }
}
