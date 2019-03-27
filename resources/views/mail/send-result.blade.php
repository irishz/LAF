@component('mail::message')
<pre>
เรียน คุณ {{ $user->f_name.' '.$user->l_name }}
    ผู้จัดการ/หัวหน้าแผนก {{ $status }} การลาของคุณ ณ วันที่ {{ $upd_form->approve_datetime }}
    
    เลขที่ใบลา : {{ $upd_form->id }}

</pre>

@component('mail::button', ['url' => 'http://127.0.0.1:8000/home'])
ตรวจสอบสถานะ
@endcomponent

@endcomponent
