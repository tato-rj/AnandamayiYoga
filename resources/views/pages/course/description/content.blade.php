<div class="row mb-5">
	<div class="col-lg-8 col-md-10 col-sm-12 col-12 mx-auto">

		@include('pages/course/share', ['date' => "Last updated on {$course->updated_at->toFormattedDateString()}"])
		
		<div>
			<h2 class="mt-5 mb-4 pb-2 text-blue">ABOUT THIS COURSE</h2>
			{!! $course->description !!}
		</div>
		<div>
			<h2 class="mt-5 mb-4 pb-2 text-blue">COURSE CONTENT</h2>
			<div id="chapters-list">
				@foreach($course->chapters as $chapter)
				  <div class="mb-2">
				  	{{-- HEAD --}}
				    <div class="click-rotate-box px-4 py-3 t-2 border cursor-pointer d-flex align-items-center justify-content-between" id="headingOne" data-toggle="collapse" data-target="#chapter{{$chapter->id}}">
				      <h5 class="m-0">
				          <span class="text-muted"><strong>{{$chapter->label}}</strong></span> | {{$chapter->name}}
				      </h5>
				      <i class="fas fa-angle-down t-2 click-rotate-target"></i>
				    </div>
				    {{-- COLLAPSE CONTENT --}}
				    <div id="chapter{{$chapter->id}}" class="collapse" data-parent="#chapters-list">
				      <div class="px-4 py-3">{{$chapter->description}}</div>
				      <div class="px-3 py-2">
				      	<div class="mb-3">
				      	@foreach($chapter->content as $content)
				      	
					      	<div class="d-flex align-items-center justify-content-between bg-light mb-1 px-3 py-2">
						      	<p class="m-0">
						      		<small><strong>{{strtoupper($content->type)}}</strong> | {{$content->name}}</small>
						      	</p>
						      	@if($content->duration)
						      	<p class="text-muted m-0 px-2 py-1">
						      		<small><i class="fas fa-stopwatch opacity-4 mr-2"></i>{{secondsToTime($content->duration)}}</small>
						      	</p>
						      	@endif
						    </div>
						
				      	@endforeach
						</div>
						
			    		@if ($chapter->supportingMaterials()->exists())
					    <div class="p-2">
					    	<p class="text-muted mb-1"><strong>{{$chapter->supportingMaterials->count()}} {{str_plural('download', $chapter->supportingMaterials->count())}}</strong></p>
					    	<ul class="list-style-none pl-2">
					    		@foreach($chapter->supportingMaterials as $material)
					    		<li><small><i class="far fa-file-alt mr-2"></i>{{$material->fullName}}</small></li>
					    		@endforeach
					    	</ul>
					    </div>
					    @endif

				      	<p class="text-center">
				      		<small>This chapter has a total of <strong>{{convertToTimeString($chapter->duration())}}</strong></small>
				      	</p>
				      </div>
				    </div>
				  </div>
			  	@endforeach
			</div>
		</div>
		<div class="my-5 pt-4 text-center">
			@if(auth()->check() && auth()->user()->hasPurchased($course))
			<a href="{{route('courses.view', $course->slug)}}" class="btn-bold mobile-block btn-red">View Course</a>
			@else
			<a href="{{route('courses.purchase', $course->slug)}}" class="btn-bold mobile-block btn-red">Purchase this course - {{priceToCurrency('usd', $course->cost)}}</a>
			@endif
		</div>
	</div>
</div>
