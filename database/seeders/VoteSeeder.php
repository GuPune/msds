<?php

namespace Database\Seeders;

use App\Models\Vote;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('votes')->delete();

        $users =  [

            [
                'image' => '20230108102259WPP23hbdFHXzWMnQitt6.png',
                'sequence' => 1,
                'des' => 'xxxxxx',
                'type' => '1',
                'period' => 'D',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'image' => '20230108102259WPP23hbdFHXzWMnQitt6.png',
                'sequence' => 2,
                'des' => 'xxxxxx',
                'type' => '1',
                'period' => 'D',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'image' => '20230108102259WPP23hbdFHXzWMnQitt6.png',
                'sequence' => 3,
                'des' => 'xxxxxx',
                'type' => '1',
                'period' => 'D',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'image' => '20230108102259WPP23hbdFHXzWMnQitt6.png',
                'sequence' => 4,
                'des' => 'xxxxxx',
                'type' => '1',
                'period' => 'D',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'image' => '20230108102259WPP23hbdFHXzWMnQitt6.png',
                'sequence' => 5,
                'des' => 'xxxxxx',
                'type' => '1',
                'period' => 'D',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'image' => '20230108102259WPP23hbdFHXzWMnQitt6.png',
                'sequence' => 6,
                'des' => 'xxxxxx',
                'type' => '1',
                'period' => 'D',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'image' => '20230108102259WPP23hbdFHXzWMnQitt6.png',
                'sequence' => 7,
                'des' => 'xxxxxx',
                'type' => '1',
                'period' => 'D',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'image' => '20230108102259WPP23hbdFHXzWMnQitt6.png',
                'sequence' => 8,
                'des' => 'xxxxxx',
                'type' => '1',
                'period' => 'D',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
          ];
          Vote::insert($users);

    }
}
