<div class="col-12 mb-4">
    <div class="d-flex flex-row flex-wrap justify-content-center">
    	<a href="{{route('discover.browse')}}" class="mobile-block m-2 btn-lg rounded-0 {{$browse or 'btn-outline-red'}}">Browse</a>
        <a href="{{route('discover.programs.index')}}" class="mobile-block m-2 btn-lg rounded-0 {{$programs or 'btn-outline-red'}}">Programs</a>
        <a href="{{route('discover.classes.index')}}" class="mobile-block m-2 btn-lg rounded-0 {{$classes or 'btn-outline-red'}}">Classes</a>
    </div>
</div>