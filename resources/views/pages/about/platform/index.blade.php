@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('components/sections/lead', ['image' => 'anandamayi'])

    @include('pages/about/platform/content')

	@include('components/bars/join', [
		'image' => 'mountain',
		'overlay' => 'blue',
		'title' => 'INVEST IN YOURSELF'])

    @include('components/bars/devices')
    
	@include('components/bars/testimonials')

</div>

@endsection
