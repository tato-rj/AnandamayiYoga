<div id="scroll-mark" class="row mb-5">
	<div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto">

		@include('pages/course/share', ['date' => "Last updated on {$course->updated_at->toFormattedDateString()}"])

		<div class="my-6">
			<a href="{{route('user.course.discussion.index', $course->slug)}}" class="link-none">
				<h4 class="text-center"><i class="far fa-comments text-red mr-2"></i>Join the Discussion!</h4>
				<p class="m-0 text-center lead">Click to share your questions, thoughts and ideas about this course</p>
			</a>
		</div>

		<div class="mb-6">

		@foreach($course->chapters as $chapter)

			@include('pages/course/show/accordion/layout')

	  	@endforeach

		</div>

		@include('components/feedback/stars', [
			'model' => $course,
			'name' => 'course'])		

	</div>
</div>