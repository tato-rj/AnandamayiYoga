@extends('layouts/app')

@section('head')
    @if(session()->has('gate') && !auth()->check())
        <script src="{{ asset('js/pace.min.js') }}"></script>
    @endif
@endsection

@section('content')
<div class="container-fluid">
    @if(!auth()->check())
        @include('pages/welcome/overlay')
    @endif

    @include('pages/welcome/lead')
    @include('pages/welcome/intro')
    
    @unless(auth()->check())
        @include('components/bars/gift')
    @endunless

    @auth
        @include('components/bars/benefits')
    @else
        @include('pages/welcome/video')
    @endauth
    
    @include('components/bars/books')
    @include('components/bars/partners')
    @include('components/bars/devices')
    
    @if(!auth()->check())
        @include('pages/welcome/levels')
        @include('components/bars/testimonials')
    @endif

</div>

@endsection

@section('scripts')

<script type="text/javascript">
function toggleArrayItem(a, v) {
    var i = a.indexOf(v);
    if (i === -1)
        a.push(v);
    else
        a.splice(i,1);
}

$categoriesArray = new Array();

$('.level-card').on('click', function () {
    $levelId = $(this).attr('data-id');

    $('#classes-modal-submit').attr('data-level-id', $levelId);
});

$('.select-class').on('click', function() {
    $id = $(this).attr('data-id');

    $button = $('#classes-modal-submit');

    toggleArrayItem($categoriesArray, $id);
});

$('#classes-modal-submit').on('click', function() {
    $.session.set('level_id', $levelId);
    $.session.set('categories', JSON.stringify($categoriesArray));
});

</script>

<script type="text/javascript">
$('#video-lead, #play-button').on('click', function() {
    if ($('#video-lead').get(0).paused) {
        $('#video-lead').get(0).play();
    } else {
        $('#video-lead').get(0).pause();
    }
    $('#play-button').toggle();
});
</script>

<script type="text/javascript">
window.sr = ScrollReveal();
$('.reveal').each(function() {
    sr.reveal($(this), {
        distance: '60px',
        delay: $(this).attr('reveal-delay'),
        origin: $(this).attr('reveal-origin'),
        duration: $(this).attr('reveal-duration')
    });
});
</script>

<script type="text/javascript">
$(window).on('load', function() {
        setTimeout(function() {
            $('#intro > div').addClass('grow').fadeOut('fast', function() {
                $(this).remove();
                $('.pace').fadeOut('slow');
                $('#intro').fadeOut('slow');
            });
        }, 1250);

});
</script>
@endsection