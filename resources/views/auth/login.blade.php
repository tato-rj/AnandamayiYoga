@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('components/sections/lead', ['image' => 'register'])

    @include('pages/login/content')
    
    @include('components/bars/gift')
    
    @include('components/bars/devices')
    
    @include('components/bars/benefits')
    
    @include('components/bars/testimonials')

</div>
@endsection
