<div class="p-3">
	<div class="mb-2 shadow position-relative">
		@if(! $course->published)
		@include('pages/course/unpublished')
		@endif
		<a href="{{route('courses.show', $course->slug)}}" class="link-none">
			<div class="row no-gutters">
				<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 bg-full w-100 position-relative d-flex align-items-end" 
				style="background-image:url({{cloud($course->image_path)}}); min-height: 250px">

				</div>
				<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 p-5 position-relative">
					@if(auth()->check() && auth()->user()->hasPurchased($course))
						<div class="absolute-top-right my-2 mx-3">
							<span class="text-muted">
								<small><i>Purchased on {{auth()->user()->datePurchased($course)->toFormattedDateString()}}</i></small>
							</span>
						</div>
					@endif
					<div>
						<h3 class="mb-3"><strong>{{$course->name}}</strong></h3>
						<div class="d-flex flex-wrap align-items-center"> 
							@foreach($course->teachers as $teacher)
							<div class="d-flex align-items-center mr-3 my-1">
								<img src="{{cloud($teacher->image_path)}}" class="rounded-circle" style="width: 40px; height: 40px">
								<p class="mb-0 ml-2 text-muted clamp-1"><small>{{$teacher->name}}</small></p>
							</div>
							@endforeach
						</div>
					</div>
					<div class="mt-4 d-none d-sm-block">
						<p class="text-muted">{{$course->headline}}</p>
					</div>
					<div class="mt-4 pt-4 border-top d-flex flex-wrap align-items-center">
						<div class="">
							<p class="lead m-0"><i class="fas text-red fa-list-ol mr-2"></i>{{$course->chapters()->count()}} CHAPTERS</p>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
</div>