<div class="container-fluid mb-4">
	<div class="row no-gutters">
		<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
			<div class="shadow rounded bg-light p-3 m-2">
				<img src="{{$request->user->avatar()}}" class="rounded-circle w-100 mx-auto m-3">
				<div class="mx-2">
					<label class=" m-0"><small><strong>Full name</strong></small></label>
					<p>{{$request->user->fullName}}</p>
				</div>

				<div class="mx-2">
					<label class=" m-0"><small><strong>Age group</strong></small></label>
					<p>{{$request->age}}</p>
				</div>

				<div class="mx-2">
					<label class=" m-0"><small><strong>Yoga level</strong></small></label>
					<p>{{$request->level}}</p>
				</div>

				<div class="mx-2">
					<label class=" m-0"><small><strong>Requested on</strong></small></label>
					<p>{{$request->created_at->toFormattedDateString()}}</p>
				</div>
			</div>
		</div>
		<div class="col-lg-9 col-md-6 col-sm-12 col-xs-12 m-2">
			<div class="m-2 border-bottom pb-4">
				<label><small><strong>I would like to practice {{count(json_decode($request->schedule))}} {{str_plural('day', count(json_decode($request->schedule)))}} a week</strong></small></label>
				<div class="d-flex">
					@foreach(json_decode($request->schedule) as $schedule)
					<div class="border rounded m-1">
						<div class="bg-light py-2 px-3"><p class="lead m-0">{{weekDay($schedule->day)}}</p></div>
						<div class="py-2 px-3"><p class="m-0 text-red">{{$schedule->time}}</p></div>
					</div>
					@endforeach
				</div>
			</div>

			<div class="row m-2 border-bottom pb-2 no-gutters">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p-2">
					<div class="mb-3">
						<label><small><strong>The duration is</strong></small></label>
						<p class="m-0">{{$request->duration}}</p>
					</div>
					<div class="mb-3">
						<label><small><strong>My lifestyle is</strong></small></label>
						<p class="m-0">{{$request->lifestyle}}</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p-2">
					<label><small><strong>My preferred styles are</strong></small></label>
					@foreach(json_decode($request->categories) as $category)
					<p class="m-0">{{$category}}</p>
					@endforeach
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p-2">
					<label><small><strong>Activities I like</strong></small></label>
					@foreach(json_decode($request->practice) as $activity)
					<p class="m-0">{{$activity}}</p>
					@endforeach
				</div>
			</div>
			<div class="row p-2 no-gutters">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p-2">
					<label><small><strong>Physical goals</strong></small></label>
					@if(json_decode($request->physical))
					@foreach(json_decode($request->physical) as $goal)
					<p class="m-0">{{$goal}}</p>
					@endforeach
					@else
					<p class="m-0 text-muted"><small>Nothing to show</small></p>
					@endif
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p-2">
					<label><small><strong>Mental goals</strong></small></label>
					@if(json_decode($request->mental))
					@foreach(json_decode($request->mental) as $goal)
					<p class="m-0">{{$goal}}</p>
					@endforeach
					@else
					<p class="m-0 text-muted"><small>Nothing to show</small></p>
					@endif
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p-2">
					<label><small><strong>Spiritual goals</strong></small></label>
					@if(json_decode($request->spiritual))
					@foreach(json_decode($request->spiritual) as $goal)
					<p class="m-0">{{$goal}}</p>
					@endforeach
					@else
					<p class="m-0 text-muted"><small>Nothing to show</small></p>
					@endif
				</div>
			</div>
		</div>
	</div>	
</div>