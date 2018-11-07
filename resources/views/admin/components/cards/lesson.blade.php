<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-4">
	<div class="border rounded hover-shadow-light p-0 t-2 h-100">
	  <div 
	  	class="bg-full rounded-top position-relative" 
	  	style="background-image:url({{cloud($model->image_path)}}); height: 160px">

       @include('admin.components.cards.controls', [
          'model' => $model, 
          'routes' => [
            'edit' => "/admin/{$type}/{$model->slug}", 
            'delete' => "/admin/{$type}/{$model->slug}"]])

	  </div>
	  <div class="px-4 py-3">
	  	<h5 class="m-0 clamp-1"><strong>{{$model->name}}</strong></h5>
	  	{{$info}}
	  	<p class="m-0 text-muted mt-2"><small><i>
	  		@if ($model->teacher()->exists())
	  		by {{$model->teacher->name}}
	  		@else
	  		<i class="fas fa-exclamation-triangle mr-2"></i>no teacher assigned
	  		@endif
	  	</i></small></p>
	  </div>
	</div>
</div>