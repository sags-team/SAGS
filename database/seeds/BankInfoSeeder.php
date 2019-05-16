<?php

use Illuminate\Database\Seeder;
use App\Branch;
use App\BankInfo;

class BankInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branch = Branch::find(1);

        $bankInfo = BankInfo::create(['name'=>'CAIXA', 'agreementCode'=>'ABC123',
                                      'branchName'=>'Federal Pernambuco ', 'bankCode'=>'104',
                                      'fileCounter'=> 0, 'branch_id'=>$branch->id]);
        
        $bankInfo = BankInfo::create(['name'=>'CAIXA-2', 'agreementCode'=>'CBA321',
                                      'branchName'=>'Federal Pernambuco ', 'bankCode'=>'104',
                                      'fileCounter'=> 0, 'branch_id'=>$branch->id]);
    }
}
