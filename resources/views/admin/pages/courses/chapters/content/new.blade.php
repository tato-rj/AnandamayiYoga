<div class="tab-pane fade" name="chapter-content"
	data-id=""
	style="display: none;">

	<form method="POST" action="{{route('admin.courses.chapters.store', $course->slug)}}">
		{{csrf_field()}}
		<div class="text-center mb-4 chapter-title">
			<p class="lead">Use the box to describe what this chapter is about and click on the items below to add them to the chapter</p>
		</div>

		<div class="form-group mb-4">
			<input type="text" name="name" placeholder="Chapter name" value="" 
				class="form-control">
		</div>

		<div class="form-group mb-4">
			<textarea name="description" placeholder="This chapter is about..." rows="4" 
				class="form-control"></textarea>
		</div>

		<div class="text-right action-buttons">
			<button type="button" class="btn btn-warning m-2 shadow discard-changes"><i class="fas fa-minus-circle mr-2"></i>Discard changes</button>

			<button type="submit" class="btn btn-blue m-2 shadow save-chapter"><i class="fas fa-save mr-2"></i>Save this chapter</button>
		</div>

	</form>
</div>
