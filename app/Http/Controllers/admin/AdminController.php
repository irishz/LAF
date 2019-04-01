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

        if (Auth::user()->user_id == '1111' | Auth::user()->user_id == '2222') {
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

        switch ($results->user_id) {
            //P'PUY acc+itd
            case '111111':
                $results = DB::table('users')
                ->join('form', 'users.user_id', '=', 'form.user_id')
                ->select('users.*','form.*')
                // depend on department
                ->where('users.department','=',Auth::user()->department)
                ->get();

                return view('admin/extra1',compact('results'));
                break;
            //P'pikul opd1+pcu
            case '222222':
                $results = DB::table('users')
                ->join('form', 'users.user_id', '=', 'form.user_id')
                ->select('users.*','form.*')
                // depend on department
                ->where('users.department','=',Auth::user()->department)
                ->get();
            
                return view('admin/extra2',compact('results'));
                break;
            //p'pawinee IPD2-5,icu,lnd,ord
            case '333333':
                $results = DB::table('users')
                ->join('form', 'users.user_id', '=', 'form.user_id')
                ->select('users.*','form.*')
                // depend on department
                ->where('users.department','=',Auth::user()->department)
                ->get();

                return view('admin/extra3',compact('results'));
                break;
            //p'wiitatya trd+eng+scu
            case '444444':
                $results = DB::table('users')
                ->join('form', 'users.user_id', '=', 'form.user_id')
                ->select('users.*','form.*')
                // depend on department
                ->where('users.department','=',Auth::user()->department)
                ->get();

                return view('admin/extra4',compact('results'));
                break;
        }
    }

}