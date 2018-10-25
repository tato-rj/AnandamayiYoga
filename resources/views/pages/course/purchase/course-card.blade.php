<div class="bg-light rounded px-5 py-4 shadow mb-5 border-thin" style="margin-top: -120px">
	<div class="d-flex justify-content-between align-items-start">
		<div>
			<h3 class="mb-1"><storng>{{$course->name}}</storng></h3>
			<p class="text-muted">with {{$course->teachersList()}}</p>
		</div>
		<div>
			<h3 class="m-0 text-red">{{priceToCurrency('usd', $course->cost)}}</h3>
		</div>
	</div>
	<p>{{$course->headline}}</p>
	<p class="text-right m-0 text-muted">This course takes about <strong>{{convertToTimeString($course->duration())}}</strong> to complete.</p>
</div>