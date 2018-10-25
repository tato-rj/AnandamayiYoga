@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('pages/course/description/lead')
    
    @include('components/bars/preview', ['model' => $course])

    @include('pages/course/description/content')

    @include('components/bars/grid-pictures')

    @include('pages/course/teachers')

    @include('pages/course/guidelines')

    @include('components/feedback/fixed-box')

</div>
@endsection

@section('scripts')
<script src="{{asset('js/preview-video.js')}}"></script>
@endsection