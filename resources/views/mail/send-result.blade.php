@component('mail::message')
<pre>
เรียน คุณ {{ $user->f_name.' '.$user->l_name }}
    ผู้จัดการ/หัวหน้าแผนก {{ $status }} การลาของคุณ ณ วันที่ {{ $upd_form->approve_datetime }}
    
    เลขที่ใบลา : {{ $upd_form->id }}

</pre>

@component('mail::button', ['url' => 'http://leave.ddns.net:8000/form/'.$upd_form->id.'/edit'])
ตรวจสอบสถานะ
@endcomponent

@endcomponent
