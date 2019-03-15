<div class="row">
    <section class="col-12 h-100vh bg-right" id="main-lead" 
    style="background-image:url({{cloud('app/images/backgrounds/flute.jpg')}})">
        <div class="row align-items-center h-100">
            <div class="col-lg-10 col-md-10 col-10 mx-auto z-10 mt-8">
            @auth
                <h2 class="text-white mb-4"><strong>@lang('We\'re glad to see you here!')</strong></h2>
                <p class="lead text-white mb-4">@lang('To view your recommendations, favorites, progress and more, just click below.')</p>
            @else
                <h2 class="text-white mb-4"><strong>
                    @lang('Welcome to Anandamayi Yoga')
                </strong></h2>
                <div class="text-white mb-4">
                    <p class="lead m-0">@lang('Online yoga and meditation to improve your physical, mental and spiritual health.')</p>
                </div>
            @endauth
                       
            @auth

                @include('components/buttons/simple', [
                    'path' => route('user.home'),
                    'label' => __('MY DASHBOARD'),
                    'color' => 'red', 
                    'weight' => 'bold',
                    'type' => 'pill'])
                    
                @else

                @include('components/buttons/simple', [
                    'path' => route('register'),
                    'label' => __('Start your free trial'),
                    'color' => 'red',
                    'id' => 'btn-hero',
                    'size' => 'lg', 
                    'weight' => 'bold',
                    'type' => 'pill'])

            @endauth        
            </div>
        </div>

        {{-- <div class="overlay w-100 h-100 bg-dark z-0"></div> --}}
    
    </section>
</div>