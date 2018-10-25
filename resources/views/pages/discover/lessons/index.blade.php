@extends('layouts/app')

@section('content')

<div class="container-fluid">

    @include('components/sections/lead', ['image' => 'poses'])
    
    @include('pages/discover/lessons/content')

	@include('components/feedback/fixed-box')

</div>
@endsection

@section('scripts')

<script type="text/javascript">
// $(function() {
// 	$('select').on('change', function() {
// 		$container = $('#filters-container');
// 		$selectedOption = $(this).find(':selected');
// 		$filterName = $selectedOption.text();
// 		$filterValue = $selectedOption.val();
// 		$filterType = $(this).attr('name');

// 		if(! $('#'+$filterValue).length) {
// 			$filterBadge = $('#filter-badge').clone().attr({
// 				'id': $filterValue,
// 				'data-type': $filterType
// 			}).appendTo($container);

// 			$filterBadge.find('#filter-name').text($filterName);

// 			$filterBadge.show();

// 			filters = getFilters();

// 			getLessons('/discover/classes', filters);

// 			resetURL();
// 		}

// 		$('.badge i').on('click', function() {
// 			$(this).parent().remove();
			
// 			filters = getFilters();

// 			getLessons('/discover/classes', filters);

// 			resetURL();
// 		});
// 	});
// });

// $('body').on('click', '.pagination a', function(e) {
//     e.preventDefault();

//     var url = $(this).attr('href');

// 	filters = getFilters();

// 	getLessons(url, filters);

//     window.history.pushState("", "", url);
// });

// function getFilters() {
// 	var filters = {
// 		'duration': [], 
// 		'level': [], 
// 		'categories': []
// 		};

// 	$('#filters-container').find('.badge:visible').each(function() {
// 		$badge = $(this);
		
// 		$.each(filters, function(index, value) {
// 			if ($badge.attr('data-type') == index){
// 				value.push($badge.attr('id'));
// 			}
// 		});
// 	});

// 	$.each(filters, function(index, value) {
// 		if (value == '') {
// 			filters[index] = $('select[name="'+index+'"]').attr('data-value').split(' ');
// 		}
// 	});

// 	return filters;
// }

// function getLessons(url, filters) {
// 	showSpinner();

// 	$.get(url, {filters: filters}, function(response) {
// 		$('#lessons-container').html(response);
// 		hideSpinner();
// 		console.log('Lessons updated');
// 	}).fail(function(request, status, error) {
// 		console.log('Error: '+error);
// 	});
// }

// function showSpinner() {
// 	$('#spinner').clone().appendTo('#lessons-container').fadeIn('fast');
// }

// function hideSpinner() {
// 	$('#lessons-container #spinner').fadeOut('fast');
// }

// function resetURL()
// {
// 	var uri = window.location.toString();
// 	if (uri.indexOf("?") > 0) {
// 	    var clean_uri = uri.substring(0, uri.indexOf("?"));
// 	    window.history.replaceState('', document.title, clean_uri);
// 	} 
// }

</script>
@endsection