@extends('layouts/app')

@section('content')
<div class="container-fluid">
    @include('components/sections/lead', ['image' => 'contact'])
    @include('pages/user/notifications/content')
</div>
@endsection

@section('scripts')
<script type="text/javascript">
function markNotification(action, label, button, message)
{
	$.post("/notifications/"+button.attr('data-id')+"/mark-"+action, function() {
		button.text(label).toggleClass('mark-read').toggleClass('mark-unread');
		message.toggleClass('opacity-4');
	}).fail(function(request, status, error) {
		alert(error);
	});
}

$(document).on('click', '.mark-read', function() {
	markNotification(
		'read',
		'mark as unread',
		$(this), 
		$('.message-'+$(this).attr('data-id'))
	);
});

$(document).on('click', '.mark-unread', function() {
	markNotification(
		'unread',
		'mark as read', 
		$(this), 
		$('.message-'+$(this).attr('data-id'))
	);
});
</script>
@endsection