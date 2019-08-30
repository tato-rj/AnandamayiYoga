<div class="d-none d-sm-block mb-7">
<section class="container pt-5 pb-4 mt-5">
    <div class="row">
        <div class="col-12">
            <video id="video-lead" poster="{{cloud('app/videos/promo-cover.jpg')}}" reveal-delay="0" reveal-duration="500" reveal-origin="bottom" class="reveal video-area cursor-pointer w-100 h-100">
                <source src="{{cloud('app/videos/promo.mp4')}}" type="video/mp4">
            </video>
            <div class="absolute-center z-10 cursor-pointer">
                <i id="play-button" class="fas fa-play-circle text-red" style="font-size:7em; opacity:0.6;"></i>
            </div>
        </div>    
    </div>
</section>

<section class="row position-relative pb-5 bg-full" style="background-image:url({{cloud('app/images/backgrounds/group.jpg')}}); padding-top: 250px; top:-160px; margin-bottom: -160px">
    <div class="overlay-dark w-100 h-100 bg-blue z-0"></div>
    <div class="container mb-3">
        {{-- Change background: India landscape --}}
        <div class="row text-white align-items-center">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <h2>@lang('Join our Membership')</h2>
                <p>@lang('Find the perfect plan for you — You can pause/cancel anytime, in less than 10 seconds')</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 text-center">

                @include('components/buttons/simple', [
                    'path' => route('register'),
                    'label' => __('GET STARTED'),
                    'color' => 'outline-blue-empty', 
                    'size' => 'lg'])

                {{-- <p class="mb-0 mt-1">@lang('just $15/month')</p> --}}
            </div>
        </div>
    </div>
</section>
</div>