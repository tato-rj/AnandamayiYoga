<div class="col-12">
  <p>We have <strong>{{\App\Feedback::for('program')->count()}}</strong> {{str_plural('rating', \App\Feedback::for('program')->count())}} on the programs.</p>

  @if(! \App\Feedback::for('program')->get()->isEmpty())
  
	<div>
	  <div class="d-flex justify-content-between px-2">
	    <div class="d-flex">
	      <div class="mr-2" style="width: 126px">
	        <span><strong>Rating</strong></span>
	      </div>

	      <div style="width: 168px">
	        <span><strong>Program</strong></span>
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

	  @foreach(\App\Feedback::for('program')->get() as $feedback)
	  <a href="{{route('admin.feedbacks.show', $feedback->id)}}" class="link-none">
	    <div class="d-flex justify-content-between border-bottom cursor-pointer hover-background-light">
	      <div class="d-flex">

	        <div class="p-2 d-flex align-items-center mr-2" style="width: 126px">
	          @include('components/icons/stars', [
	            'score' => $feedback->score,
	            'size' => 'sm',
	            'margin' => '1'])
	        </div>

	        <div class="p-2" style="width: 168px">
	          <span class="clamp-1"><small>{{\App\Program::find($feedback->target_id)->name}}</small></span>
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