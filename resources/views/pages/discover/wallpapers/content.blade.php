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
    <div style="margin-top: -50px">
        @include('components.alerts.blocked', [
            'show' => true,
            'title' => __('The rest of the images are for only!'),
            'description' => __('To view all of our yoga wallpapers just click on the button below and sing up for our 15-day free trial, you\'ll love it.')])
    </div>
    @endif
</section>