  <div class="col-12 text-center mb-4">
    @if($model->published)
    <div class="text-success">This {{$name}} was <strong>published</strong> on {{$model->published->toFormattedDateString()}}</div>
    @else
    <div>
    	<div class="text-danger">This {{$name}} is <strong>not published</strong> at this moment</div>
    	<div class="text-muted"><small>It will not be available on the site until you publish it</small></div>
    </div>
    @endif
  </div>