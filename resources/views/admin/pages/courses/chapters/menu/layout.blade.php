<div class="list-group">
	{{-- ADD BUTTON --}}
	<a class="px-3 py-2 list-group-item-action text-blue" data-toggle="modal" data-target="#new-chapter">
		<strong><i class="fas fa-plus mr-2"></i>New chapter</strong>
	</a>
</div>

<div class="list-group border-right" id="chapters-tabs">
	@if($course->chapters()->exists())
	@foreach($course->chapters as $chapter)
		@include('admin/pages/courses/chapters/menu/tab', ['chapter' => $chapter])
	@endforeach
	@endif
</div>