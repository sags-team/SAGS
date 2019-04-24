<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Affiliated;
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
            'name'=>'required|min:5',
            'cpf'=>'required|min:11|max:11',
            'email'=>'email',
            'siape'=>'required|min:7|max:7',
            'rg'=>'required|min:6|max:14',
            'contribution'=>'required'
            //'contribution'=>'required|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        $affiliated = new Affiliated();
        $affiliated->name = $request->input('name');
        $affiliated->cpf = $request->input('cpf');
        $affiliated->email = $request->input('email');
        $affiliated->siape = $request->input('siape');
        $affiliated->rg = $request->input('rg');
        $affiliated->contribution = (int)$request->input('contribution');
        $affiliated->sex = $request->input('sex');
        $affiliated->maritalStat = $request->input('maritalStat');
        $affiliated->educationDegree = $request->input('educationDegree');
        $affiliated->workDegree = $request->input('workDegree');
        $affiliated->branch_id = Auth::user()->branch->id;
        $affiliated->save();


        return "you did it !";
    }

    public function criar()
    {
        $affiliated = new Affiliated();
        return view('admin.affiliate.create', compact('affiliated'));
    }

    public function editar($id)
    {
        $affiliated = Affiliated::findOrFail($id);
        $affiliated->maritalStat = "Casado";
        return view('admin.affiliated.edit', compact('affiliated'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->input();
        dd($input);
    }

    public function show($id){
        
        $affiliated = Affiliated::findOrFail($id);
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
