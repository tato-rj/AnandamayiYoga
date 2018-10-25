<div class="row bg-light my-6">
    <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto py-4">
        <h3 class="mb-4 text-center">This course is taught by</h3>
        <div class="d-flex align-items-center justify-content-center flex-wrap">
            @foreach($course->teachers as $teacher)
                <div class="d-flex align-items-center p-3">
                    <div>
                        <img src="{{cloud($teacher->image_path)}}" class="rounded-circle" style="width: 88px; height: 88px;">
                    </div>
                    <div class="ml-4">
                        <h4 class="m-0"><a href="{{route('teachers.show', $teacher->slug)}}" class="link-none hover-red t-2">{{$teacher->name}}</a></h4>
                        <div>
                        @foreach($teacher->categories as $category)
                        <small><strong><a href="{{route('discover.category', $category->slug)}}" class="link-default">{{$category->name}}</a></strong></small>{{! $loop->last ? ' | ' : null}}
                        @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
