<?php

namespace Database\Seeders;

use App\Models\FactVote;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Fotefaceeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('fact_votes')->delete();


        $users =  [
            [
              'user_id' => '1',
              'headvotes_id' => '1',
              'votes_id' => '1',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => '2',
                'headvotes_id' => '1',
                'votes_id' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
              ],
              [
                'user_id' => '3',
                'headvotes_id' => '1',
                'votes_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
              ],
              [
                'user_id' => '4',
                'headvotes_id' => '1',
                'votes_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
              ],
              [
                'user_id' => '5',
                'headvotes_id' => '1',
                'votes_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
              ],
              [
                'user_id' => '6',
                'headvotes_id' => '1',
                'votes_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
              ],
          ];


        FactVote::insert($users);
    }
}
