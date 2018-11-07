@extends('admin/layouts/app')

@section('content')

@include('admin/components/page-title', [
  'title' => 'Classes',
  'subtitle' => "Showing {$lessons->firstItem()}-{$lessons->lastItem()} of a total of {$lessons->total()} classes"
])

<div class="row">
  {{-- PLUS --}}
  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-4">
    @include('admin/components/plus-card')
  </div>
  {{-- CARDS --}}
  @foreach($lessons as $lesson)
    @component('admin/components/cards/lesson', [
      'model' => $lesson,
      'type' => 'classes'
    ])
    @slot('info')
      <p class="m-0"><small><i class="far mr-1 text-muted fa-clock"></i>{{secondsToTime($lesson->duration)}}</small></p>
      <p class="m-0">
          @component('components/lesson/levels', ['lesson' => $lesson])
          @endcomponent
      </p>
    @endslot
    @endcomponent
  @endforeach
</div>
{{-- PAGINATION --}}
<div class="row mt-4">
      <div class="d-flex align-items-center w-100 justify-content-center my-4">
    {{ $lessons->links() }}    
    </div>
</div>

@include('admin/pages/lessons/add/modal')

@component('admin/components/modals/delete', [
  'title' => 'Delete class'
])
Are you sure you want to delete this lesson?
@endcomponent

@endsection

@section('scripts')
<script src="{{asset('js/modal.delete.js')}}"></script>
<script src="{{asset('js/edit.inputs.js')}}"></script>
<script src="{{asset('js/play.sounds.js')}}"></script>

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
      'Creating the class, this may take a little while...');
});
</script>

@endsection