@component('mail::message')
# @lang('Hi') {{$user->first_name}}!

@lang('Thank you for joining AnandamayiYoga. We\'re honored to be a part of your yoga and meditation practice.')

@lang('We need you to quickly verify your email address by clicking the button below.')

@component('mail::button', ['url' => url("/register/confirm?token={$user->confirmation_token}")])
<strong>@lang('Confirm my email')</strong>
@endcomponent

@lang('If you have any issues verifying your account, please contact us at') <a href="mailto:contact@anandamayiyoga.com">contact@anandamayiyoga.com</a>.

Namaste,<br>
{{ config('app.name') }}
@endcomponent
