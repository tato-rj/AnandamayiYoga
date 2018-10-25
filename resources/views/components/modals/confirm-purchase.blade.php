@component('components/modals/layout', [
	'id' => 'confirm-purchase',
	'title' => 'Purchase course',
	'size' => 'modal-dialog-centered modal-lg'
	])
<div class="modal-body">

	<p>Almost done! Please review your order.</p>

	@include('components/purchase/summary', ['item' => $item])

	<p class="m-0">We'll send you an email with your invoice.</p>
	<p>Can we confirm?</p>

	<div class="d-flex justify-content-center mt-4">
		@include('components/buttons/spinner', [
			'classes' => 'btn-red block-screen-button',
			'onclick' => '$("#payment-form").submit()',
			'label' => 'Go ahead!'])

	</div>
</div>
@endcomponent
