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
        $superRole = Role::where('name', 'Super')->first();

        $super = User::create(['name' => 'super', 'email'=> 'super@super.com.br', 'password' => Hash::make('12345678')]);
        $super->roles()->attach($superRole);

        $admin = User::create(['name' => 'admin1', 'email'=> 'admin1@admin.com.br', 'password' => Hash::make('12345678'), 'branch_id' => 1]);
        $admin->roles()->attach($adminRole);

        $admin2 = User::create(['name' => 'admin2', 'email'=> 'admin2@admin.com.br', 'password' => Hash::make('12345678'), 'branch_id' => 2]);
        $admin2->roles()->attach($adminRole);

        $admin2 = User::create(['name' => 'admin3', 'email'=> 'admin3@admin.com.br', 'password' => Hash::make('12345678'), 'branch_id' => 3]);
        $admin2->roles()->attach($adminRole);
        
        $user = User::create(['name' => 'user', 'email'=> 'user1@user.com.br', 'password' => Hash::make('12345678'), 'branch_id' => 3]);
        $user->roles()->attach($userRole);
        
        $user2 = User::create(['name' => 'user2', 'email'=> 'user2@user.com.br', 'password' => Hash::make('1234567890'), 'branch_id' => 1]);
        $user2->roles()->attach($userRole);
        
    }
}
