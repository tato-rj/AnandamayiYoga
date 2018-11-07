@component('admin/components/modals/add', [
  'title' => 'Create a new Asana',
  'size' => 'modal-lg'
])
<form method="POST" id="create-asana" action="/admin/asanas" enctype="multipart/form-data">
  {{csrf_field()}}
  <div class="row">
    
    @include('admin/pages/asanas/add/left-column')

    @include('admin/pages/asanas/add/right-column')

  </div>
  <div class="text-right">
    @include('components/buttons/spinner', [
      'classes' => 'btn btn-red block-screen-button',
      'label' => 'Create Asana'])

  </div>
</form>
@endcomponent