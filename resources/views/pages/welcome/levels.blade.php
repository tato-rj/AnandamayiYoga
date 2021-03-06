<div class="row bg-fusition-relative mb-7 py-6 bg-light" style="background-image: url({{cloud('app/misc/mandala.png')}});
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;">

    <div class="col-12 mb-5 text-center ">
        <h2>@lang('Choose the best practice for you')</h2>
        <p class="lead text-center m-0">@lang('Let\'s find you the right classes to start your <strong>15 day free trial.</strong>')</p>
    </div>

    <div class="col-lg-8 col-md-10 col-sm-8 col-10 mx-auto">
        <div class="row">
        @foreach($levels as $level)
            @include('pages/welcome/level-card')
        @endforeach
        </div>
    </div>
</div>