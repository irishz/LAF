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


        if (Auth::user()->user_id == '0005401111' | Auth::user()->user_id == '0226003131') {
            $observes = DB::table('users')
            ->join('form', 'users.user_id', '=', 'form.user_id')
            ->select('users.*','form.*')->get();

            return view('admin/dashboard-obs',compact('observes'));
        }else {
            switch (Auth::user()->user_id) {
                //P'PUY acc+itd
                case '0025401131':
                    $results = DB::table('users')
                    ->join('form', 'users.user_id', '=', 'form.user_id')
                    ->select('users.*','form.*')
                    // depend on department
                    ->whereIn('users.department',array(''))
                    ->get();
    
                    return view('admin/extra1',compact('results'));
                    break;
                //P'pikul opd1+pcu
                case '0855704461':
                    $results = DB::table('users')
                    ->join('form', 'users.user_id', '=', 'form.user_id')
                    ->select('users.*','form.*')
                    // depend on department
                    ->whereIn('users.department',array(''))
                    ->get();
                
                    return view('admin/extra2',compact('results'));
                    break;
                //p'pawinee IPD2-5,icu,lnd,ord
                case '1175404561':
                    $results = DB::table('users')
                    ->join('form', 'users.user_id', '=', 'form.user_id')
                    ->select('users.*','form.*')
                    // depend on department
                    ->whereIn('users.department',array('ศูนย์คอมพิวเตอร์','แผนกบัญชี'))
                    ->get();
    
                    return view('admin/extra3',compact('results'));
                    break;
                //p'wiitatya trd+eng+scu
                case '0755804151':
                    $results = DB::table('users')
                    ->join('form', 'users.user_id', '=', 'form.user_id')
                    ->select('users.*','form.*')
                    // depend on department
                    ->whereIn('users.department',array(''))
                    ->get();
    
                    return view('admin/extra4',compact('results'));
                    break;
                //else
                default:
                    $results = DB::table('users')
                    ->join('form', 'users.user_id', '=', 'form.user_id')
                    ->select('users.*','form.*')
                    ->where('users.department','=',Auth::user()->department)
                    ->get();
    
                    return view('admin/dashboard',compact('results'));
            }
        }
    }

}