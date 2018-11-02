@extends('admin/layouts/app')

@section('content')

@component('admin/components/page-title', ['title' => 'Edit Class'])

  @slot('subtitle')
    <a href="/admin/classes" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>Return to view all single classes</a>
  @endslot

@endcomponent

<div class="row">
  <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
    <div>
      <div class="row">

        @include('admin/pages/lessons/edit/left-column')

        @include('admin/pages/lessons/edit/right-column')

      </div>      
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script src="{{asset('js/edit.inputs.js')}}"></script>
<script src="{{asset('js/upload.image.js')}}"></script>
@endsection