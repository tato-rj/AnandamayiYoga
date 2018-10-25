<div id="scroll-mark" class="row mb-5">
	<div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto">
		<div class="text-center my-5">
		<h4 class="text-center m-0"><i class="far fa-comments text-red mr-2"></i>Join the Discussion!</h4>
		<p class="lead m-4">Here you'll find all the discussions on this course. If you have any questions, comments, ideas or thoughts about this course, click on the button below to get started!</p>
			<button type="button" class="btn btn-outline-red" data-toggle="modal" data-target="#add-discussion">
				Start a new discussion
			</button>	
		</div>

		<div class="mb-4">
        @include('components/filters/show', [
            'url' => route('user.course.discussion.index', $course->slug),
            'include' => ['chapters']
        ])
		</div>
		
		<div class="mb-4">
		@foreach($discussions as $discussion)
			@include('pages/course/discussion/content/topic')
	  	@endforeach
		</div>

	    <div class="d-flex align-items-center w-100 justify-content-center">
	    {{ $discussions->links() }}    
	    </div>
	</div>
</div>