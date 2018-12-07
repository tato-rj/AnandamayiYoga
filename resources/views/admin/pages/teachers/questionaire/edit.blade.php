@extends('admin/layouts/app')

@section('content')

@component('admin/components/page-title', ['title' => 'Edit my questionaire'])
  @slot('subtitle')
    <a href="{{route('admin.teachers.questionaire.index', $teacher->slug)}}" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>Return to the questionaire main page</a>
  @endslot
@endcomponent

<div class="row mb-4">
  <div class="col-12 mb-4">

    {{-- QUESTIONS --}}
    <div class="form-group" id="questions-container">
      <div class="form-group type-container original-type" style="display: none;">

        <a class="align-self-stretch btn btn-danger text-white mr-1 d-flex justify-content-center align-items-center">
          <i class="fas fa-minus"></i>
        </a>

        @include('components.form.edit.input-group', ['type' => 'questions', 'disabled' => false])

      </div>

      @foreach($teacher->questionaire->questionsArray as $question)
      <div class="form-group type-container d-flex">

        <a class="align-self-stretch btn btn-danger text-white mr-1 d-flex justify-content-center align-items-center">
          <i class="fas fa-minus"></i>
        </a>

        <div class="w-100 border rounded" style="border-color: #ced4da">
          <div class="position-relative icon-input" data-lang="en">
          <input 
            class="form-control form-control-sm rounded-top"
            type="text"
            name="questions[en][]" 
            value="{{$question['en']}}" 
            style="border-radius: 0; border: none; border-bottom: 1px solid #ced4da">
          </div>
          <div class="position-relative icon-input" data-lang="pt">
          <input 
            class="form-control form-control-sm rounded-bottomm border-0"
            type="text"
            style="border-radius: 0;" 
            name="questions[pt][]" 
            value="{{$question['pt']}}">
          </div>
        </div>

      </div>
      @endforeach

      <a class="add-new-field text-warning">
        <small><i class="fas fa-plus mr-2"></i>Add a new question</small>
      </a>
    </div>
  </div>
  <div class="col-12 d-flex justify-content-end">
      <form id="update-questionaire" action="{{route('admin.teachers.questionaire.update', [$teacher->slug, $teacher->questionaire->id])}}" method="POST">
        @csrf
        @method('PATCH')
        <input type="hidden" name="questions">
        <input type="hidden" name="questions_pt">
        <button type="submit" class="btn-bold btn-blue"><i class="fas fa-edit mr-2"></i>Update questionaire</button>
      </form>
       <button class="btn-bold btn-danger delete ml-2" data-path="{{route('admin.teachers.questionaire.destroy', [$teacher->slug, $teacher->questionaire->id])}}" data-toggle="modal" data-target="#delete-confirm"><i class="fas fa-trash-alt mr-2"></i>Delete</button>
  </div>
</div>

@component('admin/components/modals/delete', [
  'title' => 'Delete questionaire'
])
Are you sure you want to delete your questionaire?
@endcomponent

@endsection

@section('scripts')
<script src="{{asset('js/modal.delete.js')}}"></script>
<script src="{{asset('js/edit.inputs.js')}}"></script>
<script type="text/javascript">
$('a.add-new-field').on('click', function() {
  $button = $(this);
  
  $clone = $button.siblings('.original-type').clone();
  
  $clone.find('input').each(function() {
    $(this).attr('name', $(this).attr('data-name')).removeAttr('disabled');
  });
  
  $clone.removeClass('original-type').insertBefore($button).addClass('d-flex');
});
</script>
<script type="text/javascript">
if($('.is-invalid, .invalid-feedback').length > 0) {
  $('#add-modal').modal('show');
}
</script>
<script type="text/javascript">
$('form#update-questionaire button[type="submit"]').on('click', function(event) {
  event.preventDefault();
  
  if ($('#questions-container').find('input[name="questions[en][]"]').length) {
    
    let $questions_en = $('#questions-container').find('input[name="questions[en][]"]');
    let $questions_pt = $('#questions-container').find('input[name="questions[pt][]"]');
    let isValid = true;
    
    $questions_en.each(function() {
      if (! $(this).val())
        isValid = false;
    });
    
    if (isValid) {

      let questions_en_array = [];
      let questions_pt_array = [];

      $questions_en.each(function() {
        questions_en_array.push($(this).val());
      });

      $questions_pt.each(function() {
        questions_pt_array.push($(this).val());
      });

      $('form#update-questionaire input[name="questions"]').val(JSON.stringify(questions_en_array));
      $('form#update-questionaire input[name="questions_pt"]').val(JSON.stringify(questions_pt_array));

      $('form#update-questionaire').submit();

    } else {
      alert('You forgot to write one of the questions in english...');
    }

  } else {
    alert('You need to add some questions first!');
  }
});
</script>
@endsection