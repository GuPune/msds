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
              'image' => '202301131249399q4cSknYoBUIWf7MGswQ.jpg',
              'sequence' => 1,
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
            ],
            [
              'image' => '20230113124949k6HoC8xV3CSEhpKn6kiD.jpg',
              'sequence' => 2,
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'image' => '20230113124958qV4L6sTw2FYQ23kkNcmM.jpg',
                'sequence' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
             [
                'image' => '20230113125007dEwj7XbSoBwHhoAUAKGU.jpg',
                'sequence' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
             ],
             [
                'image' => '20230113125018NtAhC292xdn8prFRlt3k.png',
                'sequence' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
             ],
             [
                'image' => '20230113125032lsSlepNPWSrJH8Peb2IM.png',
                'sequence' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
          ];
          Carosel::insert($users);

    }
}
