<div class="container py-5">
	<div class="row">
		<div class="col-lg-6 col-md-8 col-sm-10 col-12 mx-auto">
			
			@if(auth()->user()->assignments()->find($content->id))
			<h5 class="mb-4"><strong>Assignment completed!</strong></h5>
			<p>You have completed this assignment on {{auth()->user()->dateCompleted($content)->diffForHumans()}}. Your answer was:</p>

			<div class="mb-4 bg-light px-3 py-2 rounded">
				<p class="text-muted"><i>Q: {{$content->question}}</i></p>

				<p class="m-0"><i>{{auth()->user()->answerTo($content)}}</i></p>
			</div>

			<div class="alert alert-warning" role="alert">We'll post a <strong>feedback</strong> on your results soon. Please stop by later!</div>

			@else
			
			<h5 class="mb-4"><strong>Are you ready to test what you've learned so far?</strong></h5>

			<div class="bg-light px-3 py-2 rounded mb-4 border">
				<p class="mb-1 text-muted">
					<small>QUESTION</small>
				</p>
				<p>{{$content->question}}</p>
			</div>

			<form method="POST" action="{{route('user.course.chapter.answer.submit', [$chapter->course->slug, $chapter->id, 'assignment', $content->id])}}">
				{{csrf_field()}}
				<div class="form-group">
					<textarea class="form-control" rows="8" name="answer" placeholder="Write your answer here..."></textarea>
				</div>

				<button type="submit" class="btn-bold btn-red btn-block">
                    Submit my response
                </button>
			</form>
			@endif

		</div>
	</div>
</div>