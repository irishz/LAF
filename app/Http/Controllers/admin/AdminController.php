<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $manager_dept = Auth::user()->department;

        // for observer view (CEO,HR,admin)
        if (Auth::user()->user_id == '0005401111' | Auth::user()->user_id == '2222' | Auth::user()->user_id == '1111') {
                $observes = DB::table('users')
                ->join('form', 'users.user_id', '=', 'form.user_id')
                ->select('users.*','form.*')
                ->orderBy('form.created_at','desc')
                ->paginate(10);

            return view('admin/dashboard-obs',compact('observes'));
        }else {
            switch (Auth::user()->user_id) {
                //P'PUY acc+itd
                case '0025401131':
                    $results = DB::table('users')
                    ->join('form', 'users.user_id', '=', 'form.user_id')
                    ->select('users.*','form.*')
                    // depend on department
                    ->whereIn('users.department',array('แผนกบัญชี','ศูนย์คอมพิวเตอร์'))
                    ->orderBy('form.created_at','desc')
                    ->paginate(10);
    
                    return view('admin/extra1',compact('results'));
                    break;
                //P'pikul opd1+pcu
                case '0855704461':
                    $results = DB::table('users')
                    ->join('form', 'users.user_id', '=', 'form.user_id')
                    ->select('users.*','form.*')
                    // depend on department
                    ->whereIn('users.department',array('แผนกผู้ป่วยนอก(ประกันสังคม)','แผนกบริการปฐมภูมิ'))
                    ->orderBy('form.created_at','desc')
                    ->paginate(10);
                
                    return view('admin/extra2',compact('results'));
                    break;
                //p'pawinee IPD2-5+icu+lnd+ord
                case '1175404561':
                    $results = DB::table('users')
                    ->join('form', 'users.user_id', '=', 'form.user_id')
                    ->select('users.*','form.*')
                    // depend on department
                    ->whereIn('users.department',array('หอผู้ป่วยในชั้น2','หอผู้ป่วยในชั้น3',
                    'หอผู้ป่วยในชั้น4','หอผู้ป่วยVIPชั้น5','แผนกห้องคลอดและทารกแรกเกิด'))
                    ->orderBy('form.created_at','desc')
                    ->paginate(10);
    
                    return view('admin/extra3',compact('results'));
                    break;
                //p'wiitatya trd+eng+scu
                case '0755804151':
                    $results = DB::table('users')
                    ->join('form', 'users.user_id', '=', 'form.user_id')
                    ->select('users.*','form.*')
                    // depend on department
                    ->whereIn('users.department',array('แผนกรับส่งผู้ป่วย','หน่วยรปภ','แผนกซ่อมบำรุง'))
                    ->orderBy('form.created_at','desc')
                    ->paginate(10);
    
                    return view('admin/extra4',compact('results'));
                    break;
                //p'aom(acc)->sam
                case '0085402141':
                    $results = DB::table('users')
                    ->join('form', 'users.user_id', '=', 'form.user_id')
                    ->select('users.*','form.*')
                    // depend on department
                    ->whereIn('users.department',array('ฝ่ายขายและการตลาด'))
                    ->orderBy('form.created_at','desc')
                    ->paginate(10);
    
                    return view('admin/extra5',compact('results'));
                    break;
                //p'tak mrd
                case '3196110381':
                    $results = DB::table('users')
                    ->join('form', 'users.user_id', '=', 'form.user_id')
                    ->select('users.*','form.*')
                    // depend on department
                    ->whereIn('users.department',array('แผนกเวชระเบียนและเวชสถิติ'))
                    ->orderBy('form.created_at','desc')
                    ->paginate(10);
    
                    return view('admin/extra5',compact('results'));
                    break;
                //p'tung(acc)->sam
                case '0095402181':
                    $results = DB::table('users')
                    ->join('form', 'users.user_id', '=', 'form.user_id')
                    ->select('users.*','form.*')
                    // depend on departmentย
                    ->whereIn('users.department',array('แผนกจัดซื้อ-พัสดุ'))
                    ->orderBy('form.created_at','desc')
                    ->paginate(10);
    
                    return view('admin/extra5',compact('results'));
                    break;
                //p'tung(acc)->sam
                case '0095402181':
                    $results = DB::table('users')
                    ->join('form', 'users.user_id', '=', 'form.user_id')
                    ->select('users.*','form.*')
                    // depend on departmentย
                    ->whereIn('users.department',array('แผนกจัดซื้อ-พัสดุ'))
                    ->orderBy('form.created_at','desc')
                    ->paginate(10);
    
                    return view('admin/extra5',compact('results'));
                    break;
                //p'nok(are)->icu,or
                case '0276004151':
                    $results = DB::table('users')
                    ->join('form', 'users.user_id', '=', 'form.user_id')
                    ->select('users.*','form.*')
                    // depend on departmentย
                    ->whereIn('users.department',array('หอผู้ป่วยหนัก','แผนกห้องผ่าตัด'))
                    ->orderBy('form.created_at','desc')
                    ->paginate(10);
    
                    return view('admin/extra5',compact('results'));
                    break;
                //else
                default:
                    $results = DB::table('users')
                    ->join('form', 'users.user_id', '=', 'form.user_id')
                    ->select('users.*','form.*')
                    ->where('users.department','=',Auth::user()->department)
                    ->orderBy('form.created_at','desc')
                    ->paginate(10);
    
                    return view('admin/dashboard',compact('results'));
            }
        }
    }

}