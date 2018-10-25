
<div class="mb-6">	
	@if(auth()->check() && auth()->user()->hasFeedbackFor($model))
	<h4 class="text-center">Thank you for your feedback!</h4>
	<p class="mb-4 text-center lead">Your opinion is very important to us.</p>
	@else
	<h4 class="text-center">Do you love this {{$name}}?</h4>
	<p class="mb-4 text-center lead">Help us improve your experience by letting us know what you think!</p>
	@endif
	<div id="feedback-stars">

		@include('components/icons/stars', ['score' => auth()->check() && auth()->user()->hasFeedbackFor($model) ? auth()->user()->latestFeedbackFor($model)->score : 0])
		
		<div class="mt-4">
			<form method="POST" action="{{route('feedback.store')}}" style="display: none;">
				<div style="max-width: 528px;" class="mx-auto">
					{{csrf_field()}}
					<input type="hidden" name="feedback_score">
					<input type="hidden" name="feedback_email" value="{{auth()->check() ? auth()->user()->email : null}}">
					<input type="hidden" name="feedback_target_id" value="{{$model->id}}">
					<input type="hidden" name="feedback_target_type" value="{{get_class($model)}}">
					<div class="form-group">
						<textarea class="form-control" name="feedback_comment" rows="3" placeholder="Thanks for you feedback! If you want, you can leave us a note here..."></textarea>
					</div>
					<div class="text-right">
						<button type="button" id="cancel" class="btn btn-xs btn-link px-2 link-none">Never mind</button>
						<button type="submit" class="btn-bold btn-xs btn-red">Send my feedback</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>