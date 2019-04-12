<?php

use Illuminate\Database\Seeder;

class Chucvu_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data =[ 
    				['tencv'=>"Admin"],
    				['tencv'=>"Ghi số điện"],
    				['tencv'=>"Thu ngân"]
    			];

        DB::table('chucvu')->insert($data);
    }
}
