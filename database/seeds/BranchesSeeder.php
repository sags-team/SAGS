<?php

use Illuminate\Database\Seeder;
use App\Branch;

class BranchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Branch::create(['name' => 'Universidade Federal de Pernambuco', 'code'=> 'UFPE', 'active' => true]);
        Branch::create(['name' => 'Universidade Federal Rural de Pernambuco', 'code'=> 'UFRPE', 'active' => true]);
        Branch::create(['name' => 'Universidade Federal do Rio Grande do Norte', 'code'=> 'UFRN', 'active' => true]);
    }
}
