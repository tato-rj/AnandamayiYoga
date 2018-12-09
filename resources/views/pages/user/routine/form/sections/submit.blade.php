<div class="text-center mt-4">
	<p class="lead">@lang('ALL SET!')</p>
	<p class="text-muted">@lang('After your schedule is complete, we will follow up with your progress to make sure you love it') :)</p> 

	@include('components/buttons/spinner', [
	'classes' => 'btn-red mt-4 block-screen-button',
	'label' => __('Prepare my Yoga routine')])

    <div class="mt-4 text-center">
      <span class="text-blue cursor-pointer" id="questions-review"><i class="fas fa-redo-alt mr-2"></i>@lang('Review questionaire')</span>
    </div>
</div>