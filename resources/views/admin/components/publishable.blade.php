  <div class="col-12 text-center mb-4">
    @if($model->published)
    <div class="text-success">Your {{$name}} was <strong>published</strong> on {{$model->published->toFormattedDateString()}}</div>
    @else
    <div>
    	<div class="text-danger">Your {{$name}} is <strong>unpublished</strong></div>
    	<div class="text-muted"><small>It will not be available on the site until you publish it</small></div>
    </div>
    @endif
  </div>