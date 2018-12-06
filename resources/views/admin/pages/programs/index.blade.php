@extends('admin/layouts/app')

@section('content')

@include('admin/components/page-title', [
  'title' => 'Programs',
  'subtitle' => "Showing {$programs->firstItem()}-{$programs->lastItem()} of a total of {$programs->total()} programs"])

<div class="row">
  {{-- CREATE BUTTON --}}
  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-4">
    @include('admin/components/plus-card', ['item' => 'program'])
  </div>

  {{-- CARDS --}}
  @foreach($programs as $program)
    @component('admin/components/cards/lesson', [
      'model' => $program,
      'type' => 'programs'
    ])
    @slot('info')
      <p class="m-0">
        <small>
          <i class="fas mr-1 text-muted fa-video"></i>
          {{$program->lessons->count()}} {{str_plural('class', $program->lessons->count())}}
          <i class="far mr-1 ml-2 text-muted fa-clock"></i>
          {{secondsToTime($program->duration)}}
        </small>
      </p>
    @endslot
    @endcomponent
  @endforeach
  
</div>

{{-- PAGINATION --}}
<div class="row mt-4">
      <div class="d-flex align-items-center w-100 justify-content-center my-4">
    {{ $programs->links() }}
    </div>
</div>

@include('admin/pages/programs/add/modal')

@component('admin/components/modals/delete', ['title' => 'Delete program'])
Are you sure you want to delete this program?
@endcomponent

@endsection

@section('scripts')
<script src="{{asset('js/modal.delete.js')}}"></script>
<script src="{{asset('js/play.sounds.js')}}"></script>

<script type="text/javascript">
checkName('programs');
</script>

<script type="text/javascript">
if($('.is-invalid, .invalid-feedback').length > 0) {
  $('#add-modal').modal('show');
}
</script>

<script>
createSortable();
</script>

<script type="text/javascript">
// $('.spinner-button').on('click', function() {
//     updateButton(
//       $(this), 
//       disabled = true, 
//       'Creating the program, this may take a little while...');
// });
</script>
@endsection