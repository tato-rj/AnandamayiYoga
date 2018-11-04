@component('admin/pages/courses/chapters/modals/layout', [
	'title' => 'Chapter',
	'size' => 'normal'])

	<form method="POST" action="{{route('admin.courses.chapters.store', $course->slug)}}">
		@csrf

		<div class="form-group">
	        @input(['lang' => 'en', 'name' => 'name', 'label' => 'Chapter name', 'value' => old('name')])
	        @input(['lang' => 'pt', 'name' => 'name_pt', 'label' => 'Nome do capítulo', 'value' => old('name_pt')])
		</div>

		<div class="form-group mb-4">
	        @textarea(['lang' => 'en', 'name' => 'description', 'label' => 'This chapter is about...', 'value' => old('description')])
	        @textarea(['lang' => 'pt', 'name' => 'description_pt', 'label' => 'Esse capítulo é sobre...', 'value' => old('description_pt')])
		</div>

		<div class="text-right">
			<button type="submit" class="btn-xs btn-red btn-bold">Save this chapter</button>
		</div>

	</form>

@endcomponent