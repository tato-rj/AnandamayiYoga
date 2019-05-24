@extends('admin/layouts/app')

@section('content')

@include('admin/components/page-title', [
  'title' => 'Wallpapers categories',
  'subtitle' => 'Manage the categories for the wallpapers'])

<div class="row mb-4">
	<div class="col-12">
		<form class="form-inline" method="POST" action="{{route('admin.wallpapers.categories.store')}}">
			@csrf
			<input type="text" name="name" placeholder="New category (EN)" class="form-control mr-2">
			<input type="text" name="name_pt" placeholder="Nova categoria (PT)" class="form-control mr-2">
			<button class="btn btn-red">Criar categoria</button>
		</form>
	</div>
</div>

<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12" id="categories-list">
    @foreach($wp_categories as $category)
      @include('admin/pages/wallpapers/draggable')
    @endforeach
  </div>
</div>

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

    $('#edit-modal input[name="'+$name+'"]').val($value);

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