{{-- NAME --}}          
<div class="form-group edit-control" id="name-{{$content->id}}" name="name">

	@include('components/editing/label', [
	  'title' => 'The name of this quiz is',
	  'id' => "name-{$content->id}",
	  'path' => route('admin.courses.chapters.content.update', [$course->slug, $chapter->id, str_plural($content->type), $content->id])
	])

	<input type="text" disabled class="form-control" value="{{$content->name}}" name="name" placeholder="Quiz Name" >

</div>
{{-- DURATION --}}
<div class="form-group edit-control" id="duration-{{"$content->id-$content->type"}}" name="duration">

	@component('components/editing/label', [
	  'id' => "duration-{$content->id}-{$content->type}",
	  'path' => route('admin.courses.chapters.content.update', [$course->slug, $chapter->id, str_plural($content->type), $content->id])
	])
	  @slot('title')
	  The approximate duration of the quiz is <span id="duration-{{"$content->id-$content->type"}}-slider" class="lead text-red">{{$content->duration}}</span> min
	  @endslot
	@endcomponent

	<label class="d-block text-muted"><small></small></label>
	<div class="slidecontainer">
	  <input disabled type="range" min="0" max="180" value="{{$content->duration}}" data-target="#duration-{{"$content->id-$content->type"}}-slider" class="slider duration-slider" id="duration">
	</div>
</div>

{{-- QUESTIONS --}}
<div>
	<form method="POST" action="{{route('admin.courses.chapters.quiz.update', [$course->slug, $chapter->id, $content->id])}}"> 
	{{csrf_field()}}
	{{method_field('PATCH')}}

	@foreach(unserialize($content->content) as $quiz)
		
		<div class="border rounded px-4 pb-3 pt-4 mb-2 quiz-questions">

			<div class="form-group">
				<div class="input-group input-group-sm">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-sm">Question</span>
				  </div>
				  <input type="text" name="content[{{$loop->index}}][question]" value="{{$quiz['question']}}" class="form-control">
				</div>
			</div>

			<ol class="mb-2">
				<li class="mb-2 pl-2">
					<div class="input-group input-group-sm">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="inputGroup-sizing-sm">Answer</span>
					  </div>
					  <input type="text" name="content[{{$loop->index}}][answers][options][0]" value="{{$quiz['answers']['options'][0]}}" class="form-control">
					  <div class="input-group-append">
					    <span class="input-group-text p-2">
					    	<input type="checkbox" title="Check if this answer is correct" name="content[{{$loop->index}}][answers][correct][0]" {{array_key_exists(0, $quiz['answers']['correct']) ? 'checked' : null}}>
					    </span>
					  </div>
					</div>
				</li>
				<li class="mb-2 pl-2">
					<div class="input-group input-group-sm">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="inputGroup-sizing-sm">Answer</span>
					  </div>
					  <input type="text" name="content[{{$loop->index}}][answers][options][1]" value="{{$quiz['answers']['options'][1]}}" class="form-control">
					  <div class="input-group-append">
					    <span class="input-group-text p-2">
					    	<input type="checkbox" title="Check if this answer is correct" name="content[{{$loop->index}}][answers][correct][1]" {{array_key_exists(1, $quiz['answers']['correct']) ? 'checked' : null}}>
					    </span>
					  </div>
					</div>
				</li>
				<li class="mb-2 pl-2">
					<div class="input-group input-group-sm">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="inputGroup-sizing-sm">Answer</span>
					  </div>
					  <input type="text" name="content[{{$loop->index}}][answers][options][2]" value="{{$quiz['answers']['options'][2]}}" class="form-control">
					  <div class="input-group-append">
					    <span class="input-group-text p-2">
					    	<input type="checkbox" title="Check if this answer is correct" name="content[{{$loop->index}}][answers][correct][2]" {{array_key_exists(2, $quiz['answers']['correct']) ? 'checked' : null}}>
					    </span>
					  </div>
					</div>
				</li>
				<li class="pl-2">
					<div class="input-group input-group-sm">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="inputGroup-sizing-sm">Answer</span>
					  </div>
					  <input type="text" name="content[{{$loop->index}}][answers][options][3]" value="{{$quiz['answers']['options'][3]}}" class="form-control">
					  <div class="input-group-append">
					    <span class="input-group-text p-2">
					    	<input type="checkbox" title="Check if this answer is correct" name="content[{{$loop->index}}][answers][correct][3]" {{array_key_exists(3, $quiz['answers']['correct']) ? 'checked' : null}}>
					    </span>
					  </div>
					</div>
				</li>
			</ol>

			
			<div class="text-right mx-2">
				<a class="remove-field text-danger"><small>Remove question</small></a>
			</div>

		</div>

	@endforeach

	<div class="quiz-container"></div>

	<div class="d-flex justify-content-between p-3">

		<div>
			@include('admin/pages/courses/chapters/content/quiz/layout', ['hidden' => true])

			<a class="add-new-field text-warning cursor-pointer d-block" data-target=".quiz-container">		
				<small><i class="fas fa-plus mr-2"></i>Add a new question</small>
			</a>
		</div>

		<button type="submit" class="border-0 p-0 cursor-pointer link-blue" style="background: none">
			<small><i class="fas fa-save mr-2"></i>Save my changes</small>
		</button>
	</div>
		
	</form>

</div>