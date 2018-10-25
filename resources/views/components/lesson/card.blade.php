<div class="p-3 {{$sizes or 'col-lg-4 col-md-6 col-sm-12 col-xs-12'}} h-card-sm move-control swiper-slide">
    <a href="{{$lesson->path()}}" class="link-none">
    	<div class="row no-gutters t-2 hover-shadow-light move-item-up h-100 w-100">
    		<div class="col-5 bg-full d-flex align-items-center justify-content-center rounded-left" 
                style="background-image:url({{cloud($lesson->image_path)}});">
                @if($lesson->is_free)
                @include('components/icons/free')
                @endif

                @include('components/lesson/icon')
            </div>
    		<div class="col-7 rounded-right border p-3 d-flex flex-column justify-content-between bg-white">
                @if($lesson->isFavorited())
                    @include('components/icons/heart', ['position' => 'absolute-top-right'])
                @endif
    			<div>
    				<h5 class="m-0 clamp-2"><strong>{{$lesson->name}}</strong></h5>
                    @if($lesson->teacher()->exists())
                    <p class="m-0 clamp-1 text-muted"><small>with <strong>{{$lesson->teacher->name}}</strong></small></p>
                    @endif
    				             
    			</div>
                <div>
                    <p class="m-0"><small><i class="far mr-1 text-muted fa-clock"></i>{{secondsToTime($lesson->duration)}}</small></p> 
                    <p class="m-0">
                        @include('components/lesson/levels', ['lesson' => $lesson])
                    </p>
                </div>
    		</div>
    	</div>
    </a>
</div>