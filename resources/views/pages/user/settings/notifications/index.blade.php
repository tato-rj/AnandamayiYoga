@extends('layouts/app')

@section('content')
<div class="container-fluid">
    @include('components/sections/lead', ['image' => 'contact'])
    @include('pages/user/settings/notifications/content')
</div>
@endsection

@section('scripts')
<script type="text/javascript">
$('input[type="checkbox"]').on('click', function(event) {
	$button = $(this);
	$url = $button.attr('data-route');
	$method = ($button.is(':checked')) ? 'POST' : 'DELETE';

	$.ajax({
	   url: $url,
	   type: $method,
	   data: {
	      subscription_email: app.user.email
	   },
	   error: function(response) {
        $errors = response.responseJSON.errors.subscription_email;
        showAlert('danger', $errors);
	   },
	   success: function(response) {
	   		showAlert('success', response);
	   }
	});
});

</script>
@endsection