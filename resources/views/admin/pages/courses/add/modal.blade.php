@component('admin/components/modals/add', [
  'title' => 'Create a new Course',
  'size' => 'modal-lg'])

<form method="POST" id="create-course" class="p-4" action="{{route('admin.courses.store')}}" enctype="multipart/form-data">
  {{csrf_field()}}
  <div class="row">
    
    @include('admin/pages/courses/add/left-column')

    @include('admin/pages/courses/add/right-column')

  </div>
  <div class="text-right">

    @include('components/buttons/spinner', [
      'classes' => 'btn btn-red block-screen-button',
      'label' => 'Continue to create chapters'])

  </div>
</form>

@endcomponent