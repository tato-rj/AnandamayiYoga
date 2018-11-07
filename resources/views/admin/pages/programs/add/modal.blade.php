@component('admin/components/modals/add', [
  'title' => 'Create a new Program',
  'size' => 'modal-lg'
])
<form method="POST" id="create-program" action="/admin/programs" enctype="multipart/form-data">
  {{csrf_field()}}
  <div class="row">

    @include('admin/pages/programs/add/left-column')

    @include('admin/pages/programs/add/right-column')

  </div>
  
  @include('admin/pages/programs/add/dragndrop')
  
  <div class="text-right">

    @include('components/buttons/spinner', [
      'classes' => 'btn btn-red block-screen-button',
      'label' => 'Create Program'])
      
  </div>
  
</form>
@endcomponent