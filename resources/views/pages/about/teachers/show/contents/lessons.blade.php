@if($teacher->lessons()->exists())
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto">
            <h4 class="mb-2 pb-3 border-bottom">My Classes</h4>
            <div class="d-flex align-items-center flex-wrap w-100">
                @foreach($teacher->lessons as $lesson)
                    @include('components/lesson/card', [
                        'lesson' => $lesson,
                        'sizes' => null
                    ])
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif