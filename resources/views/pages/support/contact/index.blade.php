@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('components/sections/lead', ['image' => 'contact'])
    @include('pages/support/contact/content')
    @include('pages/support/faq')
    @include('components/bars/testimonials')
    
</div>

@endsection
