<section id="scroll-mark" class="container py-4">

    @include('components/buttons/return', [
        'path' => '/discover/browse',
        'label' => 'return to our catalogue'])

    <div class="row my-3">
        <div class="col-lg-4 col-md-5 col-sm-12 col-12">
            <h1>{{$category->name}}</h1>
            <p class="lead">{{$category->subtitle}}</p>
        </div>
        <div class="col-lg-8 col-md-7 col-sm-12 col-12">
            <p>{{$category->short_description}}</p>
            <p class="text-right"><a class="link-blue category-long-description" data-name="{{$category->name}}" data-description="{{$category->long_description}}" data-toggle="modal" data-target="#category-modal" href="">@lang('Click here to learn more')</a></p>
        </div>
    </div>

    @include('components/filters/show', [
        'url' => route('discover.category', $category->slug),
        'include' => ['levels', 'duration']
    ])

    <div id="lessons-container" class="row mt-2 justify-content-center w-100 position-relative ml-0">
        @include('pages/discover/lessons/show')
    </div>

</section>