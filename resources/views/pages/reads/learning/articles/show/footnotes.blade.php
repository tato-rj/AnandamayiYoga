<div class="mt-4 pt-4 border-top">
	<p class="text-muted">References</p>
	@foreach($notes as $note)
	<p class="mb-1 text-muted"><small><sup class="mr-2">{{$loop->iteration}}</sup>{{$note}}</small></p>
	@endforeach
</div>