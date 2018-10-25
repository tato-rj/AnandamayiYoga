<div class="bg-light rounded ordered model mt-2" data-path="{{route('admin.courses.chapters.content.update', [$course->slug, $chapter->id, str_plural($content->type), $content->id])}}">

	{{-- HEAD --}}
	<div class="px-4 py-3 cursor-pointer d-flex align-items-center">
		{{-- SORT HANDLE --}}
		<div class="sort-handle cursor-pointer mr-4">
			<i class="fas fa-sort"></i>
		</div>
		{{-- NAME --}}
		<div data-toggle="collapse" data-target="#{{"$content->type-$content->id"}}" class="change-data-target flex-grow-1">
			<p class="m-0 text-muted"><strong>{{ucfirst($content->type)}}</strong></p>
		</div>
		{{-- DELETE BUTTON --}}
		<div>
			<i class="fas fa-trash-alt text-danger delete"
				data-path="{{route('admin.courses.chapters.content.delete', [
				 'course' => $course->slug, 
				 'chapter' => $chapter->id, 
				 'relationship' => str_plural($content->type), 
				 'id' => $content->id])}}" 
		     	data-toggle="modal" 
		     	data-target="#delete-confirm-{{$content->type}}-{{$content->id}}"></i>
		</div>

	</div>

	{{-- BODY --}}
	<div id="{{"$content->type-$content->id"}}" class="change-id item collapse px-4 py-2" data-parent="#chapter-content">

		@include("admin/pages/courses/chapters/content/accordion/{$content->type}")

	</div>

	@component('admin/components/modals/delete', [
		'title' => "Delete {$content->type}",
		'item' => "-{$content->type}-{$content->id}"
		])
		Are you sure you want to delete this {{$content->type}}?
	@endcomponent

</div>
