<div>
	<span class="text-danger cursor-pointer text-underline delete-sm"><small><i class="far fa-trash-alt mr-1"></i>@lang('delete')</small></span>
</div>
<div style="display: none;">
	<span class="delete-sm mr-2 d-inline cursor-pointer"><small>@lang('cancel')</small></span>
	<form class="d-inline" method="POST" action="{{$path}}">
		{{csrf_field()}}
		{{method_field('DELETE')}}
		{{$inputs ?? null}}
		<button type="submit" class="btn btn-xs btn-danger px-1 py-0" style="margin-top: -3px;">@lang('confirm')</button>
	</form>
</div>