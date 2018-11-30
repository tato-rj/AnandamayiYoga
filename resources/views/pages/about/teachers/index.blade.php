@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('components/sections/lead', ['image' => 'anandamayi'])

    @include('pages/about/teachers/content')

	@include('components/bars/devices')
    
	@include('components/bars/testimonials')

</div>

@endsection
