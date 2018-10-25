@foreach($days as $day)
	<div class="m-1 text-center flex-grow-1">
		<button class="btn btn-light text-muted btn-block animated p-4 schedule-day" data-name="{{$loop->index}}" style="border: 1px solid transparent">
			<strong>{{$day}}</strong>
		</button>
		<div class="schedule-times mt-2" style="display: none">
			<button class="btn time btn-light btn-block p-2" data-name="morning" style="border: 1px solid transparent">
				morning
			</button>
			<button class="btn time btn-light btn-block p-2" data-name="afternoon" style="border: 1px solid transparent">
				afternoon
			</button>
			<button class="btn time btn-light btn-block p-2" data-name="evening" style="border: 1px solid transparent">
				evening
			</button>
		</div>
	</div>
@endforeach