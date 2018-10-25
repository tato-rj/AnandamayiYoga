<div class="row">
    <section class="col-12 h-40vh bg-full d-flex align-items-end" style="background-image:url({{cloud($chapter->course->image_path)}})">
        <div class="overlay w-100 h-100 bg-dark z-0"></div>
		<div class="container">
			<div class="row text-white z-10 w-100">
				<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 mx-auto mt-5">
					<a href="{{route('courses.show', $chapter->course->slug)}}" class="link-none">
						<p class="mb-2"><i class="fas mr-2 fa-long-arrow-alt-left"></i>back to {{$chapter->course->name}}</p>
					</a>
					<h2 class="mb-3"><strong>{{$chapter->name}}</strong>: {{ucfirst($content->type)}}</h2>			
				</div>
			</div>
		</div>
    </section>
</div>