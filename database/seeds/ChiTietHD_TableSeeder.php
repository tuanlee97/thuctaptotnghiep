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
            'cscuoi'=>71,
            'tamtinh'=>111050,
            'thue'=>11105,
            'tongthanhtien'=>122155,
            'dntt'=>71,
            'mahd'=>"HD0219123"
            ],
            ['idchitiet'=>"CT0319087",
            'tungay'=>"2019-02-13",
            'denngay'=>"2019-03-15",
            'csdau'=>0,
            'cscuoi'=>130,
            'tamtinh'=>213190,
            'thue'=>21319,
            'tongthanhtien'=>234509,
            'dntt'=>130,
            'mahd'=>"HD0319087"
            ]

          ];

        DB::table('cthoadon')->insert($data);
    }
}
