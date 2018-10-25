@extends('admin/layouts/app')

@section('content')

@component('admin/components/page-title', ['title' => $course->name])
  @slot('subtitle')
    <a href="/office/courses" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>Return to view all courses</a>
  @endslot
@endcomponent

<div class="row">
    @include('admin/pages/courses/edit/left-column')
    @include('admin/pages/courses/edit/right-column') 
</div>


@component('admin/components/modals/delete', [
  'title' => 'Delete course'
])
Are you sure you want to delete this course?
@endcomponent
@endsection

@section('scripts')
<script src="{{asset('js/upload.image.js')}}"></script>
<script src="{{asset('js/edit.inputs.js')}}"></script>
<script src="{{asset('js/modal.delete.js')}}"></script>
@endsection