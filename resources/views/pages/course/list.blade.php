<section id="scroll-mark" class="container-fluid mt-5 py-4">
	<div class="row">
		<div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto">
			@foreach($courses as $course)
				@include('pages/course/card', ['course' => $course])
			@endforeach
		</div>
	</div>
</section>