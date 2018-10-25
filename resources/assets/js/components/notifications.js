$('.notifications-item').on('click', function() {
	$notification = $(this);

	$guard = $notification.attr('data-guard');

	$notificationIn = $notification.attr('data-id');
	
	$.post($guard+"/notifications/"+$notificationIn+"/mark-read", function() {
		// Maked successfully!
	}).fail(function(request, status, error) {
		console.log(error);
	});
});  