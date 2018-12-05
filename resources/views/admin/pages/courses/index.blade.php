@extends('admin/layouts/app')

@section('content')

@include('admin/components/page-title', [
  'title' => 'Courses',
  'subtitle' => "Showing {$courses->firstItem()}-{$courses->lastItem()} of a total of {$courses->total()} courses"
])

<div class="row">
  @manager
  {{-- PLUS --}}
  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-4">
    @include('admin/components/plus-card')
  </div>
  @endmanager
  {{-- CARDS --}}
  @foreach($courses as $course)
    @include('admin/components/cards/course')
  @endforeach
</div>

{{-- PAGINATION --}}
<div class="row mt-4">
      <div class="d-flex align-items-center w-100 justify-content-center my-4">
    {{ $courses->links() }}    
    </div>
</div>

@include('admin/pages/courses/add/modal')

@component('admin/components/modals/delete', [
  'title' => 'Delete course'
])
Are you sure you want to delete this course?
@endcomponent

@endsection

@section('scripts')
<script src="{{asset('js/modal.delete.js')}}"></script>

<script type="text/javascript">
checkName('courses');
</script>

<script type="text/javascript">
if($('.is-invalid, .invalid-feedback').length > 0) {
  $('#add-modal').modal('show');
}
</script>

<script type="text/javascript">
$('.spinner-button').on('click', function() {
    updateButton(
      $(this), 
      disabled = true, 
      'Creating the class, this may take a little while...');
});
</script>
@endsection