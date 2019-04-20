<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::truncate();
        Role::create(['name' => 'Administrador sindicato']);
        Role::create(['name' => 'Usuário padrão']);
        Role::create(['name' => 'Super']);
    }
}
