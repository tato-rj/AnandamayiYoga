@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('components/sections/lead', ['image' => 'contact'])
    @include('pages/user/routine/form/content')

</div>
@endsection

@section('scripts')
<script type="text/javascript">
$('.schedule-day').on('click', function() {
	$dayButton = $(this);
	$buttonIsSelected = $dayButton.hasClass('btn-red');
	$('.schedule-day').removeClass('shake');

	if ($('#schedule .btn-red').not('.time').length < 3 || $buttonIsSelected) {
		$dayButton.toggleClass('btn-light text-muted btn-red');

		if ($buttonIsSelected) {
			$dayButton.siblings('.schedule-times').hide().children().removeClass('btn-red').addClass('btn-light');

			updateSchedule();
		} else {
			$dayButton.siblings('.schedule-times').show();
		}
		
	} else {
		$dayButton.addClass('shake');
	}
});

$('.schedule-times button').on('click', function() {
	$(this).siblings().removeClass('btn-red').addClass('btn-light');
	$(this).toggleClass('btn-light btn-red');

	updateSchedule();
});

function updateSchedule()
{
	var schedule = [];
	var save = false;
	$('.schedule-day').each(function($day) {
		if ($(this).hasClass('btn-red')) {
			$day = $(this).attr('data-name');
			$time = $(this).siblings('.schedule-times').find('.btn-red').attr('data-name');

			if ($time != null) {
				schedule.push({
					"day": $day,
					"time": $time
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
@endsection