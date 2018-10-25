@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('components/sections/lead', ['image' => 'error'])

    <div id="error-message" data-error="Error was coused by: {{ $exception->getMessage() }}"></div>
	<section id="scroll-mark" class="container py-4 mb-4">
	    <div class="row my-3">

	        @component('components/sections/title', ['title' => "Whoops, something went wrong"])
	        @slot('subtitle')
	        {{$message or null}} In case you run into this issue again, please <a href="{{route('support.contact.show')}}" class="link-blue">let us know</a>.
	        @endslot
	        @endcomponent

	        <div class="col-lg-8 col-md-8 col-sm-10 col-12 mx-auto">

	        	<h1 class="text-center text-red mb-3" style="font-size: 7em; opacity: .3;"><strong>{{$status or 'SORRY'}}</strong></h1>

                <div class="text-center">

	               	<p class="text-center">In the mean time...</p>

	                @include('components/buttons/simple', [
	                    'path' => route('discover.browse'),
	                    'label' => 'Browse through our library',
	                    'size' => 'lg',
	                    'color' => 'outline-red'])

                </div>

	        </div>
	    </div>
	</section>

	<section class="container-fluid mb-7">

				@include('components/swiper/trending')

				@include('components/swiper/latest')

				@include('components/swiper/free')

				@include('components/swiper/category', ['category' => \App\Category::where('name', 'Morning Classes')->first()])

	</section>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
	console.log($('#error-message').attr('data-error'));
</script>
@endsection
