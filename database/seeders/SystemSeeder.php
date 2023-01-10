<?php

namespace Database\Seeders;

use App\Models\System;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('system')->delete();

        $users =  [
            [
              'token' => 'fgq5123yh47y34ujsf1',
              'images' => '124124',
              'period' => 'D',
              'url' => 'http://127.0.0.1:8000/fgq5123yh47y34ujsf1',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
            ],
            [
              'token' => 'fgq5123yh47y3441245',
              'images' => '124124',
              'period' => 'N',
              'url' => 'http://127.0.0.1:8000/fgq5123yh47y3441245',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
            ]
          ];
          System::insert($users);

    }
}
