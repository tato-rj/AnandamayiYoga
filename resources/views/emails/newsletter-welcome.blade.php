@component('mail::message')
# Hello there!

Thank you for subscribing. We hope you enjoy our newsletter and find the content interesting and useful. As a token of appreciation, please find attached a poster with the 32 most important Yoga postures! According to the ancient Yoga text Gheranda Samhita there are as many asanas as living creatures in the Universe. Of all of them, 84 are the main asanas, and among these, 32 are considered to be most useful, leading us to perfection. Enjoy :)

@component('mail::button', ['url' => cloud('app/subscription_gift/anandamayiyoga_poster.jpg')])
<strong>Download my gift</strong>
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
