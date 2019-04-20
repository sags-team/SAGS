<?php

use Illuminate\Database\Seeder;
use App\Branch;
use App\Address;

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
        Branch::create(['name' => 'Universidade Federal de Pernambuco', 'code'=> 'UFPE', 'active' => true, 'cnpj' => '24.134.488/0001-08', 'minContribution' => 1000]);
        $address1 = new Address;
        $address1->cep = 50670901;
        $address1->country = 'Brasil';
        $address1->state = 'Pernambuco';
        $address1->city = 'Recife';
        $address1->neighborhood = 'Cidade Universitaria';
        $address1->number = 1235;
        $address1->complement = '';
        $address1->street = 'Av. prof. Moraes Rego';
        Branch::find(1)->address()->save($address1);

        Branch::create(['name' => 'Universidade Federal Rural de Pernambuco', 'code'=> 'UFRPE', 'active' => true, 'cnpj' => '24.416.174/0001-06', 'minContribution' => 2000]);
        $address1 = new Address;
        $address1->cep = 52171900;
        $address1->country = 'Brasil';
        $address1->state = 'Pernambuco';
        $address1->city = 'Recife';
        $address1->neighborhood = 'Dois Irmãos';
        $address1->number = 0;
        $address1->complement = 'Em frente ao zoologico';
        $address1->street = 'Rua Dom, R. Manuel de Medeiros';
        Branch::find(2)->address()->save($address1);

        Branch::create(['name' => 'Universidade Federal do Rio Grande do Norte', 'code'=> 'UFRN', 'active' => true, 'cnpj' => '24.365.710/0001-83', 'minContribution' => 1250]);
        $address1 = new Address;
        $address1->cep = 59078970;
        $address1->country = 'Brasil';
        $address1->state = 'Rio Grande do Norte';
        $address1->city = 'Natal';
        $address1->neighborhood = 'Lagoa Nova';
        $address1->number = 1524;
        $address1->complement = '';
        $address1->street = 'Rua Random';
        Branch::find(3)->address()->save($address1);
    }
}
