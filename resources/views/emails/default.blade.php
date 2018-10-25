@component('mail::message')
# {{$greeting or null}}

@foreach($introLines as $line)
<p>{{$line}}</p>
@endforeach

@if($actionText)
@component('mail::button', ['url' => url($actionUrl)])
<strong>{{$actionText}}</strong>
@endcomponent
@endif

@foreach($outroLines as $line)
<p>{{$line}}</p>
@endforeach

Thanks,<br>
{{ config('app.name') }}
@endcomponent
