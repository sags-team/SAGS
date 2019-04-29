<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\Address;
use App\Telephone;

class BranchController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.super');
    }

    public function create()
    {
        return view('super.branch.create');
    }

    public function store(Request $request)
    {

        $request->merge(['minContribution' => preg_replace('/\D/', '', $request->input('minContribution'))]);
        $request->validate([
            'name'=>'required|min:5|string',
            'cnpj'=>'required|digits:14',
            'code'=>'required',
            'minContribution'=>'required',
            'cep'=>'required|digits:8|numeric',
            'country'=>'required|string',
            'state'=>'required|string',
            'city'=>'required|string',
            'neighborhood'=>'required|string',
            'number'=>'required|numeric',
            'complement'=>'required|string',
            'street'=>'required|string',
            'ddd1'=>'required|digits:3',
            'ddd2'=>'required|digits:3',
            'telephone1'=>'required|numeric',
            'telephone2'=>'required|numeric'
        ]);
        
        $branchNew = new Branch($request->input());
        $branchNew->active = true;

        $branch = Branch::where('cnpj', $branchNew->cnpj)->first();
        if($branch != null){
            return "Already Exists";
        }else{
            $address = new Address($request->input());
            $telephone1 = new Telephone();
            $telephone1->ddd = $request->input('ddd1');
            $telephone1->number = $request->input('telephone1');
            $telephone2 = new Telephone();
            $telephone2->ddd = $request->input('ddd2');
            $telephone2->number = $request->input('telephone2');

            $branchNew->save();
            $branchNew->address()->save($address);
            $branchNew->telephones()->save($telephone1);
            $branchNew->telephones()->save($telephone2);
            return "Salvo com Sucesso";
        }

    }
}
