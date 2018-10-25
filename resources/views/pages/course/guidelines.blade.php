<div class="row mb-7">
    <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto">
        <h3 class="mb-4 pb-2 text-center">What does this course offer me?</h3>
            <ul class="mb-4">
                @foreach(config('course.guidelines') as $guideline)
                <li class="mb-4 lead">{{$guideline}}</li>
                @endforeach
            </ul>
            <p class="lead mb-2">This course takes about <strong>{{convertToTimeString($course->duration())}}</strong> to complete.</p>
            <p class="lead">Hany any questions? <a href="" class="link-blue">We're here to help!</a></p>
    </div>
</div>