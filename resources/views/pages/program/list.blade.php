<section id="scroll-mark" class="container-fluid pb-5 mt-4">
	<div class="row">
		<div class="col-lg-8 col-md-10 col-sm-12 col-12 mx-auto">
			@foreach($program->lessons as $lesson)
			<a href="{{$program->lessonPath($lesson)}}" class="link-none">
				<div class="row t-2 link-none align-items-center mt-4 btn-light rounded">
					<div class="col-lg-1 col-md-1 col-sm-1 col-1 p-2 text-center border-right bg-muted rounded-left">
						<h3 class="m-0 text-muted"><strong>{{$loop->iteration}}</strong></h3>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-8 col-9">
						<p class="m-0 text-truncate"><strong>{{$lesson->name}}</strong></p>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-3 col-2 py-2 px-3 text-right rounded-right d-none d-sm-block">
						<span class="text-muted"><i class="far mr-1 fa-clock"></i><strong>{{secondsToTime($lesson->duration)}}</strong></span>
					</div>
				</div>
				<div class="row mt-2 mb-5">
					<div class="col-lg-4 col-md-4 col-sm-4 col-12 bg-full rounded " style="background-image:url({{cloud($lesson->image_path)}}); height: 180px">
						<div class="overlay w-100 h-100 bg-light z-0 rounded"></div>
						<div class="d-flex align-items-center justify-content-center h-100 z-10 position-relative">
							@if(isset($list) && isset($mainLesson) && $mainLesson->slug == $list[$loop->index])
							<i class="fas fa-4x text-muted fa-eye" style="opacity: 0.5"></i>
							@else
								@if(auth()->check() && auth()->user()->completedLessons->contains($lesson))
								    <i class="fas text-success fa-4x fa-check-circle"></i>
								@else
								    <i class="far fa-4x text-red fa-play-circle"></i>
								@endif
								
							@endif
						</div>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-12 py-2 px-4">
						<p class="text-muted text-truncate mb-2"><small>
							@foreach($lesson->categories as $category)
							<span class="badge badge-pill badge-light">{{$category->name}}</span>
							@endforeach
						</small></p>
						<p class="clamp">{{$lesson->description}}</p>
					</div>
				</div>
			</a>
			@endforeach
		</div>
	</div>
</section>
