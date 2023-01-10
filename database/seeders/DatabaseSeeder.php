<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(SystemSeeder::class);
        $this->call(HeadvoteSeeder::class);
        $this->call(VoteSeeder::class);
        $this->call(CaroselSeeder::class);
        $this->call(AdminSeeder::class);
    }
}
