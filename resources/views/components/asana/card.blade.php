<div class="mb-4 p-3">
    <div class="" style=" width: 120px">
        <a href="{{$asana->path()}}" class="link-none">
            <div class="bg-full position-relative mb-2 w-100" 
            style="background-image:url({{cloud($asana->image_path)}}); height: 120px
            ">
                @if($asana->video_path)
                    @include('components/icons/film')
                @endif

                @if($asana->isFavorited())
                    @include('components/icons/heart', ['position' => 'absolute-top-right'])
                @endif
            </div>
            <div class="">
                <p class="clamp-1 m-0 l-height-1"><strong><small>{{$asana->name}}</small></strong></p>
                <p class="clamp-1 m-0 text-muted l-height-1" style="font-size: .9em"><small>{{$asana->sanskrit}}</small></p>
            </div>
        </a>
    </div>
</div>