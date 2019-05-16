<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\User;
use App\BankInfo;
use Auth;

class BankInfoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin');
    }


    public function create()
    {
        return view('admin.bankInfo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'agreementCode'=>'required|min:6|string',
            'branchName'=>'required|max:20|string'
        ]);

        $newBankInfo = new BankInfo($request->input());
        $user = Auth::user();
        $bankInfos = $user->branch->bankInfos;
        foreach($bankInfos as $info){
            if($info->name == $newBankInfo->name){
                return redirect()->route('branch.bankInfo')->with('success','Informações deste banco ja cadastrada');
            }
        }
        $newBankInfo->fileCounter = 0;
        $newBankInfo->bankCode = $this->bankCode($newBankInfo->name);
        $newBankInfo->branch_id = $user->branch->id;
        $newBankInfo->save();

        $bankInfos = $user->branch->bankInfos;
        return redirect()->route('branch.bankInfo')->with(compact('bankInfos'));
    }

    public function list()
    {
        $user = Auth::user();
        $bankInfos = $user->branch->bankInfos;
        return view('admin.bankInfo.list')->with(compact('bankInfos'));
    }


    public function bankCode($bankName)
    {
        if($bankName == "Caixa"){
            return '104';
        }else if($bankName == "Banco Brasil"){
            return '001';
        }else{
            return '000';
        }
    }
}
