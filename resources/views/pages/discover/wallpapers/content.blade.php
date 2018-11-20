<section id="scroll-mark" class="container py-4">

    @title(['title' => 'Yoga Wallpapers'])

    <div class="row">
        
        <div class="col-12 mb-2">
            @include('components/filters/show', [
                'url' => route('discover.wallpapers'),
                'include' => ['wallpapers']
            ])
        </div>
        
    </div>
    <div class="row lightbox photos mb-7">

        @foreach($wallpapers as $wallpaper)
        <a href="{{cloud($wallpaper->image_path)}}" class="col-md-2 col-4">
            <div class="lightbox__item photos__item">
                <img src="{{cloud($wallpaper->thumbnail)}}">
            </div>
        </a>
        @endforeach

    </div>
    @unless(auth()->check())
    <div class="row mb-7">
        <div class="col-lg-8 col-md-8 col-sm-10 col-12 mx-auto bg-light shadow px-4 py-5 rounded border-thin">
            <h4 class="text-center">@lang('The rest of the images are for only!')</h4>
            <p class="lead m-4">@lang('To view all of our yoga wallpapers just click on the button below and sing up for our 15-day free trial, you\'ll love it') :)</p>
            <div class="text-center">
                <a href="{{route('register')}}" class="btn btn-red mx-auto my-3"><strong>@lang('Start your free trial')</strong></a>
                <p class="text-muted m-0"><small>@lang('Already a member?') <a href="" data-toggle="modal" data-target="#login" class="link-default">@lang('Click here')</a></small></p>
            </div>
        </div>
    </div>
    @endif
</section>