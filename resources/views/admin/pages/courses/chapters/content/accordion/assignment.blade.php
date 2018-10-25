{{-- NAME --}}          
<div class="form-group edit-control" id="name-{{$content->id}}" name="name">

	@include('components/editing/label', [
		'title' => 'The name of this assignment is',
		'id' => "name-{$content->id}",
		'path' => route('admin.courses.chapters.content.update', [$course->slug, $chapter->id, str_plural($content->type), $content->id])
		])

	<input type="text" disabled class="form-control" value="{{$content->name}}" name="name" placeholder="Assignment Name" >

</div>

{{-- QUESTION --}}
<div class="form-group edit-control" id="question-{{$content->id}}" name="question">

	@include('components/editing/label', [
	  'title' => 'The question for this assignment is:',
	  'id' => "question-{$content->id}",
	  'path' => route('admin.courses.chapters.content.update', [$course->slug, $chapter->id, 'assignments', $content->id])
	])

	<textarea disabled class="form-control" placeholder="Question" rows="3">{{$content->question}}</textarea>

</div>
{{-- DURATION --}}
<div class="form-group edit-control mb-4" id="duration-{{$content->id}}" name="duration">

	@component('components/editing/label', [
	  'id' => "duration-{$content->id}",
	  'path' => route('admin.courses.chapters.content.update', [$course->slug, $chapter->id, 'assignments', $content->id])
	])
	  @slot('title')
	  The approximate duration of the assignment is <span id="duration-{{"$content->id-$content->type"}}-slider" class="lead text-red">{{$content->duration}}</span> min
	  @endslot
	@endcomponent

	<label class="d-block text-muted"><small></small></label>
	<div class="slidecontainer">
	  <input disabled type="range" min="0" max="180" value="{{$content->duration}}" data-target="#duration-{{"$content->id-$content->type"}}-slider" class="slider duration-slider" id="duration">
	</div>
</div>

