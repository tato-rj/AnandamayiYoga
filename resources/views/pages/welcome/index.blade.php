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
    @include('pages/welcome/features')
    @include('pages/welcome/teacher')
    
    @unless(auth()->check())
        @include('components/bars/gift')
        {{-- @include('pages/welcome/presentation') --}}
        @include('pages/welcome/levels')
    @endunless

    @auth
        <div class="mb-7">
                
            @include('components/swiper/trending')

            @include('components/swiper/latest')

            @include('components/swiper/free')

            @include('components/swiper/category', ['category' => \App\Category::where('name', 'Morning Classes')->first()])
        
        </div>
    @else
        @include('pages/welcome/video')
    @endauth

    @include('components/bars/devices')
    
    @include('components/bars/partners')

    @if(!auth()->check())
        @include('components/bars/testimonials')
    @endif

</div>

@endsection

@section('scripts')

<script type="text/javascript">
var bgImageArray = ["buddha.jpg", "flower.jpg"],
base = "https://anandamayiyoga.s3.amazonaws.com/app/images/backgrounds/",
secs = 4;
bgImageArray.forEach(function(img){
    new Image().src = base + img; 
    // caches images, avoiding white flash between background replacements
});

function backgroundSequence() {
    window.clearTimeout();
    var k = 0;
    for (i = 0; i < bgImageArray.length; i++) {
        setTimeout(function(){ 
            $('#main-lead').css('background-image', "url(" + base + bgImageArray[k] + ")");
        if ((k + 1) === bgImageArray.length) { setTimeout(function() { backgroundSequence() }, (secs * 1000))} else { k++; }            
        }, (secs * 1000) * i)   
    }
}
// backgroundSequence();
</script>

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