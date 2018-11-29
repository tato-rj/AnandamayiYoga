<div class="row mb-7">
    <div class="col-12 mb-5 text-center ">
        <h2>@lang('Start now with a free program')</h2>
        <p class="lead text-center m-0">{!! __('Choose from the free programs below, or browse through our <a href="/discover/browse" class="link-red">classes library</a>. Enjoy!') !!}</p>
    </div>

    <div class="col-lg-10 col-md-10 col-sm-10 col-12 mx-auto">
        <div class="row justify-content-center">
            @foreach($freePrograms as $program)
            @include('components.program.card')
            @endforeach
        </div>
        <div class="text-center my-4">
            @component('components/buttons/simple', [
                'path' => route('discover.programs.index'),
                'weight' => 'bold',
                'color' => 'red',
                'label' => __('Browse all programs')])
            @endcomponent       
        </div>
    </div>
</div>