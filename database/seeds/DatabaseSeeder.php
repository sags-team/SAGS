<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(BranchesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AffiliatesSeeder::class);
        $this->call(BankInfoSeeder::class);
    }
}
