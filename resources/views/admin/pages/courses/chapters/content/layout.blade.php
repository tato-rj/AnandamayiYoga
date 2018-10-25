<div class="tab-pane fade" name="chapter-content"
	data-id="{{$chapter->id}}"
	id="chapter{{$chapter->order}}"
	order="{{$chapter->order}}">
	
	<div data-path="{{route('admin.courses.chapters.store', $course->slug)}}">
		<div class="text-center mb-4 chapter-title">
			<h4>{{$chapter->name}}</h4>
			<p class="lead">Use this section to add contents to the chapter</p>
		</div>

		{{-- NAME --}}          
		<div class="form-group edit-control" id="name-{{$chapter->id}}" name="name">

		@include('components/editing/label', [
		  'title' => 'The name of this chapter is',
		  'id' => "name-{$chapter->id}",
		  'path' => route('admin.courses.chapters.update', [$chapter->course->slug, $chapter->id])
		])

		<input type="text" disabled class="form-control" value="{{$chapter->name}}" name="name" placeholder="Chapter Name" >

		</div>

		{{-- DESCRIPTION --}}          
		<div class="form-group edit-control" id="description-{{$chapter->id}}" name="description">

			@include('components/editing/label', [
				'title' => 'The description of this chapter is',
				'id' => "description-{$chapter->id}",
				'path' => route('admin.courses.chapters.update', [$chapter->course->slug, $chapter->id])
				])
			<textarea name="description" placeholder="This chapter is about..." rows="4" class="form-control">{{$chapter->description}}</textarea>

		</div>

		@include('admin/pages/courses/chapters/content/nav')

		<div id="chapter-content" class="accordion dynamic-items mb-4">

			@foreach($chapter->content as $content)
			
				@include("admin/pages/courses/chapters/content/accordion/layout")

			@endforeach

		</div>

		<div class="p-2">
			<form action="{{route('admin.courses.chapters.materials.store', [$course->slug, $chapter->id])}}" class="dropzone" id="filesDropzone" data-chapter={{$chapter->id}}></form>
		</div>

		<div class="d-flex flex-wrap mt-4">
			@forelse($chapter->supportingMaterials as $material)
			<div class="d-flex flex-column m-3">
				<div class="m-2 position-relative">
			        <div class="show-on-hover">
			            <div class="m-0 absolute-center z-10">
			                <i class="fas text-danger fa-trash-alt m-2 fa-lg cursor-pointer delete" data-path="{{route('admin.courses.chapters.materials.destroy', [$course->slug, $chapter->id, $material->id])}}" data-toggle="modal" data-target="#delete-confirm"></i>
			            </div>
			            <div class="overlay bg-white z-0" 
			            	style="opacity: .8; bottom: -2px; left: -2px; width: 108%; height: 108%;"></div>
			        </div>
			        <div class="text-center">
						<i class="fas fa-file-alt fa-5x text-muted"></i>
					</div>
				</div>
				<a href="{{cloud($material->file_path)}}" target="_blank" class="link-blue">
					<p class="m-0 text-center"><small>{{$material->fullName}}</small></p>
				</a>
			</div>
			@empty
			<h5 class="text-center text-muted w-100 mb-4"><strong>Upload any supporting materials here</strong> <i class="fas fa-long-arrow-alt-up"></i></h5>
			@endforelse
		</div>

		@include('admin/pages/courses/chapters/content/buttons')

	</div>
</div>
