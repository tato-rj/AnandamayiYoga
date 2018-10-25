@extends('layouts/raw')

@section('content')
<!-- The video -->
<video autoplay id="preview-routine" style="
    position: fixed;
    right: 0;
    bottom: 0;
    width: 100%; 
    height: 100%;
">
  <source src="{{cloud($routine->video_path)}}" type="video/mp4">
</video>

<!-- Optional: some overlay text to describe the video -->
<button class="position-absolute btn btn-light" data-path="{{$lesson->path()}}" style="bottom: 20px; right: 20px;" id="skip">Skip introduction</button>

@endsection

@section('scripts')
<script type="text/javascript">
function redirectToLesson()
{
	$path = $('#skip').attr('data-path');
	window.location.href = $path;
}

$('#preview-routine').on('ended', function() {
	redirectToLesson();
});

$('#skip').on('click', function() {
	redirectToLesson();
});
</script>
@endsection