@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('components/sections/lead', ['image' => 'anandamayi'])
    @include('pages/about/eranthus/content')

</div>

@endsection
