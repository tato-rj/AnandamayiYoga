@component('admin/components/modals/add', [
  'title' => 'Create a new Class',
  'size' => 'modal-lg'])

<form method="POST" id="create-class" class="p-4" action="/admin/classes" enctype="multipart/form-data">
  {{csrf_field()}}
  <div class="row">
    
    @include('admin/pages/lessons/add/left-column')

    @include('admin/pages/lessons/add/right-column')

  </div>
  <div class="text-right">

    @include('components/buttons/spinner', [
      'classes' => 'btn btn-red block-screen-button',
      'label' => 'Create Class'])

  </div>
</form>

@endcomponent