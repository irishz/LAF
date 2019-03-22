<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        
        $manager_dept = Auth::user()->department;

        $results = DB::table('users')
            ->join('form', 'users.user_id', '=', 'form.user_id')
            ->select('users.*','form.*')
            ->where('users.department','=',Auth::user()->department)
            ->get();

        return view('admin/dashboard',compact('results'));
    }

}