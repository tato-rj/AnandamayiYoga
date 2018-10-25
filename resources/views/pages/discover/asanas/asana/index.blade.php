@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('components/sections/lead', ['image' => 'poses'])
    
    @include('pages/discover/asanas/asana/content')

	@include('components/feedback/fixed-box')

</div>
@endsection

@section('scripts')

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