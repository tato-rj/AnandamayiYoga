@component('pages/user/settings/show', ['title' => 'Email Notifications'])

<div>
	<div class="my-4">
		<p class="border-bottom px-2 py-1 rounded"><small><strong>AnandamayiYoga updates</strong></small></p>
		@include('pages/user/settings/notifications/show', [
			'subscription' => 'journey',
			'label' => 'I would like to receive emails about features, tips and special announcements'])
		
		@include('pages/user/settings/notifications/show', [
			'subscription' => 'promo',
			'label' => 'I would like to receive emails about special offers and promotions'])
		
	</div>

	<div class="my-4">
		<p class="border-bottom px-2 py-1 rounded"><small><strong>Newsletter</strong></small></p>
		@include('pages/user/settings/notifications/show', [
			'subscription' => 'newsletter',
			'label' => 'I would like to receive news about AnandamayiYoga on the monthly newsletter'])
		
	</div>
</div>
@endcomponent