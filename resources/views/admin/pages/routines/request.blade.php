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
					<label class=" m-0"><small><strong>Gender</strong></small></label>
					<p>{{ucfirst($request->user->gender)}}</p>
				</div>

				<div class="mx-2">
					<label class=" m-0"><small><strong>Yoga level</strong></small></label>
					<p>{{$request->user->level ? $request->user->level->name : '-'}}</p>
				</div>

				<div class="mx-2">
					<label class=" m-0"><small><strong>Requested on</strong></small></label>
					<p>{{$request->created_at->toFormattedDateString()}}</p>
				</div>
			</div>
		</div>
		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 p-4">
			<div class="mb-4">
				<label><small><strong>I would like to practice {{count(json_decode($request->schedule))}} {{str_plural('day', count(json_decode($request->schedule)))}} a week</strong></small></label>
				<div class="d-flex flex-wrap">
					@foreach(json_decode($request->schedule) as $schedule)
					<div class="border rounded m-1">
						<div class="bg-light py-2 px-3"><p class="lead m-0">{{weekDay($schedule->day)}}</p></div>
						<div class="py-2 px-3"><p class="m-0 text-red"><small><strong>{{$schedule->duration}} min</strong> in the {{$schedule->time}}</small></p></div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="">
				<label><small><strong>The questionaire</strong></small></label>
				<div class="p-2" style="max-height: 400px; overflow-y: scroll;">
					@foreach($request->questions as $question)
					<div class="bg-light rounded px-3 py-2 mb-2">
						<div class="border-bottom mb-2 pb-2">
							<div class="text-muted"><small><span class="mr-2 text-blue"><strong>Q</strong></span>{{$question}}</small></div>
						</div>
						<div class="">
							<span class="mr-2 text-red"><small><strong>A</strong></small></span>{{$request->answers[$loop->index]}}
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>	
</div>