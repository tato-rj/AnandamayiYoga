<div class="col-lg-3 col-md-4 col-sm-4 col-8 mb-4 mx-auto move-control reveal" 
	reveal-origin="bottom" 
	reveal-delay="{{$delay}}" 
	reveal-duration="500">
    <div class="level-card t-2 cursor-pointer move-item-up" data-id="{{$level->id}}" data-toggle="modal" data-target="#classes">
        <img class="w-100 rounded-top-half" src="{{cloud('app/covers/levels/'.$level->slug.'.jpg')}}">
        <button class="btn btn-lg btn-block border-0 bg-{{$level->slug}}-light" 
        	style="border-top-right-radius: 0; border-top-left-radius: 0;">
            <strong>{{$level->name}}</strong>
        </button>                         
    </div>
</div>