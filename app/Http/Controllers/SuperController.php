<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.super');
    }

    public function home(){
        return view('super.home');
    }

    public function denied()
    {
        return view('super.denied');
    }
}
