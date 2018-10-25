@if($freeClasses->count() > 0)

@component('components/swiper/layout', ['title' => 'Watch our free classes'])

	@foreach($freeClasses as $lesson)
	    @include('components/lesson/card', [
	    	'lesson' => $lesson,
	    	'sizes' => 'col-lg-3 col-md-4 col-sm-6 col-10'
	    ])
	@endforeach

@endcomponent

@endif