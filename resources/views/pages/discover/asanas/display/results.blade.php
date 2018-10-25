<small class="ml-2 form-text text-center text-muted">Showing <span id="poses-showing"></span> of 84 asanas</small>

<div class="d-flex flex-wrap align-items-center" id="poses-container">
    @foreach($asanas as $asana)
        <figure class="figure text-center all_levels all_categories forwardbend seated beginner" filter="forwardbend seated beginner">
            <img src="{{asset('images/poses/boat.png')}}" class="figure-img img-fluid rounded">
            <figcaption class="px-1 figure-caption elipsis">{{$asana->name}}</figcaption>
        </figure>
    @endforeach
</div>