@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('pages/program/lesson/lead')
    
    @include('pages/program/lesson/content')
    
    @include('pages/program/list')

    @include('components/disqus/show')

	@include('components/feedback/fixed-box')

</div>
@endsection

@section('scripts')

<script type="text/javascript">
var video = videojs('lesson').ready(function(){
var player = this;
var route = player.getAttribute('data-url');
var $pauseScreen = $('#paused');
var $completedScreen = $('#completed');

	player.on('pause', function() {
		if (!player.seeking() && !player.ended()) {
			remainingTime = player.controlBar.remainingTimeDisplay.formattedTime_;
			$('#remainingTime').text(remainingTime.match("-(.*):")[1]);

			$pauseScreen.addClass('d-flex').fadeIn('fast');

			$pauseScreen.on('click', function(event) {
				if(! $(event.target).hasClass('btn')){
					$pauseScreen.fadeOut('fast', function() {
						$pauseScreen.removeClass('d-flex')
					});
					player.play();
				}
			});

			$pauseScreen.find('button').on('click', function() {
				$(this).parent().hide();

				if ($(this).hasClass('done')) {
					console.log('Send feedback via AJAX now.');
					$('#feedback-thanks').show();
				} else if ($(this).hasClass('negative')) {
					$('#feedback-more').show();
				}
			});
		}

	});

  player.on('ended', function() {
	$.post(route, function() {
		console.log('This lesson has been saved into your list of completed lessons.');
	}).fail(function(request, status, error) {
		console.log(error);
	}).always(function() {
		$('#completed').fadeIn('fast');
	});
  });
});
</script>

<script type="text/javascript">
var clampText = document.getElementsByClassName("clamp");

for (var i = 0; i < clampText.length; i++) {
	$clamp(clampText[i], {clamp: '150px'});
}

</script>

<script type="text/javascript">
$('.fa-heart').on('click', function() {
	$icon = $(this);
	$favorited_id = $icon.attr('data-favorited_id');
	$favorited_type = $icon.attr('data-favorited_type');
	$urlStore = $icon.attr('data-url-store');
	$urlDestroy = $icon.attr('data-url-destroy');

	if ($icon.hasClass('far')) {
		$.post($urlStore, {favorited_id: $favorited_id, favorited_type: $favorited_type}, function() {
			$icon.removeClass('far swing').addClass('rubberBand fas');
		}).fail(function(request, status, error) {
			alert(error);
		});
	} else if ($icon.hasClass('fas')) {

		$.ajax({
			url: $urlDestroy,
			method: 'DELETE',
			data: {
				favorited_id: $favorited_id, 
				favorited_type: $favorited_type
			},
			success: function(result) {
				$icon.addClass('far swing').removeClass('rubberBand fas');
			},
			fail: function(request, status, error) {
				alert(error);
			}
		});	
	}
});

</script>
<script>
/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://anandamayiyoga.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
@endsection