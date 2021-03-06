<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\Address;
use App\Telephone;
use Storage;

class BranchController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.super');
    }

    public function alreadyExists(){
        return view('super.alreadyExists');
    }

    public function create()
    {
        $ddiCodes = Storage::disk('local')->get('country-calling-codes.min.json');
        $ddiCodes = json_decode($ddiCodes, true);

        return view('super.branch.create')->with(compact('ddiCodes'));;
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
            'ddd1'=>'required|digits:2',
            'ddd2'=>'required|digits:2',
            'telephone1'=>'required|numeric',
            'telephone2'=>'required|numeric'
        ]);
        
        $branchNew = new Branch($request->input());
        $branchNew->active = true;

        $branch = Branch::where('cnpj', $branchNew->cnpj)->first();
        if($branch != null){
            return redirect()->route('branch.alreadyExists');
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
            return redirect()->route('branch.show', ['id'=>$branchNew->id]);
        }

    }

    public function show($id)
    {
        $branch = Branch::find($id);
        if($branch == null){
            return redirect()->route('super.denied');
        }else{
            return view('super.branch.show', compact('branch'));
        }
    }

    public function edit($id)
    {

        $branch = Branch::find($id);
        if($branch == null){
            return redirect()->route('super.denied');
        }else{
            $ddiCodes = Storage::disk('local')->get('country-calling-codes.min.json');
            $ddiCodes = json_decode($ddiCodes, true);
            return view('super.branch.edit', compact('branch'))->with(compact('ddiCodes'));
        }
    }

    public function update(Request $request)
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
            'ddd1'=>'required|digits:2',
            'ddd2'=>'required|digits:2',
            'telephone1'=>'required|numeric',
            'telephone2'=>'required|numeric'
        ]);

        $branch = Branch::find($request->input('branch_id'));
        if($branch == null){
            return redirect()->route('super.denied');
        }else{
            $branch->name = $request->input('name');
            $branch->code = $request->input('code');
            $branch->cnpj = $request->input('cnpj');
            $branch->minContribution = $request->input('minContribution');

            $address = $branch->address;
            $address->cep = $request->input('cep');
            $address->country = $request->input('country');
            $address->state = $request->input('state');
            $address->city = $request->input('city');
            $address->neighborhood = $request->input('neighborhood');
            $address->number = $request->input('number');
            $address->complement = $request->input('complement');
            $address->save();

            if($branch->telephones[0]){
                $branch->telephones[0]->ddd = $request->input('ddd1');
                $branch->telephones[0]->number = $request->input('telephone1');
                $branch->telephones[0]->save();
            }
            if(isset($branch->telephones[1])){
                $branch->telephones[1]->ddd = $request->input('ddd2');
                $branch->telephones[1]->number = $request->input('telephone2');
                $branch->telephones[1]->save();
            }else{
                $telephone = new Telephone();
                $telephone->ddd = $request->input('ddd2');
                $telephone->number = $request->input('telephone2');
                $branch->telephones()->save($telephone);
            }

            $branch->save();
            return redirect()->route('branch.show', compact('branch'));

        }
    }

    public function list()
    {
        $branches = Branch::paginate(5);
        return view('super.branch.list', compact('branches'));
    }

    public function destroy(Request $request)
    {
        $branch = Branch::find($request->input('id'));
        $affiliates = $branch->affiliates;
        foreach($affiliates as $affiliated){
            $affiliated->address()->delete();
            $affiliated->telephones()->delete();
            $affiliated->delete();
        }
        $branch->address()->delete();
        $branch->telephones()->delete();
        $branch->delete();
        return redirect()->route('branch.list');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $branches = Branch::where('name', 'LIKE', '%'.$search.'%')
                        ->orWhere('code', 'LIKE', '%'.$search.'%')
                        ->orWhere('cnpj', 'LIKE', '%'.$search.'%')->paginate(5);
        return view('super.branch.list')->with('branches', $branches);
    }
}
