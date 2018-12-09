<div class="mb-4 d-flex align-items-center">
    <div class="p-4">
        <a href="{{$link}}" class="link-none"><img src="{{cloud($teacher->image_path)}}" class="rounded-circle" width="120"></a>
    </div>
    <div>
        <a href="{{$link}}" class="link-none"><h5 class="mb-0">{{$teacher->name}}</h5></a>
        <div>
            @if($teacher->name == 'Anandamayi')
            <p class="m-0 text-red"><small><strong>@lang('Founder of AnandamayiYoga')</strong></small></p>
            @else
            <small class="text-muted">@lang('I focus on') </small>
            @include('components.categories.list', ['list' => $teacher->categories])
            @endif
        </div>
    </div>
</div>