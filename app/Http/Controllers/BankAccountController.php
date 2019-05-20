<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin');
    }

    public function create()
    {
        return view('admin.bankAccount.create');
    }

    public function edit($id)
    {
        return "editando";
    }
}
