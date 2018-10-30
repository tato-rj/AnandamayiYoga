@extends('admin/layouts/app')

@section('content')

@include('admin/components/page-title', [
  'title' => 'Classes Categories',
  'subtitle' => 'Manage the categories for single-classes, full-classes and programs'])

<div class="row mb-4">
	<div class="col-12">
		<button class="btn-bold btn-red btn-xs" 
      type="button" 
      data-toggle="modal" 
      data-target="#add-modal">
      <i class="fas fa-plus mr-2"></i>Create a new category
    </button>
	</div>
</div>

<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12" id="categories-list">
    @foreach($categories as $category)
      @include('admin/pages/categories/draggable')
    @endforeach
  </div>
</div>

@include('admin/pages/categories/add')

@include('admin/pages/categories/edit')

@component('admin/components/modals/delete', [
  'title' => 'Delete category'
])
Are you sure you want to delete this category?
@endcomponent

@endsection

@section('scripts')
<script src="{{asset('js/edit.inputs.js')}}"></script>
<script src="{{asset('js/modal.delete.js')}}"></script>
<script src="{{asset('js/sortable.js')}}"></script>

<script type="text/javascript">
$('.open-edit-modal').on('click', function() {
  $container = $(this).closest('.edit-control');
  $id = $container.attr('id');
  $path = $container.attr('data-path');

  $('#edit-modal .edit-control').each(function() {
    $group = $(this);
    $name = $group.attr('name');
    $value = $container.attr('data-'+$name);

    $('#edit-modal input[name="'+$name+'"], #edit-modal textarea[name="'+$name+'"]').val($value);

    $group.attr('id', $name+$id);
    $group.find('.edit').attr('data-id', $name+$id);
    $group.find('.save').attr('data-id', $name+$id).attr('data-path', $path);
  });

});
</script>
<script type="text/javascript">

autoSortable($('#categories-list'));

</script>
@endsection