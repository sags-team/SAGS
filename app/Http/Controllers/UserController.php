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

        return redirect()->route('user.list');
    }

    public function list()
    {
        $users = User::paginate(5);
        return view('super.user.list', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        if($user == null){
            return redirect()->route('super.denied');
        }else{
            return view('super.user.show', compact('user'));
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        $branches = Branch::get(['id', 'name']);
        if($user == null){
            return redirect()->route('super.denied');
        }else{
            return view('super.user.edit', compact('user'))->with(compact('branches'));
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required|min:5|string|max:189',
            'email'=>'required|string|email|max:189',
            'password'=>'required|string|min:8|confirmed'
        ]);

        $user = User::find($request->input('user_id'));
        if($user == null){
            return redirect()->route('super.denied');
        }else{
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->branch_id = $request->input('branch_id');
            $user->save();
            return redirect()->route('user.show', compact('user'));
        }
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->input('id'));
        if($user == null){
            return redirect()->route('super.denied');
        }else{
            $user->roles()->detach();
            $user->delete();
            return redirect()->route('user.list');
        }
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $users = User::where('name', 'LIKE', '%'.$search.'%')
                        ->orWhere('email', 'LIKE', '%'.$search.'%')->paginate(5);
        return view('super.user.list')->with('users', $users);
    }
}
