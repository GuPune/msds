<?php

namespace Database\Seeders;

use App\Models\Carosel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CaroselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('carosel')->delete();

        $users =  [
            [
              'image' => '20230109111416U1OUrYP4i9gRkOo2bWSR.png',
              'sequence' => 1,
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
            ],
            [
              'image' => '20230109111431OIjQhVj1pItM5sjswYtn.png',
              'sequence' => 2,
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'image' => '20230109111440YL8lBUTAqWpi3ZBqZMX3.jpg',
                'sequence' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
          ];
          Carosel::insert($users);

    }
}
