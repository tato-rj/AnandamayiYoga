<section id="scroll-mark" class="container py-4">

    @title(['title' => 'Let\'s get started'])

@include('components.temp')  
{{--     <div class="row">

        <div class="col-lg-10 col-md-12 col-sm-12 col-12 mx-auto">
            <p class="lead mb-5 text-center">@lang('You\'re just one step away from your 15 day free trial! Just fill out the form below to enjoy full access to all of our classes, programs, articles and much more.')</p>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10 mx-auto mb-4">
                    <div class="position-relative px-1">
                        <video id="video" class="cursor-pointer w-100 h-100 rounded">
                            <source src="{{cloud('app/videos/promo.mp4')}}" type="video/mp4">
                        </video>
                        <div class="absolute-center z-10 cursor-pointer">
                            <i id="play-button" class="fas fa-play-circle text-red" style="font-size:4em; opacity:0.6;"></i>
                        </div>
                    </div>    
                    @include('pages/login/social')
                </div>
                <div class="col-lg-6 col-md-6 col-sm-10 col-12 mx-auto">
                    @component('pages/register/form')
                        @slot('submitButton')
    
                            @include('components/buttons/spinner', [
                                'classes' => 'btn-red btn-block',
                                'label' => __('Create my account')])
                            
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
    </div> --}}
</section>
