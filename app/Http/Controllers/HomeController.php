<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function teste(){
        return view('layouts.layout');
    }

    public function information(){
        return view('admin.information');
    }

    public function version(){
        $name = "SAGS - Sistema de Administração e Gerenciamento de Sindicatos";
        $version = "0.1";
        return response()->json(compact('name', 'version'));
    }
}
