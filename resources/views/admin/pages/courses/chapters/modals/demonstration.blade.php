@component('admin/pages/courses/chapters/modals/layout', ['title' => 'Demonstration', 'chapter' => $chapter])

<form method="POST" action="{{route('admin.courses.chapters.content.create', [$course->slug, $chapter->id])}}" enctype="multipart/form-data">
	{{csrf_field()}}
	<input type="hidden" name="content_type" value="App\Lecture">
	<input type="hidden" name="type" value="demonstration">
	<input type="hidden" name="order" value="{{$chapter->content->count()}}">
	<div class="row">
		<div class="col-4">
			{{-- VIDEO --}}
			@include('admin/components/uploads/video-add')
			
		</div>
		<div class="col-8">
			<div class="form-group">
				<input required type="text" class="form-control" name="name" value="" placeholder="Demonstration Name">
			</div>
			<div class="form-group">
				<textarea required name="description" placeholder="Description" rows="5" class="form-control"></textarea>
			</div>
		</div>
	</div>
	<div class="text-right">

	@include('components/buttons/spinner', [
	  'classes' => 'btn btn-red block-screen-button',
	  'label' => 'Create Demonstration'])

	</div>
</form>

@endcomponent