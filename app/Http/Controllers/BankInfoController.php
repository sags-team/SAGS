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

    public function edit($id)
    {
        $bankInfo = BankInfo::find($id);
        $user = Auth::user();
        if($bankInfo == null){
            return redirect()->route('admin.denied');
        }else if($bankInfo->branch->id != $user->branch->id){
            return redirect()->route('admin.denied');
        }

        return view('admin.bankInfo.edit')->with(compact('bankInfo'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'agreementCode'=>'required|min:6|string',
            'branchName'=>'required|max:20|string'
        ]);
        $info = BankInfo::find($request->input('bankInfo_id'));
        $user = Auth::user();
        if($info){
            if($info->branch->id == $user->branch->id){
                $info->agreementCode = $request->input('agreementCode');
                $info->branchName = $request->input('branchName');
                if($info->name != $request->input('name')){
                    $info->fileCounter = 0;
                    $info->name = $request->input('name');
                    $info->bankCode = $this->bankCode($request->input('name'));
                }

                $bankInfos = $user->branch->bankInfos;
                foreach($bankInfos as $infos){
                    if($infos->id != $info->id){
                        if($infos->name == $info->name){
                            return redirect()->route('branch.bankInfo')->with('success','Informações deste banco ja cadastrada');
                        }
                    }
                }
                $info->save();
                $bankInfos = $user->branch->bankInfos;
                return redirect()->route('branch.bankInfo')->with(compact('bankInfos'));
            }else{
                return redirect()->route('admin.denied');
            }
        }else{
            return redirect()->route('admin.denied');
        }
    }

    public function destroy(Request $request)
    {
        $user = Auth::user();
        $info = BankInfo::find($request->input('id'));
        if($info){
            if($user->branch->id != $info->branch->id){
                return redirect()->route('admin.denied');
            }

            $info->delete();
            $bankInfos = $user->branch->bankInfos;
            return redirect()->route('branch.bankInfo')->with(compact('bankInfos'));
        }else{
            return redirect()->route('admin.denied');
        }
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
