@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('components/sections/lead', ['image' => 'poses'])
    
    @include('pages/discover/browse/content')
	
	<div class="mb-7">
			
		@include('components/swiper/trending')

		@include('components/swiper/latest')

		@include('components/swiper/free')

		@include('components/swiper/category', ['category' => \App\Category::where('name', 'Morning Classes')->first()])
    
	</div>

	@include('components/feedback/fixed-box')

</div>
@endsection
