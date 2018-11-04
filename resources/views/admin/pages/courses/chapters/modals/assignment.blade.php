@component('admin/pages/courses/chapters/modals/layout', ['title' => 'assignment', 'chapter' => $chapter])

<form method="POST" action="{{route('admin.courses.chapters.content.create', [$course->slug, $chapter->id])}}">
	@csrf
	<input type="hidden" name="content_type" value="App\Assignment">
	<input type="hidden" name="order" value="{{$chapter->content->count()}}">

	<div class="form-group">
        @input(['lang' => null, 'name' => 'name', 'label' => 'Assignment name', 'value' => old('name')])
	</div>

	<div class="form-group">
        @textarea(['lang' => null, 'name' => 'question', 'label' => 'Assignment\'s question or instruction here', 'value' => old('question')])
	</div>
	
	<div class="text-right">

	@include('components/buttons/spinner', [
	  'classes' => 'btn btn-xs btn-red block-screen-button',
	  'label' => 'Create Assignment'])

	</div>
</form>

@endcomponent