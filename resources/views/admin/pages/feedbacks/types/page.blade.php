<div class="col-12">
  <p>We have <strong>{{\App\Feedback::about('page')->count()}}</strong> {{str_plural('input', \App\Feedback::about('page')->count())}} on pages.</p>

  @if(! \App\Feedback::about('page')->get()->isEmpty())
  <div>
    <div class="d-flex justify-content-between px-2">
    	<div class="d-flex">
  	  	<div class="mr-2" style="width: 94px">
  	  		<span><strong>Feedback</strong></span>
  	  	</div>
  	  	<div>
  	  		<span><strong>Page</strong></span>
  	  	</div>
  	  </div>
      <div>
        <span><strong>Created on</strong></span>
      </div>
    </div>

    @foreach(\App\Feedback::about('page')->get() as $feedback)
    <a href="{{route('admin.feedbacks.show', $feedback->id)}}" class="link-none">
      <div class="d-flex justify-content-between border-bottom cursor-pointer hover-background-light">
        <div class="d-flex">
          <div class="p-2 d-flex align-items-center ml-3" style="width: 94px">
            <span>
              <i class="text-{{$feedback->score == 5 ? 'success' : 'danger'}} far fa-thumbs-{{$feedback->score == 5 ? 'up' : 'down'}}"></i>
            </span>
          </div>
          <div class="p-2">
            <span><small>{{$feedback->page}}</small></span>
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