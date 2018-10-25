<div class="p-4">
	<div class="d-flex justify-content-between align-items-center mb-4">

		<h5 class="text-muted m-0">
			<strong>We have {{$chapter->discussions()->count()}} {{ str_plural('discussion', $chapter->discussions()->count()) }} about this chapter</strong>
		</h5>

		<div>
			<button type="button" class="btn-bold btn-xs btn-red" data-toggle="modal" data-target="#add-discussion">
				Start a new discussion
			</button>	
		</div>
	</div>
	@foreach($chapter->discussions as $discussion)
		@include('pages/course/discussion/content/topic', ['course' => $chapter->course])
	@endforeach
</div>