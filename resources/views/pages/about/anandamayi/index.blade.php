@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @component('components/sections/lead', ['image' => 'anandamayi'])
		@slot('extra')
		<img id="scroll-mark" src="{{cloud('app/images/alice/lead.jpg')}}" class="rounded-circle mb-2 mx-auto d-block lead-profile-image">
		@endslot
	@endcomponent

    @include('pages/about/anandamayi/content1')
    
    @include('components/bars/grid-pictures')
    
    @include('pages/about/anandamayi/content2')
	
	@include('components/bars/join', [
		'image' => 'mountain',
		'overlay' => 'blue',
		'title' => 'JOIN US TODAY'])

    @include('components/bars/books')
    
    @include('components/bars/testimonials')
</div>

@endsection
