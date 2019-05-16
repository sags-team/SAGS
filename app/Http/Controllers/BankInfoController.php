<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BankInfoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin');
    }

    public function list()
    {
        return view('admin.bankInfo.list');
    }
}
