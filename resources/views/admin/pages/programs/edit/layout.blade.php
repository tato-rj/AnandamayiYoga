@extends('admin/layouts/app')

@section('content')

@include('admin/components/page-title', [
  'title' => 'Edit Program', 
  'subtitle' => [
    'url' => '/admin/programs',
    'label' => 'Return to view all programs',
    'publishable' => [
      'model' => $program,
      'url' => route('admin.programs.status', [$program->slug])]
  ]])

<div class="row">

  @include('admin.components.publishable', ['model' => $program, 'name' => 'program'])

  @include('admin/pages/programs/edit/left-column')

  @include('admin/pages/programs/edit/right-column')

</div>

@endsection

@section('scripts')
<script src="{{asset('js/edit.inputs.js')}}"></script>
<script src="{{asset('js/sortable.js')}}"></script>

<script>
createDraggable('disable');
</script>
@endsection