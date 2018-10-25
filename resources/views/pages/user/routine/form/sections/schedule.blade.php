<div id="schedule" class="d-flex" style="overflow-x: scroll;">
	@component('pages/user/routine/form/sections/day', [
		'days' => config('routine.weekDays'),
	])
	@endcomponent
</div>
