<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_id' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'f_name' => $data['f_name'],
            'l_name' => $data['l_name'],
            'prename' => $data['prename'],
            'position' => $data['position'],
            'department' => $data['department'],
            'section' => $data['section'],
            'mobile' => $data['mobile'],
            'user_id' => $data['user_id'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => User::DEFAULT_TYPE,
        ]);
    }

    public function showRegistrationForm(){
        $department = ['แผนกบัญชี','แผนกสิทธิประโยชน์','แผนกอุบัติเหตุ-ฉุกเฉิน','แผนกเคลมเซ็นเตอร์','แผนกลูกค้าประกัน/ลูกค้าสัมพันธ์','แผนกทันตกรรม',
            'แผนกซ่อมบำรุง','แผนกการเงิน','ศูนย์ไตเทียม','แผนกอาคารสถานที่','แผนกบริหารบุคลากร','หอผู้ป่วยหนัก','หอผู้ป่วยในชั้น2','หอผู้ป่วยในชั้น3',
            'หอผู้ป่วยในชั้น4','หอผู้ป่วยVIPชั้น5','ศูนย์คอมพิวเตอร์','แผนกวิเคราะห์(Lab)','แผนกห้องคลอดและทารกแรกเกิด','แผนกตรวจสุขภาพเคลื่อนที่',
            'แผนกเวชระเบียนและเวชสถิติ','แผนกโภชนาการ','ฝ่ายการพยาบาล','แผนกผู้ป่วยนอก(ประกันสังคม)','แผนกผู้ป่วยนอก(Premium)','แผนกห้องผ่าตัด',
            'แผนกบริการปฐมภูมิ','แผนกเภสัชกรรม','แผนกกายภาพบำบัด','แผนกสร้างเสริมสุขภาพ','แผนกจัดซื้อ-พัสดุ','แผนกรังสีวิทยา','ฝ่ายขายและการตลาด',
            'ศูนย์จัดการยุทธศาสตร์องค์กร','หน่วยเครื่องมือแพทย์','แผนกรับส่งผู้ป่วย','แผนกบริหารทรัพยากรทางการแพทย์','แผนกยานพาหนะ','หน่วยรปภ.','หน่วยOCC'
        ];
        $position = ['ผู้จัดการ','ผช.ผู้จัดการ','หัวหน้าแผนก','รักษาการหัวหน้าแผนก','พยาบาลวิชาชีพ(RN)','เภสัชกร','นักเทคนิคการแพทย์','นักรังสีเทคนิค'
            ,'นักกายภาพ','นักโภชนาการ','นักจิตวิทยา','นักเวชสถิติ','นักเวชกิจฉุกเฉิน(Paramedic)','นิติกร','นวก.สาธารณสุข','จนท.บัญชี','จนท.IT','จนท.การขายและการตลาด'
            ,'จนท.เวชระเบียน','จนท.รับผู้ป่วยใน','จนท.โอเปอร์เรเตอร์','จนท.บุคคล','จนท.การเงิน','จนท.คีย์ข้อมูล','จนท.จัดซื้อ','จนท.คลังสินค้า-พัสดุ'
            ,'จนท.ศูนย์จัดการยุทธศาสตร์องค์กร','จนท.ประสานสิทธิ์','จนท.ทันตกรรม','จนท.OCC','ผช.พยาบาล (PN)','พนง.ยานยนต์','พนง.รับ-ส่งผู้ป่วย','ผช.นักเทคนิคการแพทย์ (LAB)'
            ,'ผช.นักรังสีเทคนิค (X-RAY)','ผช.เภสัชกร','ผช.ทันตกรรม','พนง.โภชนาการ','ช่างซ่อมบำรุง','แมสเซ็นเจอร์','แม่บ้าน','รปภ.'
        ];


        return view('auth.register',compact('department','position'));
    }
}
