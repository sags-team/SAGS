<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Affiliated;
use Auth;

class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin');
    }

    public function admin(){
        return view('admin.home');
    }

    public function denied(){
        return view('admin.denied');
    }

    public function alreadyExist(){
        return view('admin.alreadyExists');
    }

    public function branchInformation(){
        $branch = Auth::user()->branch;
        return view('admin.information')->with('branch', $branch);
    }

    public function createAffiliated(){
        return view('admin.affiliated.create');
    }

    public function showAffiliates(){
        $branch = Auth::user()->branch;
        $affiliates = $branch->affiliates()->paginate(5);
        return view('admin.showAffiliated')->with('affiliates', $affiliates);
    }
    
    public function searchAffiliates(Request $request){
        $search = $request->input('search');
        $admin = Auth::user();
        $affiliates = Affiliated::where('branch_id', $admin->branch->id)
            ->where('cpf', 'LIKE', '%'.$search.'%')->orWhere('siape', 'LIKE', '%'.$search.'%')
            ->orWhere('name', 'LIKE', '%'.$search.'%')->paginate(5);
        return view('admin.showAffiliated')->with('affiliates', $affiliates);

    }
}
