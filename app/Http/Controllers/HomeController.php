<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

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
        $user = Auth::user();
        if ($user == null) {
            return view('auth.login');
        } else {
            if ($user->hasRole('Administrador sindicato')) {
                return redirect()->route('admin.home');

            } else if ($user->hasRole('Super')) {
                return redirect()->route('super.home');
            }
        }

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
