<?php

namespace App\Http\Controllers;

use App\Form;
use App\User;
use Carbon\Carbon;
use App\Mail\SendApprove;
use App\Mail\SendMngApprove;
use App\Mail\SendNotApprove;
use Illuminate\Http\Request;
use App\Mail\SendMngNotApprove;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function SendApprove($form_id,$user_dept){
        $upd_form = Form::find($form_id);
        $users = User::find($upd_form->user_id);
        
        $upd_form->commented = 'Yes';
        $upd_form->save();
        
        $time = Carbon::now()->toDateTimeString();

        $mng_email = User::where('department',$user_dept)->where('type',1)->get();

        switch ($users->department){
            case 'ศูนย์คอมพิวเตอร์':
                Mail::to('nattaya_puy2522@hotmail.com')->send(new SendApprove($users,$upd_form,$time));
                return ยedirect('/result')->with('alert','อนุมัติ ใบลาเลขที่'.$upd_form->id);
                break;
            case 'แผนกผู้ป่วยนอก(ประกันสังคม)':
                Mail::to('pikula06@gmail.com')->send(new SendApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','อนุมัติ ใบลาเลขที่'.$upd_form->id);
                break;
            case 'แผนกผู้ป่วยนอก(ประกันสังคม)':
                Mail::to('pikula06@gmail.com')->send(new SendApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','อนุมัติ ใบลาเลขที่'.$upd_form->id);
                break;
            case 'หอผู้ป่วยในชั้น2':
                Mail::to('ssh.icu.m@gmail.com')->send(new SendApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','อนุมัติ ใบลาเลขที่'.$upd_form->id);
            case 'หอผู้ป่วยในชั้น3':
                Mail::to('ssh.icu.m@gmail.com')->send(new SendApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','อนุมัติ ใบลาเลขที่'.$upd_form->id);
            case 'หอผู้ป่วยในชั้น4':
                Mail::to('ssh.icu.m@gmail.com')->send(new SendApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','อนุมัติ ใบลาเลขที่'.$upd_form->id);
            case 'แผนกห้องคลอดและทารกแรกเกิด':
                Mail::to('ssh.icu.m@gmail.com')->send(new SendApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','อนุมัติ ใบลาเลขที่'.$upd_form->id);
                break;
            case 'แผนกห้องผ่าตัด':
                Mail::to('ssh.icu.m@gmail.com')->send(new SendApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','อนุมัติ ใบลาเลขที่'.$upd_form->id);
                break;
            case 'หอผู้ป่วยVIPชั้น5':
                Mail::to('ssh.icu.m@gmail.com')->send(new SendApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','อนุมัติ ใบลาเลขที่'.$upd_form->id);
                break;
            case 'แผนกซ่อมบำรุง':
                Mail::to('wittaya050619@gmail.com')->send(new SendApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','อนุมัติ ใบลาเลขที่'.$upd_form->id);
                break;
            case 'หน่วยรปภ':
                Mail::to('wittaya050619@gmail.com')->send(new SendApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','อนุมัติ ใบลาเลขที่'.$upd_form->id);
                break;
            case 'ฝ่ายขายและการตลาด':
                Mail::to('orrathai2012@hotmail.co.th')->send(new SendApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','อนุมัติ ใบลาเลขที่'.$upd_form->id);
                break;
            case 'แผนกทันตกรรม':
                Mail::to('sherry_nit_b2@hotmail.co.th')->send(new SendApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','อนุมัติ ใบลาเลขที่'.$upd_form->id);
                break;
            case 'แผนกเวชระเบียนและเวชสถิติ':
                Mail::to('atcharatoktak@gmail.com')->send(new SendApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','อนุมัติ ใบลาเลขที่'.$upd_form->id);
                break;
            default:
                if($mng_email->isEmpty()){
                    return ('แผนกนี้ยังไม่มีหัวหน้าหน่วยงานในระบบ');
                }
                else{
                    
                    Mail::to($mng_email[0]['email'])->send(new SendApprove($users,$upd_form,$time));
        
                    return redirect('/result')->with('alert','อนุมัติ ใบลาเลขที่'.$upd_form->id);
                }
        }
    }

    public function SendNotApprove($form_id,$user_dept){
        $upd_form = Form::find($form_id);
        $users = User::find($upd_form->user_id);
        
        $upd_form->commented = 'No';
        $upd_form->save();

        $time = Carbon::now()->toDateTimeString();

        $mng_email = User::where('department',$user_dept)->where('type',1)->get();
        
        switch ($users->department){
            case 'ศูนย์คอมพิวเตอร์':
                Mail::to('nattaya_puy2522@hotmail.com')->send(new SendNotApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','ไม่อนุมัติ ใบลาเลขที่'.$upd_form->id);
                break;
            case 'แผนกผู้ป่วยนอก(ประกันสังคม)':
                Mail::to('pikula06@gmail.com')->send(new SendNotApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','ไม่อนุมัติ ใบลาเลขที่'.$upd_form->id);
                break;
            case 'แผนกผู้ป่วยนอก(ประกันสังคม)':
                Mail::to('pikula06@gmail.com')->send(new SendNotApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','ไม่อนุมัติ ใบลาเลขที่'.$upd_form->id);
                break;
            case 'หอผู้ป่วยในชั้น2':
                Mail::to('ssh.icu.m@gmail.com')->send(new SendNotApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','ไม่อนุมัติ ใบลาเลขที่'.$upd_form->id);
            case 'หอผู้ป่วยในชั้น3':
                Mail::to('ssh.icu.m@gmail.com')->send(new SendNotApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','ไม่อนุมัติ ใบลาเลขที่'.$upd_form->id);
            case 'หอผู้ป่วยในชั้น4':
                Mail::to('ssh.icu.m@gmail.com')->send(new SendNotApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','ไม่อนุมัติ ใบลาเลขที่'.$upd_form->id);
            case 'แผนกห้องคลอดและทารกแรกเกิด':
                Mail::to('ssh.icu.m@gmail.com')->send(new SendNotApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','ไม่อนุมัติ ใบลาเลขที่'.$upd_form->id);
                break;
            case 'แผนกห้องผ่าตัด':
                Mail::to('ssh.icu.m@gmail.com')->send(new SendNotApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','ไม่อนุมัติ ใบลาเลขที่'.$upd_form->id);
                break;
            case 'หอผู้ป่วยVIPชั้น5':
                Mail::to('ssh.icu.m@gmail.com')->send(new SendNotApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','ไม่อนุมัติ ใบลาเลขที่'.$upd_form->id);
                break;
            case 'แผนกซ่อมบำรุง':
                Mail::to('wittaya050619@gmail.com')->send(new SendNotApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','ไม่อนุมัติ ใบลาเลขที่'.$upd_form->id);
                break;
            case 'หน่วยรปภ':
                Mail::to('wittaya050619@gmail.com')->send(new SendNotApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','ไม่อนุมัติ ใบลาเลขที่'.$upd_form->id);
                break;
            case 'ฝ่ายขายและการตลาด':
                Mail::to('orrathai2012@hotmail.co.th')->send(new SendNotApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','ไม่อนุมัติ ใบลาเลขที่'.$upd_form->id);
                break;
            case 'แผนกทันตกรรม':
                Mail::to('sherry_nit_b2@hotmail.co.th')->send(new SendNotApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','อนุมัติ ใบลาเลขที่'.$upd_form->id);
                break;
            case 'แผนกเวชระเบียนและเวชสถิติ':
                Mail::to('atcharatoktak@gmail.com')->send(new SendNotApprove($users,$upd_form,$time));
                return redirect('/result')->with('alert','อนุมัติ ใบลาเลขที่'.$upd_form->id);
                break;
            default:
                if($mng_email->isEmpty()){
                    return ('แผนกนี้ยังไม่มีหัวหน้าหน่วยงานในระบบ');
                }
                else{
                    
                    Mail::to($mng_email[0]['email'])->send(new SendNotApprove($users,$upd_form,$time));
        
                    return redirect('/result')->with('alert','ไม่อนุมัติ ใบลาเลขที่'.$upd_form->id);
                }
        }
    }

    public function SendMngApprove($form_id){
        $form = Form::find($form_id);
        $users = User::find($form->user_id);

        $form->commented = 'Yes';
        
        $form->save();

        return redirect('admin/form'.'/'.$form_id.'/edit');
    }

    public function SendMngNotApprove($form_id){
        $form = Form::find($form_id);
        $users = User::find($form->user_id);

        $form->commented = 'No';
        
        $form->save();

        return redirect('admin/form'.'/'.$form_id.'/edit');
    }
    
}
