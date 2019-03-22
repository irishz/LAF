@component('mail::message')
<pre>
เรียน หัวหน้าแผนก{{ $user->department }}
    {{ $user->f_name}} ขออนุญาต{{ $form->leave_type }} ตั้งแต่วันที่ {{ $form->created_at }} เป็นเวลา {{ $form->number_date_leave }} เนื่องด้วยสาเหตุ {{ $form->leave_cause }}


</pre>

@component('mail::button', ['url' => 'leave.ddns.net:8000/admin/dashboard'])
Go Approve Page
@endcomponent

<pre>
จึงเรียนมาเพื่อทราบและอนุมัติ<br>
    {{ $user->f_name}}
</pre>
@endcomponent
