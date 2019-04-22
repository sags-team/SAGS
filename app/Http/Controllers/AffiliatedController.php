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
        $request->validate([
            'name'=>'required|min:5',
            'cpf'=>'required|min:11|max:11',
            'email'=>'email',
            'siape'=>'required|min:7|max:7',
            'rg'=>'required|min:6|max:14',
            'contribution'=>'required|regex:/^\d+(\,\d{1,2})?$/',
        ]);

        $affiliated = new Affiliated();
        $affiliated->name = $request->input('name');
        $affiliated->cpf = $request->input('cpf');
        $affiliated->email = $request->input('email');
        $affiliated->siape = $request->input('siape');
        $affiliated->rg = $request->input('rg');
        $affiliated->contribution = (int)(100*floatval($request->input('contribution')));
        $affiliated->sex = $request->input('sex');
        $affiliated->maritalStat = $request->input('maritalStat');
        $affiliated->educationDegree = $request->input('educationDegree');
        $affiliated->workDegree = $request->input('workDegree');
        $affiliated->branch_id = Auth::user()->branch->id;
        $affiliated->save();


        return "you did it !";
    }
}
