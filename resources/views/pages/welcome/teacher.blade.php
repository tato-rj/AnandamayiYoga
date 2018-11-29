<section class="container pb-4">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-10 col-12 mx-auto p-5 text-center">
            <img src="{{cloud(anandamayi()->image_path)}}" class="w-100 border p-1" style="border-color: rgba(0,0,0,0.075) !important">
        </div>
        <div class="col-lg-9 col-md-8 col-12">
            <h5 class="m-0"><strong>@lang('About') Anandamayi</strong></h5>
            <p class="text-muted"><small>@lang('YogaAlliance Registered Yoga Teacher')</small></p>
            <p>{{preview(anandamayi()->biography, 27)}}</p>
            <a href="{{route('about.anandamayi')}}" class="link-blue">@lang('Learn more')</a>
        </div>
    </div>
</section>
