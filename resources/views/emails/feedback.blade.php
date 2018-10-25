@component('mail::message')
# Hi {{$name}},

Thank you for you being in touch with us! We will get back to you shortly.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
