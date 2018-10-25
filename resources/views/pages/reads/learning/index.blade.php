@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('components/sections/lead', ['image' => 'library'])
    @include('pages/reads/learning/content')
    @include('components/bars/gift')
    @include('components/bars/partners')
    @include('components/bars/devices')

</div>

@endsection
