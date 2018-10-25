@component('admin/pages/courses/chapters/modals/layout', [
	'title' => 'Chapter',
	'size' => 'normal'])

	<form method="POST" action="{{route('admin.courses.chapters.store', $course->slug)}}">
		{{csrf_field()}}

		<div class="form-group mb-4">
			<input type="text" name="name" placeholder="Chapter name" value="" 
				class="form-control">
		</div>

		<div class="form-group mb-4">
			<textarea name="description" placeholder="This chapter is about..." rows="4" 
				class="form-control"></textarea>
		</div>

		<div class="text-right action-buttons">
			<button type="submit" class="btn btn-red btn-bold">Save this chapter</button>
		</div>

	</form>

@endcomponent