@component('mail::message')
# Hi {{$user->first_name}}!

Thank you for joining AnandamayiYoga. We're honored to be a part of your yoga and meditation practice.

We need you to quickly verify your email address by clicking the button below.

@component('mail::button', ['url' => url("/register/confirm?token={$user->confirmation_token}")])
<strong>Confirm my email</strong>
@endcomponent

If you have any issues verifying your account, please contact us at <a href="mailto:help@anandamayiyoga.com">help@anandamayiyoga.com</a>.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
