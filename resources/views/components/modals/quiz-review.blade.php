<div class="modal fade" id="quiz-review" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Review my answers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-4 py-3">
        <p class="lead mb-2">All done? Please carefully review your answers before submitting. You can start again if you are not sure or made any mistakes!</p>
        <div id="answers-review" class="p-4">
          @foreach($content->questions as $quiz)
          <div class="mb-4">
            <p class="border-bottom pb-2 mb-1"><strong>{{$loop->iteration}}</strong> | {{$quiz['question']}}</p>
            <p class="ml-4"><i class="fas fa-dot-circle text-blue mr-2"></i><span class="answer"></span></p>
          </div>
          @endforeach
        </div>
      </div>
      <div class="modal-footer border-0 justify-content-between align-items-baseline">
        <button onClick="window.location.reload()" type="button" class="btn btn-link link-blue py-0" data-dismiss="modal">I made a mistake, try again!</button>
        <form method="POST" action="{{route('user.course.chapter.answer.submit', [$chapter->course->slug, $chapter->id, 'quiz', $content->id])}}">
          {{csrf_field()}}
          <div id="answers-form">
            @foreach($content->questions as $quiz)
            <input type="hidden" name="answer[]">
            @endforeach
          </div>
          <button type="submit" class="btn-bold btn-red">Submit my answers</button>
        </form>
      </div>
    </div>
  </div>
</div>