<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Affiliated;
use App\BankAccount;
use Auth;

class BankAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin');
    }

    public function create($id)
    {
        return view('admin.bankAccount.create')->with(compact('id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'agency'=>'required|min:4|string',
            'operationCode'=>'required|min:2|string',
            'accountNumber'=>'required|min:5|string',
            'vdNumber'=>'required|min:1|string'
        ]);

        $affiliated = Affiliated::find($request->input('affiliated_id'));
        if ($affiliated) {// Caso o usuario nao seja nulo
            
            $user = Auth::user();
            if ($user->branch->id == $affiliated->branch->id) { //Para criar, usuario deve ser do mesmo branch do filiado
                
                $bankAccount = $affiliated->bankAccount;
                if(!$bankAccount){ // Só pode ser criado um bankAccount se o affiliado nao tiver nenhum outro associado

                    $newBank = new BankAccount($request->input());
                    $newBank->active = false;
                    $newBank->name = $this->displayToName($newBank->displayName);
                    $affiliated->bankAccount()->save($newBank);
                    return redirect()->route('affiliated.show', $affiliated->id);

                } else {
                    return view('admin.denied');
                }
            } else {
                return view('admin.denied');
            }


        } else {
            return view('admin.denied');
        }
        
    }

    public function edit($id)
    {
        return "editando";
    }

    public function displayToName($displayName)
    {
        if ($displayName == 'Caixa Economica Federal') {
            return 'Caixa';
        } else if ($displayName == 'Banco do Brasil') {
            return 'Banco Brasil';
        } else {
            return 'NO';
        }
    }
}
