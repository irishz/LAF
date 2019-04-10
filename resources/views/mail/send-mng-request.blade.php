@component('mail::message')
<pre>
เรียน ประธานเจ้าหน้าที่บริหาร
    {{ $user->f_name}} ขออนุญาต{{ $form->leave_type }} ตั้งแต่วันที่ {{ $form->date_leave }} เป็นเวลา {{ $form->number_date_leave }}วัน {{ $form->hour_date_leave }} เนื่องด้วยสาเหตุ {{ $form->leave_cause }}
โดยมีคุณ {{ $form->responsible_work }} เป็นผู้รับผิดชอบงานแทน

</pre>

@component('mail::button', ['url' => 'http://127.0.0.1:8000/approve-mng/'.$form->id])
Approve
@endcomponent

@component('mail::button', ['url' => 'http://127.0.0.1:8000/not-approve-mng/'.$form->id])
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
