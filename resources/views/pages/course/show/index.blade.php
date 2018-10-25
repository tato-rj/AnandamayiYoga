@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('pages/course/show/lead')

    @include('pages/course/show/content')

    @include('pages/course/teachers')

    @include('pages/course/guidelines')

</div>
@endsection

@section('scripts')
<script src="{{asset('js/feedback/stars.js')}}"></script>
@endsection