@component('admin/components/modals/add', [
  'title' => 'Create a new Teacher',
  'size' => 'modal-lg'])

<form method="POST" id="create-teacher" class="p-4" action="/admin/teachers" enctype="multipart/form-data">
  {{csrf_field()}}
    
    @include('admin/pages/teachers/add/top')

    @include('admin/pages/teachers/add/bottom')

  <div class="text-right">
    @include('components/buttons/spinner', [
      'classes' => 'btn btn-red block-screen-button',
      'label' => 'Create Teacher'])

  </div>
</form>

@endcomponent