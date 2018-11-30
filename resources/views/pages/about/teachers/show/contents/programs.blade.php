@if($teacher->programs()->exists())
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto">
            <h4 class="mb-2 pb-3 border-bottom">@lang('My Programs')</h4>
            <div class="d-flex align-items-center flex-wrap w-100">
                @foreach($teacher->programs as $program)
                    @include('components/program/card', ['program' => $program])
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif