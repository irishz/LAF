@component('mail::message')
เรียน หัวหน้าแผนก

    เนื่องจาก 
The body of your message. form {{ Auth::user()->f_name}}

@component('mail::button', ['url' => ''])
Approve
@endcomponent

@component('mail::button', ['url' => ''])
Not Approve
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
