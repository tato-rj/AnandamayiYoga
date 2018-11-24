@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('components/sections/lead', ['image' => 'library'])
    @include('pages/reads/articles/content')
    @include('components/bars/devices')
    @include('components/bars/partners')

</div>

@endsection
