<div class="col-12">
  <p>We have <strong>{{\App\Feedback::for('lesson')->count()}}</strong> {{str_plural('rating', \App\Feedback::for('lesson')->count())}} on the lessons.</p>

  @if(! \App\Feedback::for('lesson')->get()->isEmpty())
	<div>
	  <div class="d-flex justify-content-between px-2">
	    <div class="d-flex">
	      <div class="mr-2" style="width: 94px">
	        <span><strong>Feedback</strong></span>
	      </div>

	      <div style="width: 168px">
	        <span><strong>Lesson</strong></span>
	      </div>

	      <div style="width: 168px">
	        <span><strong>Comment</strong></span>
	      </div>

	      <div>
	        <span><strong>From</strong></span>
	      </div>
	    </div>

	    <div>
	      <span><strong>Created on</strong></span>
	    </div>
	  </div>

	  @foreach(\App\Feedback::for('lesson')->get() as $feedback)
	  <a href="{{route('admin.feedbacks.show', $feedback->id)}}" class="link-none">
	    <div class="d-flex justify-content-between border-bottom cursor-pointer hover-background-light">
	      <div class="d-flex">

	      	<div class="p-2 d-flex align-items-center ml-3" style="width: 94px">
	      		<span>
	      			<i class="text-{{$feedback->score == 5 ? 'success' : 'danger'}} far fa-thumbs-{{$feedback->score == 5 ? 'up' : 'down'}}"></i>
	      		</span>
	      	</div>

	        <div class="p-2" style="width: 168px">
	          <span class="clamp-1"><small>{{\App\Lesson::find($feedback->target_id)->name}}</small></span>
	        </div>

	        <div class="p-2" style="width: 168px">
	          <span class="clamp-1" title="{{$feedback->comment ?? 'No comment to show'}}"><small>{{$feedback->comment ?? '-'}}</small></span>
	        </div>

	        <div class="p-2">
	          <span><small>{{$feedback->email ?? '-'}}</small></span>
	        </div>
	      </div>

	      <div class="p-2">
	        <span><small>{{$feedback->created_at->toFormattedDateString()}}</small></span>
	      </div>
	    </div>
	  </a>
	  @endforeach

	</div>
  @endif
</div>