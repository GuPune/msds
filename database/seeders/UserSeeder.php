<?php

namespace Database\Seeders;

use App\Models\User;
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



        $users =  [
            [
                'email' => 'rkknoob@gmail.com',
                'password' => Hash::make('123456'),
                'name' => 'Administrator',
                'fname' => 'Boonkhet',
                'lname' => 'Reangcharoentham',
                'dep' => 'IT',
                'period' => 'D',
                'is_admin' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'email' => 'rkknoob1@gmail.com',
		'password' => Hash::make('123456'),
        'name' => 'Administrator',
        'fname' => 'Boonkhet',
        'lname' => 'Reangcharoentham',
        'dep' => 'IT',
		'period' => 'D',
		'is_admin' => 1,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
              ],
              [
                'email' => 'rkknoob2@gmail.com',
		'password' => Hash::make('123456'),
        'name' => 'Administrator',
        'fname' => 'Boonkhet',
        'lname' => 'Reangcharoentham',
        'dep' => 'IT',
		'period' => 'D',
		'is_admin' => 1,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
              ],
              [
                'email' => 'rkknoob3@gmail.com',
                'password' => Hash::make('123456'),
                'name' => 'Administrator',
                'fname' => 'Boonkhet',
                'lname' => 'Reangcharoentham',
                'dep' => 'IT',
                'period' => 'D',
                'is_admin' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
              ],
              [
                'email' => 'rkknoob4@gmail.com',
		'password' => Hash::make('123456'),
        'name' => 'Administrator',
        'fname' => 'Boonkhet',
        'lname' => 'Reangcharoentham',
        'dep' => 'IT',
		'period' => 'D',
		'is_admin' => 1,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
              ],
              [
                'email' => 'rkknoob5@gmail.com',
                'password' => Hash::make('123456'),
                'name' => 'Administrator',
                'fname' => 'Boonkhet',
                'lname' => 'Reangcharoentham',
                'dep' => 'IT',
                'period' => 'D',
                'is_admin' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
              ],
              [
                'email' => 'rkknoob6@gmail.com',
                'password' => Hash::make('123456'),
                'name' => 'Administrator',
                'fname' => 'Boonkhet',
                'lname' => 'Reangcharoentham',
                'dep' => 'IT',
                'period' => 'D',
                'is_admin' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
              ],
          ];

        User::insert($users);
    }
}
