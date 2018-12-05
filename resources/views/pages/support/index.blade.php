@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('components/sections/lead', ['image' => 'contact'])
    @include('pages/support/resources')
    @include('pages/support/faq')
    @include('pages/support/contact')
	@include('components/bars/benefits', [
		'title' => 'IMPROVE YOUR LIFESTYLE',
		'description' => 'Learn more about the many benefits of practicing yoga'])

    @include('components/bars/testimonials')

    @include('components/bars/info')
</div>

@endsection
