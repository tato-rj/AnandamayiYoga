<section class="row position-relative py-8 mb-7 bg-full" style="background-image:url({{cloud("app/images/backgrounds/{$image}.jpg")}});">
    <div class="overlay-dark w-100 h-100 bg-{{$overlay}} z-0"></div>
    <div class="container">
        <div class="row text-white align-items-center">
            <div class="col-lg-8 col-md-8 col-sm-10 col-10 reveal" reveal-duration="800" reveal-origin="left" reveal-delay="0">
                <h2>{{$title}}</h2>
                <p class="lead mb-4">We offer a unique 4-week personalized Yoga routine and courses for extended learning. Check it out, you'll love it!</p>

                @include('components/buttons/simple', [
                    'path' => route('register'),
                    'label' => 'START THE '.config('membership.trial_duration').'-DAY FREE TRIAL',
                    'color' => "outline-{$overlay}-empty"])

            </div>
        </div>
    </div>
</section>