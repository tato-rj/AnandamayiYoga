@extends('admin/layouts/app')

@section('content')

@include('admin/components/page-title', [
  'title' => $teacher->name . '\'s questionaire', 
  'subtitle' => [
    'label' => "The questionaire has {$teacher->questionaire->questions_count} questions",
    'publishable' => [
      'model' => $teacher->questionaire,
      'url' => route('admin.teachers.questionaire.status', [$teacher->slug, $teacher->questionaire->id])]
  ]])

<div class="row mb-4">

  @include('admin.components.publishable', ['model' => $teacher->questionaire, 'name' => 'questionaire'])
  
  <div class="col-12">
      <a href="{{route('admin.teachers.questionaire.edit', $teacher->slug)}}" class="btn-bold btn-blue btn-xs">
        <i class="fas fa-edit mr-2"></i>Edit the questionaire
      </a>
  </div>
</div>
<div>

    @foreach($teacher->questionaire->questions_en as $question)
    <div class="bg-light rounded mb-2 px-3 py-2 d-flex align-items-center">
      <div><span class="text-muted p-2 mr-3" style="font-size: 2em"><strong>{{$loop->iteration}}</strong></span></div>
      <div class="w-100">
        <div class="mb-1 pb-1 border-bottom clamp-1"><span class="text-muted mr-3 opacity-4"><small><strong>EN</strong></small></span>{{$question}}</div>
        <div class="clamp-1"><span class="text-muted mr-3"><small class="opacity-4"><strong>PT</strong></small></span>{{$teacher->questionaire->questions_pt[$loop->index]}}</div>
      </div>
    </div>
    @endforeach

</div>
{{-- @include('admin/pages/teachers/add/modal') --}}

@component('admin/components/modals/delete', [
  'title' => 'Delete questionaire'
])
Are you sure you want to delete your questionaire?
@endcomponent

@endsection

@section('scripts')
<script src="{{asset('js/modal.delete.js')}}"></script>

<script type="text/javascript">
if($('.is-invalid, .invalid-feedback').length > 0) {
  $('#add-modal').modal('show');
}
</script>

@endsection