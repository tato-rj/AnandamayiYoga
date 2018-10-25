<div class="row">
	<section class="col-12 bg-full" style="background-image:url({{cloud($course->image_path)}});">
		<div class="overlay w-100 h-100 bg-dark z-0"></div>
		<div class="text-white z-10 row align-items-center justify-content-center h-100 mt-5 py-5">
			<div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto mt-5">
				<div>
					<p>
						<a href="{{route('courses.index')}}" class="link-none">
							<i class="fas mr-2 fa-long-arrow-alt-left"></i>back to our courses
						</a>
					</p>
					<h1 class="display-4"><strong>{{$course->name}}</strong></h1>
					<p class="lead"><small>with {{$course->teachersList()}}</small></p>
				</div>
				<div class="mb-4">
					<p class="lead">{{$course->headline}}</p>
				</div>
			</div>

			<div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto my-4">
				<div class="d-flex flex-wrap align-items-center justify-content-between">
					<div class="align-items-center mb-4 d-none d-sm-flex">
						<div class="d-flex justify-content-center flex-column align-items-center mx-3">
							<i class="far fa-2x mr-1 fa-clock"></i>
							<p class="lead mt-2">{{convertToTimeString($course->duration(), $format = "%d:%d hs")}}</p>
						</div>
						<div class="d-flex justify-content-center flex-column align-items-center mx-3">
							<i class="fas fa-2x mr-1 fa-list"></i>
							<p class="lead mt-2">{{$course->chapters()->count()}} chapters</p>
						</div>
						<div class="d-flex justify-content-center flex-column align-items-center mx-3">
							@auth
								<i class="fas fa-calendar-check fa-2x mr-1"></i>
								<p class="lead mt-2">{{$course->progress()}}% complete</p>
							@endauth
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
</div>