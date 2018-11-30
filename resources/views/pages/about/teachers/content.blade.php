<section id="scroll-mark" class="container py-4">

    @title(['title' => 'Our teachers'])

    <div class="row">

        <div class="col-lg-8 col-md-10 col-sm-12 col-12 mx-auto mb-4">
            <p class="lead">@lang('Our classes are taught by experienced and certified teachers who embody yoga and teach with an intimate understanding of the classic yoga texts and various yoga traditions.')</p>
        </div>

        <div class="col-lg-8 col-md-10 col-sm-12 col-12 mx-auto">
            @foreach($teachers as $teacher)
            <div class="mb-4 d-flex align-items-center">
                <div class="p-4">
                    <a href="{{route('teachers.show', $teacher->slug)}}" class="link-none"><img src="{{cloud($teacher->image_path)}}" class="rounded-circle" width="120"></a>
                </div>
                <div>
                    <a href="{{route('teachers.show', $teacher->slug)}}" class="link-none"><h5 class="mb-0">{{$teacher->name}}</h5></a>
                    <div>
                        @if($teacher->name == 'Anandamayi')
                        <p class="m-0 text-red"><small><strong>@lang('Founder of AnandamayiYoga')</strong></small></p>
                        @else
                        @include('components.categories.list', ['list' => $teacher->categories])
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>