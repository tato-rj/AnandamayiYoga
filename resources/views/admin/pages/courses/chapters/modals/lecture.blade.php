@component('admin/pages/courses/chapters/modals/layout', ['title' => 'Lecture', 'chapter' => $chapter])

<form method="POST" action="{{route('admin.courses.chapters.content.create', [$course->slug, $chapter->id])}}" enctype="multipart/form-data">
	@csrf
	<input type="hidden" name="content_type" value="App\Lecture">
	<input type="hidden" name="type" value="lecture">
	<input type="hidden" name="order" value="{{$chapter->content->count()}}">
	<div class="row">
		<div class="col-4">
			{{-- VIDEO --}}
			@include('admin/components/uploads/video-add')
			
		</div>
		<div class="col-8">
			<div class="form-group">
		        @input(['lang' => null, 'name' => 'name', 'label' => 'Lecture name', 'value' => old('name')])
			</div>
			<div class="form-group">
		        @textarea(['lang' => null, 'name' => 'description', 'label' => 'Description', 'value' => old('description')])
			</div>
		</div>
	</div>
	<div class="text-right">

	@include('components/buttons/spinner', [
	  'classes' => 'btn btn-xs btn-red block-screen-button',
	  'label' => 'Create Lecture'])

	</div>
</form>

@endcomponent