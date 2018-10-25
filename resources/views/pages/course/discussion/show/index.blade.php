@extends('layouts/app')

@section('head')

@endsection

@section('content')
<div class="container-fluid">

  @include('pages/course/discussion/show/lead')

  @include('pages/course/discussion/show/content')
  
</div>

@include('components/modals/add-discussion')

@endsection

@section('scripts')

@endsection
