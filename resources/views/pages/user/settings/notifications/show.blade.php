<div class="d-flex align-items-center m-2">
	@include('components/icons/toggle', [
		'list' => ucfirst($subscription),
		'isChecked' => auth()->user()->isSubscribedTo($subscription)])

	<p class="m-0">{{$label}}</p>
</div>