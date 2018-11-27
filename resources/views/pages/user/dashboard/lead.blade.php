@component('components/sections/lead', ['image' => 'anandamayi'])
    @slot('extra')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-6">
                <div class="lead-profile-image position-relative bg-full rounded-circle mb-2 d-block" 
                    style="background-image:url({{auth()->user()->avatar()}}); overflow:hidden">
                    <a href="{{route('user.settings.profile')}}" class="link-none">                    
                        <div class=" show-on-hover">
                            <h1 class="m-0 absolute-center text-white z-10" style="font-size: 3em">

                                <i class="fas fa-cloud-upload-alt"></i>

                            </h1>
                            <div class="overlay w-100 h-100 bg-dark z-0"></div>                
                        </div>
                    </a>
                </div>     
            </div>
            <div class="col-lg-6 text-right pt-5 pb-4 px-4" id="scroll-mark">
                <h3 class=""><strong>@lang('Hi') {{auth()->user()->first_name}}!</strong></h3>
                <p class="lead">@lang('Welcome! This is where you will find your courses, favorite classes, programs and more. Have questions?') <a href="{{route('support.contact.show')}}" class="link-default">@lang('We\'re here')</a>.</p>      
            </div>
        </div>
    </div>
    @endslot
@endcomponent