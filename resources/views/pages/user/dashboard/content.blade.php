<section class="container pb-5">
	@firstLogin
		@include('components/modals/welcome')
	@endfirstLogin
	
	@if(auth()->user()->isOnTrial())
	<div class="text-center">
		@component('components/alerts/dashboard')
			@slot('button')

            @include('components/buttons/simple', [
                'path' => route('user.settings.payment'),
                'label' => __('Activate my account'),
                'color' => 'yellow', 
                'size' => 'xs',
                'weight' => 'bold',
                'extra' => 'mobile-block'])

			@endslot
			@lang('Your free trial expires in') {{auth()->user()->trial_ends_at->diffForHumans()}}
		@endcomponent
	</div>
	@elseif(auth()->user()->isOnGracePeriod())
	<div class="text-center">
		@component('components/alerts/dashboard')
			@slot('button')
			<form id="resume-membership" class="ml-3" method="POST" action="/membership/resume">
				{{csrf_field()}}
				<input type="hidden" name="user_id" value="{{auth()->user()->id}}">
				
				@include('components/buttons/spinner', [
					'classes' => 'btn-sm btn-yellow btn-mobile-block',
					'onclick' => '$("#resume-membership").submit();',
					'label' => __('Resume my membership')])
					
			</form>
			@endslot
			@lang('We\'re sorry to see you leaving! Your account will remain active until') {{auth()->user()->membership->subscription_ends_at->toFormattedDateString()}}
		@endcomponent
	</div>
	@elseif(auth()->user()->lastChargeFailed())
	<div class="text-center">
		@component('components/alerts/dashboard', ['style' => 'danger'])
			@slot('button')

				<div class="ml-3"> 
	            @include('components/buttons/simple', [
	                'path' => route('user.settings.payment'),
	                'label' => __('Update my card'),
	                'color' => 'danger', 
	                'size' => 'xs',
	                'weight' => 'bold',
	                'extra' => 'mobile-block'])
	            </div>

			@endslot
			@lang('Your payment from') {{auth()->user()->payments()->latest()->first()->created_at->toFormattedDateString()}} @lang('has failed. Please update your card to avoid losing your membership!')
		@endcomponent
	</div>	
	@endif

	@if(in_array('routine', $show))
	@include('pages/user/dashboard/sections/routine')
	@endif

	@if(in_array('recommended', $show))
	@include('pages/user/dashboard/sections/recommended')
	@endif

	@if(in_array('favorites', $show))
	@include('pages/user/dashboard/sections/favorite-classes')
	@endif

	@if(in_array('favorites', $show))
	@include('pages/user/dashboard/sections/favorite-programs')
	@endif

	@if(in_array('favorites', $show))
	@include('pages/user/dashboard/sections/favorite-asanas')
	@endif

	@if(in_array('progress', $show))
	@include('pages/user/dashboard/sections/progress')
	@endif

	@if(in_array('courses', $show))
	@include('pages/user/dashboard/sections/courses')
	@endif
</section>
