@extends('admin/layouts/app')

@section('content')

@include('admin/components/page-title', [
  'title' => 'Teachers',
  'subtitle' => "Showing {$teachers->firstItem()}-{$teachers->lastItem()} of a total of {$teachers->total()} teachers"
])

<div class="row">
  {{-- PLUS --}}
  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-4">
    @include('admin/components/plus-card')
  </div>
  {{-- CARDS --}}
  @foreach($teachers as $teacher)

    @include('admin/components/cards/teacher')
    
  @endforeach
</div>
{{-- PAGINATION --}}
<div class="row mt-4">
      <div class="d-flex align-items-center w-100 justify-content-center my-4">
    {{ $teachers->links() }}    
    </div>
</div>

@include('admin/pages/teachers/add/modal')

@component('admin/components/modals/delete', [
  'title' => 'Delete teacher'
])
Are you sure you want to delete this teacher?
@endcomponent

@endsection

@section('scripts')
<script src="{{asset('js/modal.delete.js')}}"></script>

<script type="text/javascript">
checkName('classes');
</script>

<script type="text/javascript">
if($('.is-invalid').length > 0) {
  $('#add-modal').modal('show');
}
</script>

<script type="text/javascript">
$('.spinner-button').on('click', function() {
    updateButton(
      $(this), 
      disabled = true, 
      'Creating the teacher, this may take a little while...');
});
</script>
@endsection