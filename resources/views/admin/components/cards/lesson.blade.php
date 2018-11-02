<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-4">
	<div class="border rounded hover-shadow-light p-0 t-2 h-100">
	  <div 
	  	class="bg-full rounded-top position-relative" 
	  	style="background-image:url({{cloud($model->image_path)}}); height: 160px">
        <div class="show-on-hover">
            <div class="m-0 absolute-center text-white z-10 d-flex align-items-center justify-content-between bg-light rounded shadow-dark">
                <a href="/admin/{{$type}}/{{$model->slug}}">
                	<i class="fas fa-edit fa-lg m-2 cursor-pointer text-warning edit" data-id="{{$model->id}}"></i>
                </a>
                <i class="fas text-danger fa-trash-alt m-2 fa-lg cursor-pointer delete" data-path="/admin/{{$type}}/{{$model->slug}}" data-toggle="modal" data-target="#delete-confirm"></i>
            </div>
            <div class="overlay w-100 h-100 bg-light z-0"></div>                
        </div>
	  </div>
	  <div class="px-4 py-3 p">
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