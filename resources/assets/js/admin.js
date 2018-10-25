require('./bootstrap');
require('./jquerysession');
require('./components/functions');
require('./components/notifications');
require('./components/charts');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': app.csrfToken
    }
});

jQuery.fn.toggleAttr = function(attr) {
	return this.each(function() {
		var $this = $(this);
		$this.attr(attr) ? $this.removeAttr(attr) : $this.attr(attr, attr);
	});
};

$('.spinner-button').disableOnClick();

$('.block-screen-button').blockScreenOnClick();

$('.select-class').on('click', function() {
	$button = $(this);

	if ($button.hasClass('unique')) {
		$button.siblings('.unique').removeClass('bounce-to-right-active');
		$button.addClass('bounce-to-right-active');
	} else {
		$button.toggleClass('bounce-to-right-active');
	}
});
