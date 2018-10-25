@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('pages/program/lead')
    
    @include('components/bars/preview', ['model' => $program])

    @include('pages/program/list')

	@include('components/feedback/stars', [
		'model' => $program,
		'name' => 'program'])

</div>
@endsection

@section('scripts')
<script src="{{asset('js/preview-video.js')}}"></script>
<script src="{{asset('js/feedback/stars.js')}}"></script>

<script type="text/javascript">
var clampText = document.getElementsByClassName("clamp");

for (var i = 0; i < clampText.length; i++) {
	$clamp(clampText[i], {clamp: '150px'});
}
</script>

<script type="text/javascript">
$('.fa-heart').on('click', function() {
	$icon = $(this);
	$label = $('.favorite-label');
	$favorited_id = $icon.attr('data-favorited_id');
	$favorited_type = $icon.attr('data-favorited_type');
	$urlStore = $icon.attr('data-url-store');
	$urlDestroy = $icon.attr('data-url-destroy');

	if ($icon.hasClass('far')) {
		$.post($urlStore, {favorited_id: $favorited_id, favorited_type: $favorited_type}, function() {
			$icon.removeClass('far swing').addClass('rubberBand fas');
			// $label.text('Favorited!');
		}).fail(function(request, status, error) {
			alert(error);
		});
	} else if ($icon.hasClass('fas')) {

		$.ajax({
			url: $urlDestroy,
			method: 'DELETE',
			data: {
				favorited_id: $favorited_id, 
				favorited_type: $favorited_type
			},
			success: function(result) {
				$icon.addClass('far swing').removeClass('rubberBand fas');
				// $label.text('Add to favorites');
			},
			fail: function(request, status, error) {
				alert(error);
			}
		});	
	}
});

</script>
@endsection