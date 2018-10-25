@component('pages/user/settings/show', ['title' => 'Payment Information'])

<div class="row">
	<div class="col-12 mb-4">
		<p class="lead">Thank you for signing up! We've got all your information saved but we just need your credit card to start your subscription of <strong>$15/month</strong>.</p>
	</div>

	@if(auth()->user()->isOnGracePeriod())
		<div class="col-12">
			<div class="text-center">
				<div class="alert alert-warning text-center d-inline-flex align-items-center" role="alert">
					<i class="fas fa-exclamation-triangle mr-2"></i>Your account is set to cancel on {{auth()->user()->membership->subscription_ends_at->toFormattedDateString()}}
					<form id="resume-membership" class="ml-3" method="POST" action="{{route('user.membership.resume')}}">
						{{csrf_field()}}
						<input type="hidden" name="user_id" value="{{auth()->user()->id}}">
						
						@include('components/buttons/spinner', [
							'classes' => 'btn-sm btn-yellow spinner-button',
							'onclick' => '$("#resume-membership").submit();',
							'label' => 'Resume my membership'])
							
					</form>
				</div>
			</div>
		</div>
	@else
		</div>
		<div class="row">
		<div class="col-lg-6 col-md-7 col-sm-12 col-xs-12 p-4">

			@if(auth()->user()->hasMembership())
			
				<div class="alert alert-success" role="alert">
					<i class="fas fa-check-circle mr-2"></i>We're using your 
					<strong>{{auth()->user()->membership->card_brand}}</strong>
					ending with {{auth()->user()->membership->card_last_four}}
				</div>

				<div class="custom-control custom-radio mb-2">
				  <input type="radio" id="same-card" name="select-card" checked class="custom-control-input">
				  <label class="custom-control-label" for="same-card">Keep using the card on file</label>
				</div>
				<div class="custom-control custom-radio mb-4">
				  <input type="radio" id="change-card" name="select-card" class="custom-control-input">
				  <label class="custom-control-label" for="change-card">Change my payment method</label>
				</div>
			@else
			
				<div class="alert alert-warning" role="alert">No card on file</div>
			
			@endif

			<div id="form-container" 
				@if(auth()->user()->hasMembership())style="display: none;"
				@endif>
				@include('components/stripe/form', ['email' => auth()->user()->email])			
				
				<p class="text-muted mt-4">
					<small>Nulla erat nibh, consequat ut porttitor nec, posuere eget nisi. Pellentesque <a href="" class="link-blue">mollis</a> erat vitae vestibulum scelerisque. Cras scelerisque commodo est, sed <a href="" class="link-blue">semper massa</a>.</small>
				</p>
			</div>

		</div>

		<div class="col-lg-6 col-md-5 col-sm-12 col-xs-12 p-4">
			<p class="text-muted border-bottom"><strong>We accept all major debit and credit cards</strong></p>
			@include('components/icons/credit-cards')
		</div>
	@endif

</div>

@include('components/modals/confirm-payment', ['item' => $membershipPlan])
@endcomponent