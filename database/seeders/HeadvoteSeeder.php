<?php

namespace Database\Seeders;

use App\Models\Carosel;
use App\Models\Headvote;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HeadvoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('headvotes')->delete();

        $users =  [
            [
              'title' => 'MSD TALENT SHOW',
              'start' => '2023-01-15 10:45:00',
              'end' => '2023-01-17 17:00:00',
              'type' => '1',
              'period' => 'D',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
            ],
            [
              'title' => 'MSD NEXT IDOL',
              'start' => '2023-01-15 10:45:00',
              'end' => '2023-01-17 17:00:00',
              'type' => '2',
              'period' => 'D',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
            ],
            [
              'title' => 'MSD NEXT IDOL GROUP',
              'start' => '2023-01-15 10:45:00',
              'end' => '2023-01-17 17:00:00',
              'type' => '3',
              'period' => 'N',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
            ]

          ];
          Headvote::insert($users);

    }
}
