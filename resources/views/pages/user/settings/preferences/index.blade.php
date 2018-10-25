@extends('layouts/app')

@section('content')
<div class="container-fluid">
    @include('components/sections/lead', ['image' => 'contact'])
    @include('pages/user/settings/preferences/content')
</div>
@endsection

@section('scripts')
<script type="text/javascript">

$('#preferences-container button').on('click', function() {
	$button = $(this);
	$levelId = $button.attr('data-id');
	$url = $button.attr('data-route');
	$check = $button.find('.fa-check');
	$error = $button.siblings('.select-error')

	$.post($url, function() {
		console.log('Update successful');
		// Request went through. Think about if you want to show the green check or not.
		// $check.fadeIn('fast', function() {
		// 	setTimeout(function() {
		// 		$check.fadeOut();
		// 	},150);
		// });
	}).fail(function(request, status, error) {
		$error.fadeIn();
	});  
});
</script>
@endsection