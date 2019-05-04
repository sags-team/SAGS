<?php

use Illuminate\Database\Seeder;
use App\Branch;
use App\Affiliated;
use App\Address;
use App\Telephone;

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

        $affiliated1 = Affiliated::create(['name'=> 'fulano', 'cpf'=>'1234567890', 'sex'=>'Homem', 'email'=>'fulano@gmail.com', 'branch_id'=> $branch1->id, 'siape'=>'11', 'rg'=>'1234567', 'maritalStat'=>'Casado', 'educationDegree'=>'Pós-Graduado', 'workDegree'=>'1', 'contribution'=> 4500]);
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
        $telephone = new Telephone();
        $telephone->ddd='81';
        $telephone->number='34323432';
        $telephone->ddi='55';
        $affiliated1->telephones()->save($telephone);
        $telephone = new Telephone();
        $telephone->ddd='81';
        $telephone->number='34323333';
        $telephone->ddi='55';
        $affiliated1->telephones()->save($telephone);
        

        $affiliated2 = Affiliated::create(['name'=> 'ciclano', 'cpf'=>'1234567899', 'sex'=>'Homem', 'email'=>'ciclano@gmail.com', 'branch_id'=> $branch1->id, 'siape'=>'22', 'rg'=>'7654321', 'maritalStat'=>'Casado', 'educationDegree'=>'Mestrando', 'workDegree'=>'2', 'contribution'=> 6750]);
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
        $telephone = new Telephone();
        $telephone->ddd='81';
        $telephone->number='30303030';
        $telephone->ddi='55';
        $affiliated2->telephones()->save($telephone);
        $telephone = new Telephone();
        $telephone->ddd='81';
        $telephone->number='34324040';
        $telephone->ddi='55';
        $affiliated2->telephones()->save($telephone);

        $affiliated3 = Affiliated::create(['name'=> 'beltrano', 'cpf'=>'1234567888', 'sex'=>'Homem', 'email'=>'beltrano@gmail.com', 'branch_id'=> $branch1->id, 'siape'=>'35', 'rg'=>'1234765', 'maritalStat'=>'Solteiro', 'educationDegree'=>'Bacharelando', 'workDegree'=>'1', 'contribution'=> 3225]);
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
        $telephone = new Telephone();
        $telephone->ddd='80';
        $telephone->number='33332233';
        $telephone->ddi='55';
        $affiliated3->telephones()->save($telephone);

        $affiliated4 = Affiliated::create(['name'=> 'frusteca', 'cpf'=>'1234567889', 'sex'=>'Mulher', 'email'=>'frusteca@gmail.com', 'branch_id'=> $branch2->id, 'siape'=>'47', 'rg'=>'4321567', 'maritalStat'=>'Casado', 'educationDegree'=>'Doutorando', 'workDegree'=>'3', 'contribution'=> 9999]);
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
        $telephone = new Telephone();
        $telephone->ddd='80';
        $telephone->number='55552222';
        $telephone->ddi='55';
        $affiliated4->telephones()->save($telephone);

        $affiliated5 = Affiliated::create(['name'=> 'astolfo', 'cpf'=>'1234567222', 'sex'=>'Homem', 'email'=>'astolfo@gmail.com', 'branch_id'=> $branch2->id, 'siape'=>'93', 'rg'=>'1233321', 'maritalStat'=>'Solteiro', 'educationDegree'=>'Pós-Graduado', 'workDegree'=>'2', 'contribution'=> 4500]);
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
        $telephone = new Telephone();
        $telephone->ddd='61';
        $telephone->number='12344321';
        $telephone->ddi='55';
        $affiliated5->telephones()->save($telephone);
        
    }
}
