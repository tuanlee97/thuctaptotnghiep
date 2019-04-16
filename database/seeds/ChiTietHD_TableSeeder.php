<?php

use Illuminate\Database\Seeder;

class ChiTietHD_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //    $data =[ 
    			// 	['idchitiet'=>"CT03123",
    			// 	'tungay'=>"2019-02-13",
    			// 	'denngay'=>"2019-03-15",
    			// 	'csdau'=>0,
    			// 	'cscuoi'=>35,
    			// 	'tongthanhtien'=>59637,
    			// 	'dntt'=>35,
    			// 	'mahd'=>"HD03123"
    			// 	]

    			// ];

       //  DB::table('cthoadon')->insert($data);
      $data =[ 
            ['idchitiet'=>"CT03123",
            'tungay'=>"2019-02-13",
            'denngay'=>"2019-03-15",
            'csdau'=>0,
            'cscuoi'=>35,
            'tongthanhtien'=>59637,
            'dntt'=>35,
            'mahd'=>"HD03123"
            ]

          ];

        DB::table('cthoadon')->insert($data);
    }
}
