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
        $time = Carbon::now()->toDateTimeString();

        $mng_email = User::where('department',$user_dept)->where('type',1)->get();

        if($mng_email->isEmpty()){
            return ('แผนกนี้ยังไม่มีหัวหน้าหน่วยงานในระบบ');
        }else{
            $upd_form->save();
            Mail::to($mng_email[0]['email'])->send(new SendApprove($users,$upd_form,$time));

            return redirect('/result')->with('alert','อนุมัติ ใบลาเลขที่'.$upd_form->id);
        }
    }

    public function SendNotApprove($form_id,$user_dept){
        $upd_form = Form::find($form_id);
        $users = User::find($upd_form->user_id);

        $upd_form->commented = 'No';
        $time = Carbon::now()->toDateTimeString();

        $mng_email = User::where('department',$user_dept)->where('type',1)->get();

        if($mng_email->isEmpty()){
            return ('แผนกนี้ยังไม่มีหัวหน้าหน่วยงานในระบบ');
        }else{
            $upd_form->save();
            Mail::to($mng_email[0]['email'])->send(new SendNotApprove($users,$upd_form,$time));

            return redirect('/result')->with('alert','ไม่อนุมัติ ใบลาเลขที่'.$upd_form->id);
        }
    }

    public function SendMngApprove($form_id){
        $form = Form::find($form_id);
        $users = User::find($form->user_id);

        $form->commented = 'Yes';
        
        $form->save();

        return redirect('/form'.'/'.$form_id.'/edit');
    }

    public function SendMngNotApprove($form_id){
        $form = Form::find($form_id);
        $users = User::find($form->user_id);

        $form->commented = 'No';
        
        $form->save();

        return redirect('/form'.'/'.$form_id.'/edit');
    }
    
}
