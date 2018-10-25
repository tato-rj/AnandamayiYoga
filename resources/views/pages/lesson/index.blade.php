@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('components/sections/lead', ['image' => 'poses'])

    @include('pages/lesson/content')

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
				$button = $(this);
				$button.parent().hide();

				if ($button.hasClass('positive')) {

					data = {
				        'feedback_score': '5',
				        'feedback_target_id': $button.attr('data-lesson_id'),
				        'feedback_target_type': 'App\\Lesson'
				    };
				
				} else if ($button.hasClass('negative-submit')) {

					data = {
				        'feedback_score': '1',
				        'feedback_comment': $button.val(),
				        'feedback_target_id': $button.attr('data-lesson_id'),
				        'feedback_target_type': 'App\\Lesson'
				    };					
			
				} else if ($button.hasClass('negative')) {
				
					$('#feedback-more').show();
				
				}

				if (typeof data != "undefined") {
				    submitFeedback($button.attr('data-url'), data);
				    $('#feedback-thanks').show();
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
			$completedScreen.fadeIn('fast');
		});
	});
});

</script>

<script type="text/javascript">
var swiper = new Swiper('.swiper-container', {
  spaceBetween: 0,
  slidesPerView: 'auto',
    navigation: {
      nextEl: '.swiper-right',
      prevEl: '.swiper-left',
    },
});
</script>

<script type="text/javascript">
$('.fa-heart').on('click', function() {
	$icon = $(this);
	$label = $('.favorite-label');
	$favorited_id = $icon.attr('data-favorited_id');
	$favorited_type = $icon.attr('data-favorited_type');
	$urlStore = $icon.attr('data-url-store');
	$urlDestroy = $icon.attr('data-url-destroy');

	if ($icon.hasClass('far')) {
		$.post($urlStore, {favorited_id: $favorited_id, favorited_type: $favorited_type}, function() {
			$icon.removeClass('far swing').addClass('rubberBand fas');
			// $label.text('Favorited!');
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
				// $label.text('Add to favorites');
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