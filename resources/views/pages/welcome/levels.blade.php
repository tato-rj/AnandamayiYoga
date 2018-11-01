    {{-- @title(['title' => 'Choose the best practice for you']) --}}
<div class="row bg-fusition-relative mb-7">
    {{-- <div class="overlay-dark w-100 h-100 bg-light z-0"></div> --}}
    {{-- <section class="container py-5"> --}}
        {{-- <div class="row text-center"> --}}

            <div class="col-12 mb-5 text-center ">
                <h2>@lang('Choose the best practice for you')</h2>
                <p class="lead text-center m-0">@lang('Let\'s find you the right classes to start your <strong>15 day free trial.</strong>')</p>
            </div>

                <div class="col-8 mx-auto">
                    <div class="row">
                    @foreach($levels as $level)

                            @include('pages/welcome/level-card', [
                                'id' => $level->id,
                                'name' => $level->name,
                                'delay' => $loop->iteration*100
                            ])

                    @endforeach
                </div>
        </div>
{{-- 
        </div>
    </section> --}}
</div>