<div id="schedule" class="d-flex mb-4" style="overflow-x: scroll;">
	@component('pages/user/routine/form/sections/day', [
		'days' => config('routine.weekDays'),
	])
	@endcomponent
</div>
