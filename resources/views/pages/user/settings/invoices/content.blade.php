@component('pages/user/settings/show', ['title' => 'Invoices'])

@if(auth()->user()->hasMembership() && ! auth()->user()->payments()->exists())
	<div class="alert alert-warning text-center mb-4">
		<p class="m-0">We're processing your payment.</p>
	</div>
@elseif(auth()->user()->payments()->exists())
	@if(auth()->user()->hasMembership())
	<div class="alert alert-success text-center mb-4">
		<p class="m-0">Your next payment of <strong>{{$upcomingPayment}}</strong> is scheduled for <strong>{{auth()->user()->membershipPayments->first()->created_at->addMonth()->toFormattedDateString()}}</strong></p>	
	</div>
	@else
	<div class="alert alert-warning text-center mb-4">
		<p class="m-0">Your membership isn't active, so you have <strong>no upcoming payments</strong></p>
	</div>
	@endif
	@include('components/invoices/layout', ['user' => auth()->user()])
@else
<div class="bg-light rounded p-3 text-center mb-4">
	<p class="m-0">There are no payments to show</p>
</div>
@endif

@endcomponent