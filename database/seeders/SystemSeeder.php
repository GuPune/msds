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
              'url' => 'http://139.5.146.235/app/fgq5123yh47y34ujsf1',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s'),
              'logout' => 'http://139.5.146.235/login/a1',
              'path' => '/login/a1',
              'status' => 'O',
            ],
            [
              'token' => 'fgq5123yh47y3441245',
              'images' => '124124',
              'period' => 'N',
              'url' => 'http://139.5.146.235/app/fgq5123yh47y3441245',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s'),
              'logout' => 'http://139.5.146.235/login/a2',
              'path' => '/login/a2',
              'status' => 'O',
            ],
            [
                'token' => 'a3',
                'images' => '124124',
                'period' => 'E',
                'url' => 'http://139.5.146.235',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'logout' => '',
                'path' => '/',
                'status' => 'O',
              ]
          ];
          System::insert($users);

    }
}
