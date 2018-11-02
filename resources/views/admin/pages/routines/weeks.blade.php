{{-- CREATE LAYOUT FOR THE 4 WEEKS --}}
@foreach(config('routine.weeks') as $weekCount)
	<h5 class="px-3 d-block py-2 cursor-pointer bg-light hover-shadow-light t-2 rounded" 
		style="border-left: 4px solid #3089e2" 
		data-toggle="collapse" 
		data-target="#week-{{$weekCount}}">
		Week {{$weekCount}}
	</h5>
	
	<div class="collapse p-2" 
		id="week-{{$weekCount}}" 
		data-parent="#weeks-accordion">
		{{-- ON EACH WEEK, DISPLAY THE DATES CHOSEN BY THE USER --}}
		@foreach(json_decode($request->schedule) as $schedule)
			<label>
				<span class="lead text-uppercase">{{$request->first_week[$loop->index]->addWeek()->format('D d')}} |</span> 
				<span class="text-red">{{$schedule->time}}</span>
			</label>

			<div class="row schedule-container" 
				data-date="{{$request->first_week[$loop->index]}}" 
				data-time={{$schedule->time}}>
				@if($isNew)
					{{-- INCLUDE DRAG'N DROP WITH THE LEFT PANEL EMPTY --}}
					@include('admin/components/dragndrop/add')
				@else
					{{-- INCLUDE DRAG'N DROP WITH EXISTING LESSONS ON THE LEFT PANEL --}}
				<div class="col-12 edit-control" 
					name="lessons"
					id="schedule-{{$loop->iteration}}-{{$loop->parent->iteration}}"  
					data-date="{{$request->first_week[$loop->index]}}" 
					data-time={{$schedule->time}}>
					@component('components/editing/label', [
		              'title' => 'This day has the following lessons',
		              'id' => "schedule-{$loop->iteration}-{$loop->parent->iteration}",
		              'path' => "/admin/routines/{$request->user->activeRoutine()->id}/schedule"
		            ])
		            @endcomponent
		            <div class="row"> 
						@include('admin/components/dragndrop/edit')
					</div>
				</div>
				@endif
			</div>
		@endforeach
	</div>
@endforeach