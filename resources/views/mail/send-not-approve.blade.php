@component('mail::message')
<pre>
เรียน ผู้จัดการ/หัวหน้าแผนก{{ $user->department }}
    ไม่อนุญาตให้อนุมัติ ใบลาเลขที่ {{ $form->id }} ของ {{ $user->f_name }} ณ วันที่ {{ $time }}
</pre>

@component('mail::button',['url'=>'http://127.0.0.1:8000/form/'.$form->id.'/edit'])
ไปยังหน้าอนุมัติ
@endcomponent

<pre>
จึงเรียนมาเพื่อทราบ<br>
    วัฒนา บุพพิ
ประธานเจ้าหน้าที่บริหาร
@endcomponent
