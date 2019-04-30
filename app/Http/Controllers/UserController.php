<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Branch;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.super');
    }

    public function create()
    {
        $branches = Branch::get(['id', 'name']);
        return view('super.user.create', compact('branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:5|string|max:189',
            'email'=>'required|string|email|max:189|unique:users',
            'password'=>'required|string|min:8|confirmed'
        ]);

        $adminRole = Role::where('name', 'Administrador sindicato')->first();
        $userNew = new User($request->input());
        $userNew->password = Hash::make($request->input('password'));
        $userNew->branch_id = $request->input('branch_id');
        $userNew->save();
        $userNew->roles()->attach($adminRole);

        return "did it!";
    }
}
