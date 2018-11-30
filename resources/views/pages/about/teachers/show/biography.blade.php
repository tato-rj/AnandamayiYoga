<div class="row mt-4 mb-5">
    <div class="col-lg-8 col-md-10 col-sm-12 col-12 mx-auto">
    	<div class="mb-5 text-center bg-light py-4">
    		<p class="mb-1" style="opacity: .4"><small><strong>@lang('My classes are about')</strong></small></p>
            @include('components.categories.list', ['list' => $teacher->categories])
    	</div>

        {!! $teacher->biography !!}

        @if($teacher->website)
        <p class="mt-4 mb-0"><a href="{{$teacher->website}}" target="_blank" class="link-blue"><i class="fas fa-globe mr-2"></i>Visit my website</a></p>
        @endif
    </div>
</div>
