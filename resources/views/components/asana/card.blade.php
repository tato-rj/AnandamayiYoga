<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 p-3">
    <div class="">
        <a href="{{$asana->path()}}" class="link-none">
            <div class="bg-full rounded position-relative asana-card" 
            style="background-image:url({{cloud($asana->image_path)}});
            ">
                @if($asana->video_path)
                    @include('components/icons/film')
                @endif

                @if($asana->isFavorited())
                    @include('components/icons/heart', ['position' => 'absolute-top-right'])
                @endif
            </div>
            <div class="px-2">
                <p class="clamp-1 m-0 l-height-1"><strong>{{$asana->name}}</strong></p>
                <p class="clamp-1 m-0 text-muted"><small>{{$asana->sanskrit}}</small></p>
            </div>
        </a>
    </div>
</div>