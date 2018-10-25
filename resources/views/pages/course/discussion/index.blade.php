@extends('layouts/app')

@section('head')

@endsection

@section('content')
<div class="container-fluid">

  @include('pages/course/discussion/lead')
   
  @include('pages/course/discussion/content/layout')
  
</div>

@include('components/modals/add-discussion')

@endsection

@section('scripts')

@endsection
