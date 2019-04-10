@component('mail::message')
<pre>
เรียน คุณ {{ $user->f_name.' '.$user->l_name }}
    ใบลาของคุณ {{ $status }} ณ วันที่ {{ $upd_form->approve_datetime }}
    
    เลขที่ใบลา : {{ $upd_form->id }}

</pre>

@component('mail::button', ['url' => 'http://leave.ddns.net:8001/home'])
ตรวจสอบสถานะ
@endcomponent

@endcomponent
