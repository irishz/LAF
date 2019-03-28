<?php

namespace App\Http\Controllers;

use App\Form;
use App\User;
use Carbon\Carbon;
use App\Mail\SendResult;
use App\Mail\SendRequest;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department = ['แผนกบัญชี','แผนกสิทธิประโยชน์','แผนกอุบัติเหตุ - ฉุกเฉิน','แผนกเคลมเซ็นเตอร์','แผนกลูกค้าประกัน/ลูกค้าสัมพันธ์','แผนกทันตกรรม',
        'แผนกซ่อมบำรุง','แผนกการเงิน','ศูนย์ไตเทียม','แผนกอาคารสถานที่','แผนกบริหารบุคลากร','หอผู้ป่วยหนัก','หอผู้ป่วยในชั้น 2','หอผู้ป่วยในชั้น 3',
        'หอผู้ป่วยในชั้น 4','หอผู้ป่วย VIP ชั้น 5','ศูนย์คอมพิวเตอร์','แผนกวิเคราะห์ (Lab)','แผนกห้องคลอดและทารกแรกเกิด','แผนกตรวจสุขภาพเคลื่อนที่',
        'แผนกเวชระเบียนและเวชสถิติ','แผนกโภชนาการ','ฝ่ายการพยาบาล','แผนกผู้ป่วยนอก (ประกันสังคม)','แผนกผู้ป่วยนอก (Premium)','แผนกห้องผ่าตัด',
        'แผนกบริการปฐมภูมิ','แผนกเภสัชกรรม','แผนกกายภาพบำบัด','แผนกสร้างเสริมสุขภาพ','แผนกจัดซื้อ-พัสดุ','แผนกรังสีวิทยา','ฝ่ายขายและการตลาด',
        'ศูนย์จัดการยุทธศาสตร์องค์กร','หน่วยเครื่องมือแพทย์','แผนกรับส่งผู้ป่วย','แผนกบริหารทรัพยากรทางการแพทย์','แผนกยานพาหนะ','หน่วยรปภ.','หน่วย OCC'
        ];
        return view('form.form',compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function file()
    {
        //
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
        $store->date_leave = $request->date_leave;
        $store->responsible_work = $request->responsible_work;
        // file store
        $time = Carbon::now()->toDateTimeString();
        $file = $request->file('attachment');
        $filename = $user_id.'_'.$time.'.'.$file->getClientOriginalExtension();
        $path = $file->storeAs('public/'.$user_id, $filename);

        Storage::put(
            'avatars/'.$user_id,
            file_get_contents($request->file('attachment')->getRealPath())
        );
        dd('store');
        // Storage::putFileAs($user_id, new File($path), $filename);
        // Storage::disk('local')->put($filename,$user_id)->makeDirectory(public_path().$user_id);
        // Storage::disk('local')->put('file.txt', 'Contents')->makeDirectory('pubclic//1234578');
        // $store->save();
        
        $form = Form::find($store->id);
        
        // send approve mail to approver
        Mail::to("hrd@example.com")->send(new SendRequest($user,$form));
        Mail::to("ceo@example.com")->send(new SendRequest($user,$form));
        
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
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

        return redirect('/');
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
