@component('admin/pages/courses/chapters/modals/layout', ['title' => 'Quiz', 'chapter' => $chapter])

<form method="POST" action="{{route('admin.courses.chapters.content.create', [$course->slug, $chapter->id])}}">
	{{csrf_field()}}
	<input type="hidden" name="content_type" value="App\Quiz">
	<input type="hidden" name="order" value="{{$chapter->content->count()}}">

	<div class="form-group">
		<input required type="text" class="form-control" name="name" value="" placeholder="Quiz Name">
	</div>

	<div id="new-quiz-questions-{{$chapter->id}}">
		@include('admin/pages/courses/chapters/content/quiz/layout')
	</div>

	<div>

		@include('admin/pages/courses/chapters/content/quiz/layout', ['hidden' => 'yes'])

		<a class="add-new-field text-warning cursor-pointer d-block p-2" data-target="#new-quiz-questions-{{$chapter->id}}">		
			<small><i class="fas fa-plus mr-2"></i>Add a new question</small>
		</a>

	</div>
	
	<div class="text-right">

	@include('components/buttons/spinner', [
	  'classes' => 'btn btn-red block-screen-button',
	  'label' => 'Create Quiz'])

	</div>
</form>

@endcomponent
