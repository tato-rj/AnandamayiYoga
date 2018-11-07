<div class="show-on-hover">
    <div class="m-0 absolute-center z-10 text-center">
        <a class="link-none" href="{{$routes['edit']}}">
        	<div class="cursor-pointer text-warning edit mb-2" data-id="{{$model->id}}"><strong>edit</strong></div>
        </a>
        <div class="text-danger cursor-pointer delete" data-path="{{$routes['delete']}}" data-toggle="modal" data-target="#delete-confirm"><strong>delete</strong></div>
    </div>
    <div class="overlay w-100 h-100 bg-light z-0" style="opacity: 0.95"></div>                
</div>