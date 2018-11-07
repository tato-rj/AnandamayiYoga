@extends('admin/layouts/app')

@section('content')

@component('admin/components/page-title', [
  'title' => 'Edit Program'])

  @slot('subtitle')
    <a href="/admin/programs" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>Return to view all programs</a>
  @endslot

@endcomponent

<div class="row">
  <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
    <div>
      <div class="row">

        @include('admin/pages/programs/edit/left-column')

        @include('admin/pages/programs/edit/right-column')        

      </div>      
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script src="{{asset('js/edit.inputs.js')}}"></script>
<script src="{{asset('js/sortable.js')}}"></script>

<script>
createDraggable('disable');
</script>
@endsection