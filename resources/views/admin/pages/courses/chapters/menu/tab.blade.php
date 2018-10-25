<a class="px-3 py-2 list-group-item-action ordered new-chapter" 
	name="chapter-tab" 
	data-toggle="list"
	data-path="{{route('admin.courses.chapters.update', [$course->slug, $chapter->id])}}"
	href="#chapter{{$chapter->order}}" 
	id="chapter{{$chapter->order}}-tab" 
	data-id="{{$chapter->id}}">

	<div class="d-flex align-items-center">
		<div class="sort-handle cursor-pointer mr-4">
			<i class="fas fa-sort"></i>
		</div>
		<div>
			<strong class="name">

				{{$chapter->label}}

			</strong>
		</div>
	</div>
</a>