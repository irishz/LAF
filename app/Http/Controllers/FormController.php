<?php

namespace App\Http\Controllers;

use App\Form;
use App\User;
use Carbon\Carbon;
use App\Mail\SendResult;
use App\Mail\SendRequest;
use Illuminate\Http\File;
use App\Mail\SendMngRequest;
use Illuminate\Http\Request;
use App\Mail\SendManagerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department = ['แผนกบัญชี','แผนกสิทธิประโยชน์','แผนกอุบัติเหตุ-ฉุกเฉิน','แผนกเคลมเซ็นเตอร์','แผนกลูกค้าประกัน/ลูกค้าสัมพันธ์','แผนกทันตกรรม',
            'แผนกซ่อมบำรุง','แผนกการเงิน','ศูนย์ไตเทียม','แผนกอาคารสถานที่','แผนกบริหารบุคลากร','หอผู้ป่วยหนัก','หอผู้ป่วยในชั้น2','หอผู้ป่วยในชั้น3',
            'หอผู้ป่วยในชั้น4','หอผู้ป่วยVIPชั้น5','ศูนย์คอมพิวเตอร์','แผนกวิเคราะห์(Lab)','แผนกห้องคลอดและทารกแรกเกิด','แผนกตรวจสุขภาพเคลื่อนที่',
            'แผนกเวชระเบียนและเวชสถิติ','แผนกโภชนาการ','ฝ่ายการพยาบาล','แผนกผู้ป่วยนอก(ประกันสังคม)','แผนกผู้ป่วยนอก(Premium)','แผนกห้องผ่าตัด',
            'แผนกบริการปฐมภูมิ','แผนกเภสัชกรรม','แผนกกายภาพบำบัด','แผนกสร้างเสริมสุขภาพ','แผนกจัดซื้อ-พัสดุ','แผนกรังสีวิทยา','ฝ่ายขายและการตลาด',
            'ศูนย์จัดการยุทธศาสตร์องค์กร','หน่วยเครื่องมือแพทย์','แผนกรับส่งผู้ป่วย','แผนกบริหารทรัพยากรทางการแพทย์','แผนกยานพาหนะ','หน่วยรปภ','หน่วยOCC','แผนกลูกค้าประกัน/ลูกค้าสัมพันธ์'
        ];
        return view('form.form',compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->user_id;
        $user = User::find($user_id);

        $store = new Form;
        $store->user_id = $user_id;
        $store->leave_type = $request->leave_type;
        $store->leave_cause = $request->leave_cause;
        $store->number_date_leave = $request->number_date_leave;
        $store->hour_date_leave = $request->hour_date_leave;
        $store->date_leave = $request->date_leave;
        $store->responsible_work = $request->responsible_work;
        
        // file store
        if ($request->hasFile('attachment')) {
            $time = Carbon::now()->format('YmdHs');
            $file = $request->file('attachment');
            $filename = $user_id.'_'.$time.'.'.$file->getClientOriginalExtension();
            $path = 'public/'.$user_id;

            Storage::putFileAs('public/'.$user_id,$request->file('attachment'),$user_id.'_'.$time.'.'.$file->getClientOriginalExtension());
            $store->attachment = $path.'/'.$user_id.'_'.$time.'.'.$file->getClientOriginalExtension();
        }
        
        $store->save();
        
        $form = Form::find($store->id);
        
        // send approve mail to approver
        $this->sendMail($user,$form);

        return redirect('home');
    }

    public function sendMail($user,$form)
    {
        if ($user->type == 1) {
            Mail::to("wattana.bup@suksawathospital.com")->send(new SendMngRequest($user,$form));
            Mail::to("wat_pt2000@yahoo.com")->send(new SendMngRequest($user,$form));
        }else {
            Mail::to("sherry_nit_b2@hotmail.co.th")->send(new SendRequest($user,$form));
            Mail::to("ssh.hrd@suksawathospital.com")->send(new SendRequest($user,$form));
            Mail::to("wattana.bup@suksawathospital.com")->send(new SendRequest($user,$form));
            Mail::to("wat_pt2000@yahoo.com")->send(new SendRequest($user,$form));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $forms = Form::find($id);
        $users = User::find($forms->user_id);

        return view('form.edit',compact('id','forms','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $upd_form = Form::find($id);

        $upd_form->approved = request('approve');
        $upd_form->approve_by = Auth::user()->f_name;
        $upd_form->approve_datetime = Carbon::now()->toDateTimeString();
        $upd_form->save();

        $user = User::find($upd_form->user_id);

        if ($upd_form->approved == 1) {
            $status = 'อนุมัติ';
        }else{
            $status = 'ไม่อนุมัติ';
        }

        // send result mail to user
        Mail::to($user->email)->send(new SendResult($user,$upd_form,$status));

        return redirect('/admin/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy(r $r)
    {
        //
    }
}
