@component('pages/user/settings/show', ['title' => 'Remove Account'])

<div class="row">
	<div class="col-12">
		<p class="lead">By closing your account, you'll no longer have full access to all our great classes and programs. You'll still be able to log in until your current billing cycle ends.</p>
		<div class="row mt-4">
			<form class="col-lg-8 col-md-10 col-sm-12" method="POST" action="{{route('user.delete')}}">
			{{csrf_field()}}
			<p class="border-bottom"><strong>To help us improve, could you tell us why you want to cancel?</strong></p>
			<div class="form-check mb-2">
			  <input class="form-check-input" type="radio" name="reason" required id="option1" value="I couldn't find the classes I was looking for">
			  <label class="form-check-label" for="option1">
			    I couldn't find the classes I was looking for
			  </label>
			</div>
			<div class="form-check mb-2">
			  <input class="form-check-input" type="radio" name="reason" required id="option2" value="The classes I took didn't meet my needs">
			  <label class="form-check-label" for="option2">
			    The classes I took didn't meet my needs
			  </label>
			</div>
			<div class="form-check mb-2">
			  <input class="form-check-input" type="radio" name="reason" required id="option3" value="I don't have time to commit to the programs right now">
			  <label class="form-check-label" for="option3">
			    I don't have time to commit to the programs right now
			  </label>
			</div>
			<div class="form-check mb-2">
			  <input class="form-check-input" type="radio" name="reason" required id="option4" value="I had technical difficulties with the site">
			  <label class="form-check-label" for="option4">
			    I had technical difficulties with the site
			  </label>
			</div>
			<div class="form-check mb-2">
			  <input class="form-check-input" type="radio" name="reason" required id="option5" value="Other">
			  <label class="form-check-label" for="option5">
			    Other
			  </label>
			</div>
			
			<div class="form-group mt-4">
				<p class="border-bottom"><strong>Do you have any comments?</strong> (optional)</p>
				<label for="comment">We are constantly improving AnandamayiYoga and we appreciate your feedback to help us make it better!</label>
				<textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Write your comment here..."></textarea>
			</div>
			<div class="form-group mt-4">
				<p><strong>Are you sure you want to remove your account?</strong></p>
				<button type="submit" style="white-space: pre-wrap;" class="btn-bold btn-danger">Yes, I want to permanently delete my account</button>
				<p><small class="text-danger">This action cannot be undone</small></p>
			</div>
		</form>		
		</div>

	</div>
</div>

@endcomponent