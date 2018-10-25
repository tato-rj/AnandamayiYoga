<div class="row bg-full position-relative mb-7" style="background-image:url({{cloud('app/images/backgrounds/studio.jpg')}})">
    <div class="overlay-dark w-100 h-100 bg-light z-0"></div>
    <section class="container py-5">
        <div class="row text-center">

            <div class="col-12 mb-5">
                <h1>Choose the best practice for you</h1>
                <p class="lead text-center m-0">Let's find you the right classes to start your <strong>15 day free trial.</strong></p>
            </div>

            @foreach($levels as $level)

                    @include('pages/welcome/level-card', [
                        'id' => $level->id,
                        'name' => $level->name,
                        'delay' => $loop->iteration*100
                    ])

            @endforeach

        </div>
    </section>
</div>