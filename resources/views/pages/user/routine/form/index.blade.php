@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @component('components/sections/lead', ['image' => 'contact'])
	    @slot('extra')
	    <img id="scroll-mark" src="{{cloud($teacher->image_path)}}" class="rounded-circle mb-2 mx-auto d-block lead-profile-image">
	    @endslot
    @endcomponent
    
    @include('pages/user/routine/form/content')

</div>
@endsection

@section('scripts')
<script type="text/javascript">
$('.schedule-day').on('click', function() {
	$dayButton = $(this);
	$buttonIsSelected = $dayButton.hasClass('btn-red');
	$('.schedule-day').removeClass('shake');

		$dayButton.toggleClass('btn-light text-muted btn-red');

		if ($buttonIsSelected) {
			$dayButton.siblings('.schedule-times').hide().children().removeClass('btn-red').addClass('btn-light');

			updateSchedule();
		} else {
			$dayButton.siblings('.schedule-times').show();
		}

	// if ($('#schedule .btn-red').not('.time').length < 3 || $buttonIsSelected) {
	// 	$dayButton.toggleClass('btn-light text-muted btn-red');

	// 	if ($buttonIsSelected) {
	// 		$dayButton.siblings('.schedule-times').hide().children().removeClass('btn-red').addClass('btn-light');

	// 		updateSchedule();
	// 	} else {
	// 		$dayButton.siblings('.schedule-times').show();
	// 	}
		
	// } else {
	// 	$dayButton.addClass('shake');
	// }
});

$('.schedule-times button').on('click', function() {
	$(this).siblings().removeClass('btn-red').addClass('btn-light');
	$(this).toggleClass('btn-light btn-red');

	updateSchedule();
});

function updateSchedule()
{
	let schedule = [];
	let save = false;
	$('.schedule-day').each(function($day) {
		if ($(this).hasClass('btn-red')) {
			let day = $(this).attr('data-name');
			let time = $(this).siblings('.schedule-times').find('.btn-red').attr('data-name');
			let duration = $(this).siblings('.schedule-times').find('.duration .time').text();

			if (time != null) {
				schedule.push({
					"day": day,
					"time": time,
					"duration": duration
				});
				
				save = true;			
			}

		}
	});

	if (save) {
		schedule = JSON.stringify(schedule);

		console.log('New schedule: '+schedule);
		
		$('input[name="schedule"]').val(schedule);	
	}

}
</script>
<script type="text/javascript">
$('#routine-form textarea').on('keyup', function() {
	$textarea = $(this);
	$nextBtn = $textarea.closest('.carousel-item').find('.btn-next');
	if ($textarea.val() == '') {
		$nextBtn.prop('disabled', true);
	} else {
		$nextBtn.prop('disabled', false);		
	}
});
</script>
<script type="text/javascript">
let progressTotal = $('.carousel-item').length;
$('.progress-bar').css('width', 100/progressTotal + '%');

$('#routine-form button').on('click', function(event) {
	event.preventDefault();
	$button = $(this);

	if ($button.hasClass('btn-prev')) {
		$('#questions-carousel').carousel('prev');
	} else if ($button.hasClass('btn-next')) {
		$('#questions-carousel').carousel('next');
	}
});

$('#questions-review').on('click', function() {
	$('#questions-carousel').carousel(0);
});

$('#questions-carousel').on('slid.bs.carousel', function () {
	let stage = $(this).find('.active').index() + 1;
	let completed = stage*100/progressTotal;

  	$('.progress-bar').css('width', completed + '%');
})
</script>
<script type="text/javascript">
$('.add-time').on('click', function() {
	let $timeElement = $(this).siblings('.time-container').find('.time');
	let time = parseInt($timeElement.text());

	if (time < 60) {
		$(this).siblings('.time-container').find('.time').text(time + 5);
	}
	updateSchedule();
});

$('.sub-time').on('click', function() {
	let $timeElement = $(this).siblings('.time-container').find('.time');
	let time = parseInt($timeElement.text());

	if (time > 5) {
		$(this).siblings('.time-container').find('.time').text(time - 5);
	}
	updateSchedule();
});
</script>
@endsection