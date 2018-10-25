<div id="chapter{{$chapter->id}}" class="collapse" data-parent="#chapters-list">
  <div class="px-4 py-3">{{$chapter->description}}</div>
  <div class="px-4 pb-3">

  	@foreach($chapter->content as $content)
  	<a href="{{route('user.course.chapter.show', [$course->slug, $chapter->id, $content->type, $content->id])}}" class="link-none">
      	<div class=" bg-light mb-1 px-3 py-2 hover-red hover-shadow-light t-2">
      		<div class="d-flex justify-content-between align-items-center">
      			<div>
			      	<p class="mb-0">{{strtoupper($content->type)}} | <strong class="">{{$content->name}}</strong></p>
			      	<p class="m-0"><small class="text-muted">Status: 
			      		@if(auth()->user()->dateCompleted($content))
			      		<span class="text-success">Completed on {{auth()->user()->dateCompleted($content)->toFormattedDateString()}}</span>
			      		@else
			      		<span class="text-muted">Incomplete</span>
			      		@endif
			      	</small></p>
				</div>
				<div>
					@if(! empty($content->duration))
					<p class="m-0">
						<i class="fas fa-stopwatch opacity-4 mr-2"></i>{{secondsToTime($content->duration)}}
					</p>
					@endif
				</div>
			</div>
		</div>
	</a>
  	@endforeach
    
    @include('pages/course/show/accordion/downloads')
  
  </div>
</div>
