<div class="col-lg-4 col-md-4 col-sm-6 col-8 mx-auto move-control p-4 text-center">
    <div class="cursor-pointer plant-container position-relative mx-auto mb-2" data-id="1" data-toggle="modal" data-target="#classes">
        <div class="sun-{{$level->slug}} sun rounded-circle">
            <div></div>
        </div>
        <div class="level-card plant plant-{{$level->slug}}" style="background: url({{cloud('app/images/levels/'.$level->slug.'-sprite.png')}}) left center; background-size: cover;" ></div>
        <img src="{{cloud('app/images/levels/soil.png')}}" class="position-absolute soil">
    </div>
    <h4 class="text-muted">{{$level->name}}</h4>
</div>