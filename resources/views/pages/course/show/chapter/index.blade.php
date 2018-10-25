@extends('layouts/app')

@section('head')

@endsection

@section('content')
<div class="container-fluid">

  @include('pages/course/show/chapter/lead')
   
  @include('pages/course/show/chapter/content/layout')
  
  @if($content->type == 'quiz')
  @include('components/modals/quiz-review')
  @endif
</div>

@include('components/modals/add-discussion', [
	'course' => $chapter->course,
	'chapter_id' => $chapter->id])
@endsection

@section('scripts')
<script type="text/javascript">
// VIDEO
if ($('#lesson').length) {
	var video = videojs('lesson').ready(function(){
		var player = this;
		var route = player.getAttribute('data-url');
		var $pauseScreen = $('#paused');
		var $completedScreen = $('#completed');

		player.on('pause', function() {
			console.log('Video paused');
		});

		player.on('ended', function() {
			$.post(route, function() {
				console.log('This lesson has been saved into your list of completed lessons.');
			}).fail(function(request, status, error) {
				console.log(error);
			}).always(function() {
				$completedScreen.fadeIn('fast');
			});
		});
	});
}

</script>

<script type="text/javascript">
// QUIZ
$('.quiz-button').on('click', function() {
	$currentQuestion = $(this).closest('.quiz-container');
	$nextQuestion = $currentQuestion.next();
	
	$currentQuestion.hide();
	$nextQuestion.show();
});

$('.quiz-container input[name="answers[]"').on('change', function() {
	answerIndex = $(this).val();
	questionIndex = $(this).attr('data-question');

	answerText = $(this).attr('data-answer-text');
	
	console.log(answerText);

	$('#answers-form').children().eq(questionIndex).val(answerIndex);
	$('#answers-review').children().eq(questionIndex).find('.answer').text(answerText);

	$(this).closest('.quiz-container').find('button').prop('disabled', false);
});
</script>
@endsection
