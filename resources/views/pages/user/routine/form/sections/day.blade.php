@foreach($days as $day)
	<div class="m-1 text-center flex-grow-1">
		<button class="btn btn-light text-muted btn-block animated p-4 schedule-day" data-name="{{$loop->index}}" style="border: 1px solid transparent">
			<strong>@lang($day)</strong>
		</button>
		<div class="schedule-times mt-2" style="display: none">
			<button class="btn time btn-light btn-block p-2" data-name="morning" style="border: 1px solid transparent">
				@lang('morning')
			</button>
			<button class="btn time btn-light btn-block p-2" data-name="afternoon" style="border: 1px solid transparent">
				@lang('afternoon')
			</button>
			<button class="btn time btn-light btn-block p-2" data-name="evening" style="border: 1px solid transparent">
				@lang('evening')
			</button>
			<div class="duration btn-block bg-light rounded" style="border: 2px solid transparent">
				<span class="border-bottom p-1 text-muted" style="font-size: .6em"><small><strong><i class="fas fa-stopwatch mr-1"></i>@lang('DURATION')</strong></small></span>
				<div class="p-2 d-flex">
					<div class="cursor-pointer sub-time"><i class="fas fa-minus-circle text-red"></i></div>
					<div class="flex-grow-1 text-center time-container">
						<span class="d-block text-red"><strong class="time">5</strong></span>
					</div>
					<div class="cursor-pointer add-time"><i class="fas fa-plus-circle text-red"></i></div>
				</div>
			</div>
		</div>
	</div>
@endforeach