@extends('admin/layouts/app')

@section('content')

@include('admin/components/page-title', [
  'title' => 'Create a new questionaire',
  'subtitle' => 'Use this page to create a new questionaire'])

<div class="row mb-4">
  <div class="col-12 mb-4">
    {{-- QUESTIONS --}}
    <div class="form-group" id="questions-container">
      <label class="d-block text-muted"><small>Click below to start adding questions</small></label>

      <div class="form-group type-container original-type" style="display: none;">

        <a class="align-self-stretch btn btn-danger text-white mr-1 d-flex justify-content-center align-items-center">
          <i class="fas fa-minus"></i>
        </a>

        @include('components.form.edit.input-group', ['type' => 'questions', 'disabled' => false])

      </div>

      <a class="add-new-field text-warning">
        <small><i class="fas fa-plus mr-2"></i>Add a new question</small>
      </a>
    </div>
  </div>
  <div class="col-12 text-right">
    <form id="create-questionaire" action="{{route('admin.teachers.questionaire.store', auth()->user()->teacher->slug)}}" method="POST">
      @csrf
      <input type="hidden" name="questions">
      <input type="hidden" name="questions_pt">
      <button type="submit" class="btn-bold btn-blue">Save questionaire</button>
    </form>
  </div>
</div>

@endsection

@section('scripts')
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
$('form#create-questionaire button[type="submit"]').on('click', function(event) {
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

      $('form#create-questionaire input[name="questions"]').val(JSON.stringify(questions_en_array));
      $('form#create-questionaire input[name="questions_pt"]').val(JSON.stringify(questions_pt_array));

      $('form#create-questionaire').submit();

    } else {
      alert('You forgot to write one of the questions in english...');
    }

  } else {
    alert('You need to add some questions first!');
  }
});
</script>
@endsection