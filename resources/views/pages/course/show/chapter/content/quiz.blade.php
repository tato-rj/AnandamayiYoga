<div class="container py-5">
	<div class="row">
		<div class="col-lg-6 col-md-8 col-sm-10 col-12 mx-auto">
			
			@if(auth()->user()->quizzes()->find($content->id))
			<h5 class="mb-4"><strong>Quiz completed!</strong></h5>
			<p>You have completed this quiz on {{auth()->user()->dateCompleted($content)->diffForHumans()}}. Here are the results:</p>

			<div class="mb-4 bg-light rounded px-3 py-2"> 
				@foreach($content->questions as $quiz)
				<div class="{{$loop->last ? null : 'border-bottom mb-2 pb-2 '}}"> 
					<p class="mb-1 text-muted"><i>Q: {{$quiz['question']}}</i></p>
					@if(array_key_exists(auth()->user()->answerTo($content)[$loop->index], $quiz['answers']['correct']))
					<p class="text-success mb-0"><i class="fas fa-check-circle mr-2"></i>
						{{$quiz['answers']['options'][auth()->user()->answerTo($content)[$loop->index]]}}
					</p>
					@else
					<p class="text-danger mb-0"><i class="fas fa-times-circle mr-2"></i>
						{{$quiz['answers']['options'][auth()->user()->answerTo($content)[$loop->index]]}}
					</p>
					@endif
				</div>
				@endforeach
			</div>

			<div class="alert alert-warning" role="alert">We'll post a <strong>feedback</strong> on your results soon. Please stop by later!</div>

			@else
			<div class="quiz-container">
				<h5 class="mb-4"><strong>It's Quiz time!</strong></h5>
				<p>Feel free to review the lessons at any time, your results will be calculated and saved automatically after you submit all the asnwers.</p>
				<p>This quiz has {{count($content->questions)}} questions. Good luck!</p>

				<div class="text-center my-5">
					<button class="btn-bold btn-red quiz-button">
	                    Start the Quiz
	                </button>
				</div>
			</div>

			@foreach($content->questions as $quiz)
			<div class="quiz-container" style="display: none;">
				<p class="lead">QUESTION {{$loop->iteration}} OF {{$loop->count}}</p>
				<p class="border-bottom pb-3 mb-3"><strong>{{$loop->iteration}}</strong> | {{$quiz['question']}}</p>
				<ul class="list-style-none pl-3">
					@foreach($quiz['answers']['options'] as $answer)
					<li class="custom-control custom-radio mb-1">
						<input type="radio"
							   id="{{str_slug($answer)}}" 
							   data-question="{{$loop->parent->index}}"
							   data-answer-text="{{$answer}}"
							   name="answers[]" 
							   value="{{$loop->index}}" 
							   class="custom-control-input">
						<label class="custom-control-label ml-2" for="{{str_slug($answer)}}">{{$answer}}</label>
					</li>
					@endforeach
				</ul>
				<div class=" text-right">
					@if($loop->last)
						<button type="button" class="btn-bold btn-xs btn-red" disabled data-toggle="modal" data-target="#quiz-review">
						  Review my answers
						</button>					
					@else
						<button class="btn-bold btn-xs btn-red quiz-button" disabled>
		                    Next question<i class="fas fa-angle-right ml-2"></i>
		                </button>
	                @endif
				</div>
			</div>
			@endforeach
			@endif
		</div>
	</div>
</div>
