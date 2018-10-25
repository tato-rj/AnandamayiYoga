@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('pages/course/lead')
    
    @include('pages/course/list')

	@include('components/feedback/fixed-box')

</div>
@endsection