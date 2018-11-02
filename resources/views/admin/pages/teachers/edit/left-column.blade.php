<div class="col-4">
	{{-- PROFILE IMAGE --}}
	@include('admin/components/uploads/image-edit', [
		'image' => $teacher->image_path,
	    'path' => "/admin/teachers/{$teacher->slug}/image"])

	{{-- COVER IMAGE --}}
	@include('admin/components/uploads/cover-edit', [
		'cover' => $teacher->cover_path,
	    'path' => "/admin/teachers/{$teacher->slug}/cover"])

</div>