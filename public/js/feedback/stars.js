$('#feedback-stars .fa-star').on('click', function() {
	$star = $(this);
	$form = $('#feedback-stars form');

	$star.prevAll().addClass('fas text-warning').removeClass('far opacity-4 text-muted');
	$star.addClass('fas text-warning').removeClass('far opacity-4 text-muted');
	$star.nextAll().removeClass('fas text-warning').addClass('far opacity-4 text-muted');

	$form.find('input[name="feedback_score"]').val($star.index()+1);
	$form.fadeIn('fast');
});

$('#feedback-stars #cancel').on('click', function() {
	$(this).closest('form').hide();
	$('#feedback-stars .fa-star').addClass('far opacity-4 text-muted').removeClass('fas text-warning');
});
