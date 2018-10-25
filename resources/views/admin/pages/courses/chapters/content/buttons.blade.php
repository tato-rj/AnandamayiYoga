<hr class="my-4">
<div class="text-right action-buttons">
	@if(! empty($chapter))
		<button class="btn btn-danger m-2 shadow delete" 
	      data-path="{{route('admin.courses.chapters.destroy', [$course->slug, $chapter->id])}}" 
	      data-toggle="modal" 
	      data-target="#delete-confirm"><i class="fas fa-trash-alt mr-2"></i>Delete chapter</button>
		
	@else
		<button class="btn btn-warning m-2 shadow discard-changes"><i class="fas fa-minus-circle mr-2"></i>Discard changes</button>

		<button class="btn btn-blue m-2 shadow save-chapter"><i class="fas fa-save mr-2"></i>Save this chapter</button>
	@endif
</div>