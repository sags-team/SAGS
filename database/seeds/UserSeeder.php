<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

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
        User::truncate();

        $adminRole = Role::where('name', 'Administrador sindicato')->first();
        $userRole = Role::where('name', 'Usuário padrão')->first();

        $admin = User::create(['name' => 'admin', 'email'=> 'admin1@admin.com.br', 'password' => Hash::make('12345678')]);
        $admin->roles()->attach($adminRole);

        $admin2 = User::create(['name' => 'admin2', 'email'=> 'admin2@admin.com.br', 'password' => Hash::make('12345678')]);
        $admin2->roles()->attach($adminRole);
        
        $user = User::create(['name' => 'user', 'email'=> 'user1@user.com.br', 'password' => Hash::make('12345678')]);
        $user->roles()->attach($userRole);
        
        $user2 = User::create(['name' => 'user2', 'email'=> 'user2@user.com.br', 'password' => Hash::make('1234567890')]);
        $user2->roles()->attach($userRole);
        
    }
}
