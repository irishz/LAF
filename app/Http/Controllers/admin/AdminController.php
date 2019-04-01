<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index()
    {
        
        $manager_dept = Auth::user()->department;

        if (Auth::user()->user_id == '0000') {
            $observes = DB::table('users')
            ->join('form', 'users.user_id', '=', 'form.user_id')
            ->select('users.*','form.*')->get();

            return view('admin/dashboard-obs',compact('observes'));
        }else {
            $results = DB::table('users')
            ->join('form', 'users.user_id', '=', 'form.user_id')
            ->select('users.*','form.*')
            ->where('users.department','=',Auth::user()->department)
            ->get();

            return view('admin/dashboard',compact('results'));
        }
    }

}