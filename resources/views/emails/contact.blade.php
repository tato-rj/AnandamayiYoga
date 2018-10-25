@component('mail::message')
# New message from the website

<p><strong>From</strong> {{$request->first_name}} {{$request->last_name}}</p>
<p><strong>Email</strong> {{$request->email}}</p>
<p><strong>Subject</strong> {{$request->subject}}</p>

<div style="margin-top: 24px; padding: 18px 0; border-top: 1px solid lightgrey; border-bottom: 1px solid lightgrey;">{{$request->message}}</div>

@endcomponent
