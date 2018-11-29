@component('admin/components/modals/add', [
  'title' => 'Create a new Book',
  'size' => 'modal-lg'
])
<form method="POST" id="create-book" action="/admin/reads/books" enctype="multipart/form-data">
  {{csrf_field()}}
  <div class="row">
    
    @include('admin/pages/reads/books/add/left-column')

    @include('admin/pages/reads/books/add/right-column')

  </div>
  <div class="text-right">
    @include('components/buttons/spinner', [
      'classes' => 'btn btn-red block-screen-button',
      'label' => 'Create book'])

  </div>
</form>
@endcomponent