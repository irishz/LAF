<?php

namespace App\Http\Controllers;

use App\Form;
use App\User;
use App\Mail\SendApprove;
use App\Mail\SendNotApprove;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function SendApprove($form_id,$user_dept){
        $upd_form = Form::find($form_id);
        $users = User::find($upd_form->user_id);
        
        $upd_form->commented = 'Yes';
        $upd_form->save();
        
        $mng_email = User::where('department',$user_dept)->where('type',1)->get();
        
        if(!$mng_email->isEmpty()){
            return ('แผนกนี้ไม่มีหัวหน้าหน่วยงานในระบบ');
        }else{
            return Mail::to($mng_email[0]['email'])->send(new SendApprove($users,$upd_form));
        }
    }

    public function SendNotApprove($form_id,$user_dept){
        $upd_form = Form::find($form_id);
        $users = User::find($upd_form->user_id);

        $upd_form->commented = 'No';
        $upd_form->save();
        
        $mng_email = User::where('department',$user_dept)->where('type',1)->get();
        
        if(!$mng_email->isEmpty()){
            return ('แผนกนี้ไม่มีหัวหน้าหน่วยงานในระบบ');
        }else{
            return Mail::to($mng_email[0]['email'])->send(new SendNotApprove($users,$upd_form));
        }
    }
}
