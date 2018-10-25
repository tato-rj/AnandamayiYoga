@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('pages/about/teachers/show/lead')

	@include('pages/about/teachers/show/biography')

	@include('pages/about/teachers/show/contents/courses')
	@include('pages/about/teachers/show/contents/programs')
	@include('pages/about/teachers/show/contents/lessons')

    @include('components/bars/devices')

</div>

@endsection
