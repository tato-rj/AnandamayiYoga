<div class="p-3 col-lg-4 col-md-6 col-sm-12 col-12 h-card move-control">
    <a href="{{$program->path()}}" class="link-none">
        <div class="rounded position-relative hover-shadow t-2 move-item-up d-flex align-items-center h-100 w-100 bg-full p-4" style="background-image:url({{cloud($program->image_path)}});">
            @if($program->isFavorited())
                @include('components/icons/heart', ['position' => 'absolute-top-right'])
            @endif
            <div>
	            <h2 class="text-white"><strong>{{$program->name}}</strong></h2>
                @if($program->teacher()->exists())
                <p class="mb-1 clamp-1 text-white"><small>with <strong>{{$program->teacher->name}}</strong></small></p>
                @endif
	            <p class="text-white m-0"><small>{{$program->lessons()->count()}} videos | {{secondsToTime($program->duration)}}</small></p>
            </div>
        </div>
    </a>
</div>