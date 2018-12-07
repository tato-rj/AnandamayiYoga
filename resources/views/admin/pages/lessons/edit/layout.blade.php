@extends('admin/layouts/app')

@section('content')

@include('admin/components/page-title', [
  'title' => 'Edit Class', 
  'subtitle' => [
    'url' => '/admin/classes',
    'label' => 'Return to view all single classes',
    'publishable' => [
      'model' => $lesson,
      'url' => route('admin.classes.status', [$lesson->slug])]
  ]])

<div class="row">
  
  @include('admin.components.publishable', ['model' => $lesson, 'name' => 'class'])

  <div class="col-12">
    @if(! $lesson->duration)
    <div class="alert alert-warning">
      <small><i class="fas fa-exclamation-triangle mr-2"></i>Upload this file to S3: <strong>{{$lesson->video_path}}</strong></small>
    </div>
    @endif
  </div>

  @include('admin/pages/lessons/edit/left-column')

  @include('admin/pages/lessons/edit/right-column')

  </div>
</div>

@endsection

@section('scripts')
<script src="{{asset('js/edit.inputs.js')}}"></script>
@endsection