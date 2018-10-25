<section class="row position-relative mb-7 py-8 bg-full" style="background-image:url({{cloud("app/images/backgrounds/benefits.jpg")}}); background-position-x: 90%;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-8 col-sm-10 col-10 mx-auto">
                <h2 class="mb-2"><strong>{{$title or 'IMPROVE YOUR LIFESTYLE'}}</strong></h2>
                <p class="lead mb-4">{{$description or 'Learn more about the many benefits of practicing yoga'}}</p>

                @include('components/buttons/simple', [
                    'path' => route('about.our-platform'),
                    'label' => 'LEARN MORE',
                    'color' => 'outline-blue'])

            </div>
        </div>
    </div>
</section>