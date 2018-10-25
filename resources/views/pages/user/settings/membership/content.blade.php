@component('pages/user/settings/show', ['title' => 'Membership'])

<div class="container">
	<div class="row align-items-end no-gutters mb-3 border-bottom pb-3">
		<div class="col-lg-3 col-md-3 col-sm-12 col-12">
			<p class="lead m-0">STATUS</p>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-12">
			@if(auth()->user()->isOnTrial())
			<p class="m-0 text-warning"><small>On trial</small></p>
			@elseif(auth()->user()->hasMembership())
			<p class="m-0 text-success"><small>Your account is Active!</small></p>
			@elseif(auth()->user()->isOnGracePeriod())
			<p class="m-0 text-success"><small>Your account remains active until {{auth()->user()->membership->subscription_ends_at->toFormattedDateString()}}</small></p>
			@else
			<p class="m-0 text-danger"><small>Inactive</small></p>
			@endif
			<div class=" my-3 d-block d-sm-none"></div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-12 text-right">
			@if(auth()->user()->isOnGracePeriod())
			<form id="resume-membership" method="POST" action="/membership/resume">
				{{csrf_field()}}
				<input type="hidden" name="user_id" value="{{auth()->user()->id}}">
				@component('components/snippets/buttons/spinner', [
					'classes' => 'btn-sm btn-yellow block-screen-button mobile-block',
					'onclick' => '$("#resume-membership").submit();'
					])
					Resume my membership
				@endcomponent
			</form>
			@elseif(auth()->user()->hasMembership())
			<form id="stop-membership" method="POST" action="/membership">
				{{csrf_field()}}
				{{method_field('DELETE')}}
				<input type="hidden" name="user_id" value="{{auth()->user()->id}}">
				@component('components/snippets/buttons/spinner', [
					'classes' => 'btn-sm btn-danger block-screen-button mobile-block',
					'onclick' => '$("#stop-membership").submit();'
					])
					Stop my membership
				@endcomponent
			</form>		
			@else
			<a href="{{route('user.settings.payment')}}" class="btn-bold btn-sm btn-success mobile-block">Activate now</a>
			@endif
		</div>
	</div>

	<div class="row align-items-end no-gutters mb-3 border-bottom pb-3">
		<div class="col-lg-3 col-md-3 col-sm-12 col-12">
			<p class="lead m-0">PAYMENT</p>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-12">
			@if(! auth()->user()->hasMembership())
			<p class="text-muted m-0"><small>No card on file</small></p>
			@else
			<p class="m-0">
				<small>Using your 
					<strong>{{auth()->user()->membership->card_brand}}</strong> ending with {{auth()->user()->membership->card_last_four}}
				</small>
			</p>
			@endif
			<div class=" my-3 d-block d-sm-none"></div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-12 text-right">
			@if(auth()->user()->hasMembership())
			<a href="{{route('user.settings.payment')}}" class="link-blue"><i class="far fa-credit-card mr-2"></i>Change card</a>
			@endif
		</div>
	</div>

	<div class="row align-items-end no-gutters mb-3 border-bottom pb-3">
		<div class="col-lg-3 col-md-3 col-sm-12 col-12">
			<p class="lead m-0">INVOICES</p>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-12">
			@if(auth()->user()->hasMembership() && auth()->user()->payments()->exists())
			<p class="m-0"><small><strong>{{auth()->user()->payments->first()->usd}}</strong> paid on {{auth()->user()->payments->first()->created_at->toFormattedDateString()}}</small></p>	
			@elseif(auth()->user()->hasMembership() && !auth()->user()->payments()->exists())
			<p class="text-warning m-0"><small>We're processing your payment</small></p>
			@else
			<p class="text-muted m-0"><small>No recurring charges</small></p>			
			@endif
			<div class=" my-3 d-block d-sm-none"></div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-12 text-right">
			<a href="{{route('user.settings.invoices')}}" class="link-blue"><i class="fas fa-history mr-2"></i>View history</a>
		</div>
	</div>

</div>
@endcomponent