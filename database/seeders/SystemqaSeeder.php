<?php

namespace Database\Seeders;

use App\Models\Systemqa;
use Illuminate\Database\Seeder;
use DB;

class SystemqaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('systemqa')->delete();


        $users =  [
            [
              'startf' => '09:00:00',
              'startl' => '13:00:00',
              'endf' => '12:00:00',
              'endl' => '16:00:00',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s'),
            ]
          ];
          Systemqa::insert($users);


    }
}
