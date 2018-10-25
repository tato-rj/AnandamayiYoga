@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('components/sections/lead', ['image' => 'poses'])
    
    @include('pages/discover/asanas/content')

	@include('components/feedback/fixed-box')

</div>
@endsection
