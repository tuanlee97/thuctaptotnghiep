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
       
      $data =[ 
            ['idchitiet'=>"CT0219123",
            'tungay'=>"2019-01-13",
            'denngay'=>"2019-02-13",
            'csdau'=>0,
            'cscuoi'=>35,
            'tamtinh'=>54215,
            'thue'=>5421.5,
            'tongthanhtien'=>59636.5,
            'dntt'=>35,
            'mahd'=>"HD0219123"
            ],
            ['idchitiet'=>"CT0319087",
            'tungay'=>"2019-02-13",
            'denngay'=>"2019-03-15",
            'csdau'=>35,
            'cscuoi'=>70,
            'tamtinh'=>54215,
            'thue'=>5421.5,
            'tongthanhtien'=>59636.5,
            'dntt'=>35,
            'mahd'=>"HD0319087"
            ]

          ];

        DB::table('cthoadon')->insert($data);
    }
}
