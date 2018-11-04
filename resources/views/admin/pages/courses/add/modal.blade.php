@component('admin/components/modals/add', [
  'title' => 'Create a new Course',
  'size' => 'modal-lg'])

<form method="POST" id="create-course" action="{{route('admin.courses.store')}}" enctype="multipart/form-data">
  @csrf
  <div class="row">
    
    @include('admin/pages/courses/add/left-column')

    @include('admin/pages/courses/add/right-column')

  </div>
  <div class="text-right">

    @include('components/buttons/spinner', [
      'classes' => 'btn btn-xs btn-red block-screen-button',
      'label' => 'Continue to create chapters'])

  </div>
</form>

@endcomponent