@component('pages/user/settings/show', ['title' => __('Email Notifications')])

<div>
	<div class="my-4">
		<p class="border-bottom px-2 py-1 rounded"><small><strong>@lang('AnandamayiYoga updates')</strong></small></p>
		@include('pages/user/settings/notifications/show', [
			'subscription' => 'journey',
			'label' => __('I would like to receive emails about features, tips and special announcements')])
		
		@include('pages/user/settings/notifications/show', [
			'subscription' => 'promo',
			'label' => __('I would like to receive emails about special offers and promotions')])
		
	</div>

	<div class="my-4">
		<p class="border-bottom px-2 py-1 rounded"><small><strong>Newsletter</strong></small></p>
		@include('pages/user/settings/notifications/show', [
			'subscription' => 'newsletter',
			'label' => __('I would like to receive news about AnandamayiYoga on the monthly newsletter')])
		
	</div>
</div>
@endcomponent