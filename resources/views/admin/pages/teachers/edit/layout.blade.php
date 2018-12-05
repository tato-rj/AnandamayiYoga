@extends('admin/layouts/app')

@section('content')

@component('admin/components/page-title', ['title' => 'My profile'])

  @slot('subtitle')
  	@manager
    <a href="/admin/teachers" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>Return to view all teachers</a>
    @endmanager
  @endslot

@endcomponent

<div class="row">

  @include('admin/pages/teachers/edit/left-column')

  @include('admin/pages/teachers/edit/right-column')

</div>      
@manager
<div class="text-right mt-5">
  
  @include('admin/components/email', ['email' => $teacher->email])

  <button class="btn btn-danger" data-path="/admin/teachers/{{$teacher->slug}}" data-toggle="modal" data-target="#delete-confirm">
    <i class="fas fa-trash-alt mr-2"></i>Delete teacher
  </button>
</div>

@component('admin/components/modals/delete', ['title' => 'Delete teacher'])
Are you sure you want to delete this teacher?
@endcomponent
@endmanager
@endsection

@section('scripts')
<script src="{{asset('js/edit.inputs.js')}}"></script>
@endsection