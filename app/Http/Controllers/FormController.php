<?php

namespace App\Http\Controllers;

use App\Mail\SendApprove;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    public function mail(Request $request){
        // dd($request->department);
        $mailto = 'ssh.itd@suksawathospital.com';
        $comment = 'some comment';
        if (Auth::user()->department === $request->department) {
            // dd('right department',Auth::user()->department);
            Mail::to($mailto)->send(
                new SendApprove($comment)
            );
            return 'we already send approve to'.' '.$mailto;
        }else{
            dd('wrong department',Auth::user()->department);
        }
        
    }

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
    public function create()
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
        

        return view('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function show(r $r)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function edit(r $r)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, r $r)
    {
        //
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
