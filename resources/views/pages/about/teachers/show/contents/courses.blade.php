@if($teacher->courses()->exists())
<div class="container-fluid mb-4">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto">
            <h4 class="mb-2 pb-3 border-bottom">My Courses</h4>
            @foreach($teacher->courses as $course)
                @include('pages/course/card', ['course' => $course])
            @endforeach
        </div>
    </div>
</div>
@endif