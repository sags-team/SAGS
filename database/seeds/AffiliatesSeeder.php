<?php

use Illuminate\Database\Seeder;
use App\Branch;
use App\Affiliated;
use App\Address;

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
        $address1 = new Address;
        $address1->cep = 53130330;
        $address1->country = 'Brasil';
        $address1->state = 'Pernambuco';
        $address1->city = 'Olinda';
        $address1->neighborhood = 'Casa caiada';
        $address1->number = 140;
        $address1->complement = 'Apt 201';
        $address1->street = 'Rua Tertuliano Francisco feitosa';
        $affiliated1->address()->save($address1);

        $affiliated2 = Affiliated::create(['name'=> 'ciclano', 'cpf'=>'1234567899', 'sex'=>'Homem', 'email'=>'ciclano@gmail.com', 'branch_id'=> $branch1->id]);
        $address1 = new Address;
        $address1->cep = 53130331;
        $address1->country = 'Brasil';
        $address1->state = 'Pernambuco';
        $address1->city = 'Recife';
        $address1->neighborhood = 'Teste1';
        $address1->number = 84;
        $address1->complement = '';
        $address1->street = 'Rua Chico';
        $affiliated2->address()->save($address1);

        $affiliated3 = Affiliated::create(['name'=> 'beltrano', 'cpf'=>'1234567888', 'sex'=>'Homem', 'email'=>'beltrano@gmail.com', 'branch_id'=> $branch1->id]);
        $address1 = new Address;
        $address1->cep = 52243022;
        $address1->country = 'Brasil';
        $address1->state = 'Pernambuco';
        $address1->city = 'Igarrasu';
        $address1->neighborhood = 'Cruz de rebolsa';
        $address1->number = 32;
        $address1->complement = 'preto da praça';
        $address1->street = 'Rua qualquer rua';
        $affiliated3->address()->save($address1);

        $affiliated4 = Affiliated::create(['name'=> 'frusteca', 'cpf'=>'1234567889', 'sex'=>'Mulher', 'email'=>'frusteca@gmail.com', 'branch_id'=> $branch2->id]);
        $address1 = new Address;
        $address1->cep = 281858483;
        $address1->country = 'Brasil';
        $address1->state = 'Rio grande do norte';
        $address1->city = 'Natal';
        $address1->neighborhood = 'Parnamirim';
        $address1->number = 14;
        $address1->complement = '';
        $address1->street = 'Rua de natal';
        $affiliated4->address()->save($address1);

        $affiliated5 = Affiliated::create(['name'=> 'astolfo', 'cpf'=>'1234567222', 'sex'=>'Homem', 'email'=>'astolfo@gmail.com', 'branch_id'=> $branch2->id]);
        $address1 = new Address;
        $address1->cep = 75938528;
        $address1->country = 'States';
        $address1->state = 'New York';
        $address1->city = 'New York';
        $address1->neighborhood = 'hells kitchen';
        $address1->number = 4302;
        $address1->complement = 'Qualquer complemente';
        $address1->street = 'Rua da rua cheio de ruas';
        $affiliated5->address()->save($address1);
        
    }
}
