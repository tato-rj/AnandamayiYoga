<div class="row mt-5 mb-7">
    <div class="col-lg-8 col-md-10 col-sm-12 col-12 mx-auto">
        {!! $teacher->biography !!}

        @if($teacher->website)
        <p class="mt-4 mb-0"><a href="{{$teacher->website}}" target="_blank" class="link-blue"><i class="fas fa-globe mr-2"></i>Visit my website</a></p>
        @endif
    </div>
</div>
