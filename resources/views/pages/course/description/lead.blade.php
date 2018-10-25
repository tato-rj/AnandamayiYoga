<div class="row">
	<section class="col-12 bg-full" style="background-image:url({{cloud($course->image_path)}}); height: 100vh">
		<div class="overlay w-100 h-100 bg-dark z-0"></div>
		<div class="text-white z-10 row align-items-center justify-content-center h-100">
			<div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto">
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

				<a href="{{route('courses.purchase', $course->slug)}}" class="btn-bold mobile-block btn-red">Purchase this Course</a>

			</div>
		</div>
	</section>
</div>