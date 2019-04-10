@component('mail::message')
<pre>
เรียน ผู้จัดการ/หัวหน้าแผนก{{ $user->department }}
    ไม่อนุมัติ ใบลาเลขที่ {{ $form->id }} ของคุณ ณ วันที่ {{ $form->approve_datetime }}
</pre>

@component('mail::button', ['url' => 'http://127.0.0.1:8000/home'])
ตรวจสอบสถานะ
@endcomponent

<pre>
จึงเรียนมาเพื่อทราบ<br>
    วัฒนา บุพพิ
ประธานเจ้าหน้าที่บริหาร
@endcomponent