@component('components/modals/layout', [
	'id' => 'confirm-payment',
	'title' => 'My Membership',
	'size' => 'modal-dialog-centered modal-lg'
	])
<div class="modal-body">

	@if(auth()->user()->hasMembership())
	<p>You are about to change your payment method.</p>	
	@else
	<p>Almost there {{auth()->user()->first_name}}! Please review your order below.</p>
	
	@include('components/purchase/summary', ['item' => $item])
	
	<p><strong>You can stop charges at anytime.</strong></p>
	@endif
	<p>Can we confirm?</p>

	<div class="d-flex justify-content-center mt-4">
		@include('components/buttons/spinner', [
			'classes' => 'btn-red block-screen-button',
			'onclick' => '$("#payment-form").submit()',
			'label' => 'Go ahead!'])
			
	</div>
</div>
@endcomponent
