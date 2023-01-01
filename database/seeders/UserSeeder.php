<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();
		DB::table('users')->insert([
		'email' => 'rkknoob@gmail.com',
		'password' => Hash::make('123456'),
        'name' => 'Administrator',
        'fname' => 'Boonkhet',
        'lname' => 'Reangcharoentham',
        'dep' => 'IT',
		'period' => 'D',
		'is_admin' => 1,
		'created_at' => date('Y-m-d H:i:s')
		]);
    }
}
