<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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

    public function branchInformation(){
        $branch = Auth::user()->branch;
        return view('admin.information')->with('branch', $branch);
    }

    public function createAffiliated(){
        return view('admin.affiliated.create');
    }

    public function showAffiliates(){
        $branch = Auth::user()->branch;
        return view('admin.showAffiliated')->with('affiliates', $branch->affiliates);
    }

    public function denied(){
        return view('admin.denied');
    }
}
