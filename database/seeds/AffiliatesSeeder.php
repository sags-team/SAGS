<?php

use Illuminate\Database\Seeder;
use App\Branch;
use App\Affiliated;

class AffiliatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $branch1 = Branch::find(1);
        $branch2 = Branch::find(2);
        $branch3 = Branch::find(3);

        $affiliated1 = Affiliated::create(['name'=> 'fulano', 'cpf'=>'1234567890', 'sex'=>'Homem', 'email'=>'fulano@gmail.com', 'branch_id'=> $branch1->id]);
        //$affiliated1->branch()->save($branch1);
        $affiliated2 = Affiliated::create(['name'=> 'ciclano', 'cpf'=>'1234567899', 'sex'=>'Homem', 'email'=>'ciclano@gmail.com', 'branch_id'=> $branch1->id]);
        //$affiliated2->branch()->save($branch1);
        $affiliated3 = Affiliated::create(['name'=> 'beltrano', 'cpf'=>'1234567888', 'sex'=>'Homem', 'email'=>'beltrano@gmail.com', 'branch_id'=> $branch1->id]);
        //$affiliated3->branch()->save($branch1);
        $affiliated4 = Affiliated::create(['name'=> 'frusteca', 'cpf'=>'1234567889', 'sex'=>'Mulher', 'email'=>'frusteca@gmail.com', 'branch_id'=> $branch2->id]);
        //$affiliated1->branch()->save($branch2);
        $affiliated5 = Affiliated::create(['name'=> 'astolfo', 'cpf'=>'1234567222', 'sex'=>'Homem', 'email'=>'astolfo@gmail.com', 'branch_id'=> $branch2->id]);
        //$affiliated1->branch()->save($branch2);
        
        
        
    }
}
