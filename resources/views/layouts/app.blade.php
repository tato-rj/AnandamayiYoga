<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('layouts/favicon')
    
    <title>
    @auth
        @if(count($notifications) > 0)
        ({{count($notifications)}})
        @endif
    @endauth
    {{config('app.name')}}
    </title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}?version=55" rel="stylesheet">

    <script>
        window.app = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            'user' => auth()->user(),
            'price' => config('membership.price.usd'),
            'stripe_key' => config('services.stripe.key')
        ]); ?>
    </script>

    @yield('head')
</head>
<body>
    {{-- TEMPORARY PASSWORD FOR DEVELOPMENT PHASE --}}
    @if(session()->has('gate'))
    @include('components/subscription/overlay')
    
    @include('components/modals/login')

    @include('components/modals/classes')

    @include('components/alerts/cookies')

    @include('layouts/partials/menu')
    <div id="app">
        @yield('content')
        @include('layouts/partials/footer')
    </div>
    @else
        @include('layouts/partials/development')
    @endif    


    @include('layouts/partials/alerts')
    @include('components/snippets/spinners/full-screen')

    @if(session()->has('confirm-email'))
    @include('components/modals/confirm-email')
    @endif

    @include('components/buttons/help')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/clamp.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript">
    $('form').each(function() {
        $(this).validate();
    });
    </script>

<script type="text/javascript">
$('.close-overlay').on('click', function() {
    $(this).parent().fadeOut();
});
$('.open-subscription-overlay').on('click', function() {
    $('.subscription-overlay').fadeIn();
});  
</script>

<script type="text/javascript">
// TOGGLE SMALL DELETE BUTTONS
$('.delete-sm').on('click', function() {
    $(this).parent().siblings().toggle();
    $(this).parent().toggle();
});
</script>

<script type="text/javascript">
// SHOW FEEDBACK TAB
$('#fixed-feedback-container .label').on('click', function() {
    $(this).hide();
    $(this).siblings('.feedback').toggleClass('d-none slideInRight');
});
// CLOSE FEEDBACK TAB
$('#fixed-feedback-container .close-button').on('click', function() {
    $container = $(this).parent().parent();
    $container.toggleClass('d-none slideInRight');
    $container.siblings().show();
});
// COLLECT SCORE
$('#fixed-feedback-container .smiley').on('click', function() {
    $smiley = $(this);
    $form = $('#fixed-feedback-container .form');

    $('.smiley').not($smiley).css('opacity', 0.6).find('p').removeAttr('style');
    $smiley.removeAttr('style').find('p').css('opacity', 1);
    $form.find('input[name="feedback_score"]').val($smiley.attr('value'));

    $form.show();
});
// COLLECT EMAIL
$('#fixed-feedback-container .form button').on('click', function() {
    $button = $(this);
    $form = $button.parent();
    email = $button.siblings('input').attr('value');
    
    $button.parent().parent().siblings('.email').show();
    $button.parent().parent().hide();
});
// SUBMIT AJAX FORM
$('#fixed-feedback-container .email button').on('click', function() {
    $form = $('#fixed-feedback-container .form');
    $button = $(this);
    email = $button.siblings('input').val();

    if ($button.hasClass('follow-up'))
        $form.find('input[name="feedback_email"]').val(email);

    submitFeedback($button.parent().attr('data-url'), {
        'feedback_about': 'experience',
        'feedback_score': $form.find('input[name="feedback_score"]').val(),
        'feedback_comment': $form.find('textarea[name="feedback_comment"]').val(),
        'feedback_email': $form.find('input[name="feedback_email"]').val(),
        'feedback_page': window.location.pathname
    });

    $button.parent().parent().siblings('.thank-you').show();
    $button.parent().parent().hide();
});

$('.thumbs').on('click', function() {
    $thumb = $(this);

    submitFeedback($thumb.attr('data-url'), {
        'feedback_about': 'page',
        'feedback_score': $thumb.attr('data-value'),
        'feedback_page': window.location.pathname
    });

    $thumb.siblings('.thumbs').removeClass('text-blue').addClass('text-muted');
    $thumb.removeClass('text-muted').addClass('text-blue');
})
</script>
    <script type="text/javascript">
    $(window).on('load',function(){
        if ($('#confirm-email').length) {
            $('#confirm-email').modal('show');        
        }
    });
    </script>
    <script type="text/javascript">
        var swiper = new Swiper('.swiper-container', {
          spaceBetween: 0,
          slidesPerView: 'auto',
            navigation: {
              nextEl: '.swiper-right',
              prevEl: '.swiper-left',
            },
        });
    </script>

<script type="text/javascript">
$('.navbar-toggler').on('click', function() {
    $menu = $('.navbar-collapse');
    $hamburger = $('.navbar-toggler');

    $hamburger.toggleClass('text-white is-active');
    $menu.toggleClass('scroll-y').fadeToggle('fast');
    $('body').toggleClass('no-scroll')
})
</script>

<script type="text/javascript">
// SET COOKIE CONSENT COOKIE
$('#cookie-alert button').on('click', function() {
    $alert = $('#cookie-alert');

    setCookie('cookie_consent', 'cookies from anandamayiyoga.com', 365);

    $alert.addClass('bounceOutDown');

    setTimeout(function() {
        $alert.remove();
    }, 500);
});
</script>

@yield('scripts')

</body>
</html>
