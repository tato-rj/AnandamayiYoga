<div class="d-flex justify-content-between">
	@if(! $first)
	<button class="btn-bold btn-xs btn-blue btn-prev"><i class="fas fa-caret-left mr-2"></i>@lang('Previous')</button>
	@endif

	<button class="btn-bold btn-xs btn-blue btn-next ml-auto" disabled>@lang('Next')<i class="fas fa-caret-right ml-2"></i></button>
</div>