@extends('admin/layouts/app')

@section('header')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<style type="text/css">
.dropzone {
  border: 5px dashed #3089e2b5;
  border-radius: 6px;
}

.dropzone .dz-message {
  color: #3089e2b5;
  font-weight: bold;
}

.dropzone .dz-preview .dz-error-message {
  background: #dc3545;
  border-radius: 4px;
}

.dropzone .dz-preview .dz-error-message:after {
  border-bottom: 6px solid #dc3545;
}
</style>
@endsection

@section('content')

@component('admin/components/page-title', ['title' => "Chapters from {$course->name}"])
  @slot('subtitle')
    <a href="/office/courses/{{$course->slug}}" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>Return to the course</a>
  @endslot
@endcomponent

<div class="row">

  <div class="col-3">
    {{-- MENU --}}
    @include('admin/pages/courses/chapters/menu/layout')
  </div>

  <div class="col-9">
    {{-- CHAPTERS CONTENT --}}
    <div class="tab-content display-relative" id="chapters-list">
      @if($course->chapters()->exists())
      @foreach($course->chapters as $chapter)
        @include('admin/pages/courses/chapters/content/layout', ['chapter' => $chapter])
      @endforeach
      @endif
    </div>
  </div>
</div>

@include('admin/pages/courses/chapters/modals/chapter')

@if($course->chapters()->exists())
  @foreach($course->chapters as $chapter)
    @include('admin/pages/courses/chapters/modals/lecture', ['chapter' => $chapter])
    @include('admin/pages/courses/chapters/modals/demonstration', ['chapter' => $chapter])
    @include('admin/pages/courses/chapters/modals/assignment', ['chapter' => $chapter])
    @include('admin/pages/courses/chapters/modals/quiz', ['chapter' => $chapter])
  @endforeach
@endif

@component('admin/components/modals/delete', [
  'title' => 'Delete'
])
Are you sure you want to delete this?
@endcomponent

@endsection

@section('scripts')
<script src="{{asset('js/edit.inputs.js')}}"></script>
<script src="{{asset('js/modal.delete.js')}}"></script>
<script src="{{asset('js/sortable.js')}}"></script>
<script src="{{asset('js/admin/vendor/dropzone.js')}}"></script>

<script type="text/javascript">
Dropzone.options.filesDropzone = {
  acceptedFiles: 'image/*,application/pdf,.doc',
  maxFilesize: 8,
  maxFiles:8,
  accept: function(file, done) {
    console.log(file);
    done();
  },
  sending: function(file, xhr, formData) {
    formData.append("chapter_id", $('#filesDropzone').attr('data-chapter'));
      formData.append("_token", window.app.csrfToken);
  }
};

</script>

<script type="text/javascript">
///////////////////////////
// ADD NEW QUIZ QUESTION //
///////////////////////////

$('a.add-new-field').on('click', function() {
  $button = $(this);
  $clone = $button.siblings('.original-type').clone();
  number = $button.closest('form').find('.quiz-questions:not(.original-type)').length;
  inputs = $clone.find('input');

  $(inputs[0]).attr('name',  'content['+number+'][question]');

  $(inputs[1]).attr('name',  'content['+number+'][answers][options][0]');
  $(inputs[2]).attr('name',  'content['+number+'][answers][correct][0]');

  $(inputs[3]).attr('name',  'content['+number+'][answers][options][1]');
  $(inputs[4]).attr('name',  'content['+number+'][answers][correct][1]');
  
  $(inputs[5]).attr('name',  'content['+number+'][answers][options][2]');
  $(inputs[6]).attr('name',  'content['+number+'][answers][correct][2]');
  
  $(inputs[7]).attr('name',  'content['+number+'][answers][options][3]');
  $(inputs[8]).attr('name',  'content['+number+'][answers][correct][3]');

  target = $button.attr('data-target');

  $clone.removeClass('original-type').appendTo($(target)).show();
});

//////////////////////////
// REMOVE QUIZ QUESTION //
//////////////////////////

$(document).on('click', 'a.remove-field', function() {
  $(this).closest('.quiz-questions').remove();
});
</script>
<script type="text/javascript">

autoSortable($('#chapters-tabs'));

autoSortable($('.accordion'));

</script>

@endsection