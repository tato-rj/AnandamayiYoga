<div id="fixed-feedback-container" class="d-none d-sm-block">
	<div class="label" style="margin-top: -42px">
		<p class="m-0 bg-red px-3 cursor-pointer shadow py-2 rounded-top text-white"><strong>Feedback</strong></p>
	</div>
	<div class="feedback shadow bg-white px-5 pb-2 pt-4 rounded-left d-none animated-fast">
		<div class="absolute-top-right">
			<i class="cursor-pointer close-button fa-1x fas fa-times-circle text-red" style="font-size: 1.25em"></i>
		</div>
		<div class="thank-you" style="display: none;">
			<p><strong class="text-success">All set!</strong> Thank you for sharing your feedback.</p>
		</div>
		<div class="email" style="display: none;">
			<p>Would you like to receive a follow up?</p>
			<div data-url={{route('feedback.store')}} class="text-right mb-2">
				<input type="email" class="form-control border-0 bg-light mb-2" placeholder="Email">
				<button class="btn btn-link text-muted btn-xs no">No</button>
				<button class="follow-up btn btn-xs btn-warning yes">Yes</button>
			</div>
		</div>
		<div>
			<p>How would you rate your experience?</p>
			<div class="d-flex align-items-center justify-content-center">
				<div value="1" class="text-center mx-2 cursor-pointer t-2 smiley">
					<img src="{{cloud('app/misc/feedback/nervous.svg')}}">
					<p class="feedback_score m-0 text-muted t-2"><small>Hate</small></p>
				</div>
				<div value="2" class="text-center mx-2 cursor-pointer t-2 smiley">
					<img src="{{cloud('app/misc/feedback/sad.svg')}}">
					<p class="feedback_score m-0 text-muted t-2"><small>Dislike</small></p>
				</div>
				<div value="3" class="text-center mx-2 cursor-pointer t-2 smiley">
					<img src="{{cloud('app/misc/feedback/confused.svg')}}">
					<p class="feedback_score m-0 text-muted t-2"><small>It's ok</small></p>
				</div>
				<div value="4" class="text-center mx-2 cursor-pointer t-2 smiley">
					<img src="{{cloud('app/misc/feedback/smile.svg')}}">
					<p class="feedback_score m-0 text-muted t-2"><small>Like</small></p>
				</div>
				<div value="5" class="text-center mx-2 cursor-pointer t-2 smiley">
					<img src="{{cloud('app/misc/feedback/happy.svg')}}">
					<p class="feedback_score m-0 text-muted t-2"><small>Love</small></p>
				</div>
			</div>
			<div class="form text-right mb-2" style="display: none;">
				<input type="hidden" name="feedback_score">
				<input type="hidden" name="feedback_email">
				<textarea name="feedback_comment" class="form-control mb-2 border-0 bg-light"></textarea>
				<button class="btn btn-xs btn-warning">Send</button>
			</div>
		</div>
	</div>
</div>