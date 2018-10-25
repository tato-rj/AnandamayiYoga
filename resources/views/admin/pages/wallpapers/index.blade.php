@extends('admin/layouts/app')

@section('header')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<style type="text/css">
.dropzone {
	border: 4px dashed #3089e2b5;
}

.dropzone .dz-message {
	color: #3089e2b5;
	font-weight: bold;
}

.dropzone .dz-preview .dz-error-message {
	background: #dc3545;
	border-radius: 4px;
}

.dropzone .dz-preview .dz-error-message:after {
	border-bottom: 6px solid #dc3545;
}
</style>
@endsection

@section('content')

@include('admin/components/page-title', [
  'title' => 'Wallpapers',
  'subtitle' => "Manage the wallpapers about {$category->name}"])

<div>
	<form action="{{route('admin.wallpapers.store')}}" class="dropzone" id="wallpapersDropzone" data-category={{$category->id}}></form>
</div>

<div class="d-flex flex-wrap mt-4">
	@foreach($wallpapers as $wallpaper)
	<div class="m-2 position-relative">
        <div class="show-on-hover">
            <div class="m-0 absolute-center z-10">
                <i class="fas text-danger fa-trash-alt m-2 fa-lg cursor-pointer delete" data-path="{{route('admin.wallpapers.destroy', $wallpaper->id)}}" data-toggle="modal" data-target="#delete-confirm"></i>
            </div>
            <div class="overlay w-100 h-100 bg-light z-0" style="opacity: .8"></div>                
        </div>		
		<img src="{{cloud($wallpaper->thumbnail)}}" style="width: 120px" class="rounded">
	</div>
	@endforeach
</div>

@component('admin/components/modals/delete', [
  'title' => 'Delete wallpaper'
])
Are you sure you want to delete this wallpaper?
@endcomponent
@endsection

@section('scripts')
<script src="{{asset('js/admin/vendor/dropzone.js')}}"></script>
<script src="{{asset('js/modal.delete.js')}}"></script>
<script type="text/javascript">
Dropzone.options.wallpapersDropzone = {
	acceptedFiles: 'image/*',
	paramName: 'image',
	maxFilesize: 8,
	maxFiles:8,
	accept: function(file, done) {
		console.log(file);
		done();
	},
	sending: function(file, xhr, formData) {
		formData.append("category_id", $('#wallpapersDropzone').attr('data-category'));
	    formData.append("_token", window.app.csrfToken);
	}
};

</script>
@endsection