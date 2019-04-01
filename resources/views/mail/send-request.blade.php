@component('mail::message')
<pre>
เรียน ผู้จัดการ/หัวหน้าแผนก{{ $user->department }} และผู้ที่เกี่ยวข้อง
    {{ $user->f_name}} ขออนุญาต{{ $form->leave_type }} ตั้งแต่วันที่ {{ $form->date_leave }} เป็นเวลา {{ $form->number_date_leave }} เนื่องด้วยสาเหตุ {{ $form->leave_cause }}
โดยมีคุณ {{ $form->responsible_work }} เป็นผู้รับผิดชอบงานแทน

</pre>

@component('mail::button', ['url' => 'http://leave.ddns.net:8001/approve/'.$form->id.'/'.$user->department])
Approve
@endcomponent

@component('mail::button', ['url' => 'http://leave.ddns.net:8001/not-approve/'.$form->id.'/'.$user->department])
Not Approve
@endcomponent

<pre>
จึงเรียนมาเพื่อทราบและอนุมัติ<br>
    <center>
        {{ $user->prename.$user->f_name.' '.$user->l_name }}
        {{ $user->position }}
        {{ $user->department }}
    </center>
</pre>
@endcomponent
