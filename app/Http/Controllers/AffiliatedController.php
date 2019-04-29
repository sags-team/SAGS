<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Affiliated;
use App\Address;
use App\Telephone;
use Auth;

class AffiliatedController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin');
    }

    public function store(Request $request)
    {
        
        $request->merge(['contribution' => preg_replace('/\D/', '', $request->input('contribution'))]);
        $request->validate([
            'name'=>'required|min:5|string',
            'cpf'=>'required|digits:11',
            'email'=>'email',
            'siape'=>'required|digits:7|numeric',
            'rg'=>'required|min:6|max:14',
            'contribution'=>'required',
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

        $affiliatedNew = new Affiliated($request->input());
        $affiliatedNew->contribution = (int)$request->input('contribution');
        $affiliatedNew->branch_id = Auth::user()->branch->id;

        $affiliated = Affiliated::
            where('branch_id', $affiliatedNew->branch_id)->
            where('cpf', $affiliatedNew->cpf)->first();
                         
        if($affiliated != null){
            return redirect()->route('admin.exist');
        }else{
            $address = new Address($request->input());
            $telephone1 = new Telephone();
            $telephone1->ddd = $request->input('ddd1');
            $telephone1->number = $request->input('telephone1');
            $telephone2 = new Telephone();
            $telephone2->ddd = $request->input('ddd2');
            $telephone2->number = $request->input('telephone2');

            $affiliatedNew->save();
            $affiliatedNew->address()->save($address);
            $affiliatedNew->telephones()->save($telephone1);
            $affiliatedNew->telephones()->save($telephone2);
            return redirect()->route('affiliated.show', ['id'=>$affiliatedNew->id]);
        }
    }

    public function criar()
    {
        $affiliated = new Affiliated();
        return view('admin.affiliated.create', compact('affiliated'));
    }

    public function edit($id)
    {
        $affiliated = Affiliated::find($id);
        return view('admin.affiliated.edit', compact('affiliated'));
    }

    public function update(Request $request)
    {
        $request->merge(['contribution' => preg_replace('/\D/', '', $request->input('contribution'))]);
        $request->validate([
            'name'=>'required|min:5|string',
            'cpf'=>'required|digits:11',
            'email'=>'email',
            'siape'=>'required|digits:7|numeric',
            'rg'=>'required|min:6|max:14',
            'contribution'=>'required',
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

        $admin = Auth::user();
        $affiliated = Affiliated::find($request->input('affiliated_id'));
        if($affiliated){
            if($affiliated->branch->id == $admin->branch->id){
                $affiliated->name = $request->input('name');
                $affiliated->cpf = $request->input('cpf');
                $affiliated->email = $request->input('email');
                $affiliated->siape = $request->input('siape');
                $affiliated->rg = $request->input('rg');
                $affiliated->contribution = $request->input('contribution');
                
                $address = $affiliated->address;
                $address->cep = $request->input('cep');
                $address->country = $request->input('country');
                $address->state = $request->input('state');
                $address->city = $request->input('city');
                $address->neighborhood = $request->input('neighborhood');
                $address->number = $request->input('number');
                $address->complement = $request->input('complement');

                $address->save();

                if($affiliated->telephones[0]){
                    $affiliated->telephones[0]->ddd = $request->input('ddd1');
                    $affiliated->telephones[0]->number = $request->input('telephone1');
                    $affiliated->telephones[0]->save();
                }
                if(isset($affiliated->telephones[1])){
                    $affiliated->telephones[1]->ddd = $request->input('ddd2');
                    $affiliated->telephones[1]->number = $request->input('telephone2');
                    $affiliated->telephones[1]->save();
                }else{
                    $telephone = new Telephone();
                    $telephone->ddd = $request->input('ddd2');
                    $telephone->number = $request->input('telephone2');
                    $affiliated->telephones()->save($telephone);
                }
            }else{
                return redirect()->route('admin.denied');
            }
            $affiliated->save();
            //return view('admin.affiliated.show', compact('affiliated'));
            return redirect()->route('affiliated.show', compact('affiliated'));

        }
        
        return redirect()->route('admin.denied');
        
    }

    public function show($id)
    {
        $affiliated = Affiliated::find($id);
        $admin = Auth::user();
        if($affiliated == null){
            return view('admin.denied');
        }
        if($affiliated->branch->id != $admin->branch->id){
            return view('admin.denied');
        }
        return view('admin.affiliated.show', compact('affiliated'));
    }

    public function destroy(Request $request){
        $branch = Auth::user()->branch;
        $affiliated = Affiliated::findOrFail($request->input('id'));
        if($branch->id == $affiliated->branch->id){
            $telephones = $affiliated->telephones;
            foreach($telephones as $telephone){
                $telephone->delete();
            }
            $address = $affiliated->address;
            $address->delete();
            $affiliated->delete();
            return redirect('/admin/affiliated/list')->with('success','Filiado deletado');
        }else{
            return redirect('/admin/affiliated/list')->with('success','Problema ao deletar Filiado');
        }
        

    }
}
