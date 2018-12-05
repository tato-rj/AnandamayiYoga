@extends('layouts/app')

@section('head')
    @if(session()->has('gate') && !auth()->check())
        <script src="{{ asset('js/pace.min.js') }}"></script>
    @endif

<style type="text/css">
@keyframes play {
   100% { background-position: -6000px; }
}

@keyframes sun {
    0% { transform: scale(1); }
    20% { transform: scale(1.15); }
    60% { transform: scale(0.9); }
    85% { transform: scale(1.05); }
    95% { transform: scale(0.98); }
    100% { transform: scale(1); }
}

.plant-container {
  width: 200px;
  height: 200px;
}

.plant-beginner {
    width: 100%;
    height: 100%;
    /*animation: play 0.8s steps(30) infinite;*/
}

.plant-intermediate {
    width: 100%;
    height: 100%;
}

.plant-advanced {
    width: 100%;
    height: 100%;
}

.soil {
    z-index: 3;
    width: 80%; 
    bottom: 0; 
    left: 50%; 
    transform: translateX(-50%);
}

.plant {
    transition: .8s;
    z-index: 2;
    position: absolute;
    bottom: 0;
    left: 0;
}

.plant-container:hover .plant {
    transform: scale(1.05);
    bottom: 12px;
}

.plant-container:hover .sun {
    /*transform: scale(1.1) translateY(-8px);*/
    background-color: rgba(252,212,64,0.2);
    animation: sun 0.6s;
}

.plant-container:hover .sun div {
    opacity: 0.4;
}

.sun {
    position: absolute;
    bottom: 8px;
    transition: .3s;
    transition-timing-function: ease-in-out;
    z-index: 1;
    background-color: rgba(0,0,0,0.05);
}

.sun-beginner {
    width: 108px;
    height: 108px;
    left: 46px;
}

.sun-intermediate {
    width: 132px;
    height: 132px;
    left: 35px;
}

.sun-advanced {
    width: 162px;
    height: 162px;
    left: 22px;
}

.sun div {
    width: 60%;
    height: 60%;
    position: absolute;
    margin-top: 20%;
    margin-left: 20%;
    border-radius: 50%;
    background-color: rgba(252,212,64,0.8);
    opacity: 0;
    transition: .8s;
}

</style>
@endsection

@section('content')
<div class="container-fluid">
    @if(!auth()->check())
        @include('pages/welcome/overlay')
    @endif

    @include('pages/welcome/lead')
    @include('pages/welcome/presentation')
    @include('pages/welcome/teacher')
    @include('components.bars.teachers.renato')
    
    @unless(auth()->check())
        @include('components/bars/gift')
        @include('pages/welcome/programs')
        @include('components/bars/books')
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
    
    @include('components/bars/partners')

    @if(!auth()->check())
        @include('components/bars/testimonials')
    @endif

    @include('components/bars/info')
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