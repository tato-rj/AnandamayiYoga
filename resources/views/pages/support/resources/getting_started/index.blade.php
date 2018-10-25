@extends('layouts/app')

@section('content')
<div class="container-fluid">
    @include('components/sections/lead', ['image' => 'contact'])
    @include('pages/support/resources/getting_started/content')
</div>
@endsection