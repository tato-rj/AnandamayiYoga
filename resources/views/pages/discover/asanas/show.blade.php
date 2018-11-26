@if($asanas->count() > 0)
<p class="m-0 text-muted"><small>@lang('Total of') <span id="asanas-count">{{$asanas->total()}}</span> asanas</small></p>
@endif
<div id="asanas-container" class="d-flex align-items-center mt-2 flex-wrap w-100">
    @forelse($asanas as $asana)

        @include('components/asana/card')

    @empty
    
        @include('components/filters/empty')

    @endforelse
    <div class="d-flex align-items-center w-100 justify-content-center my-4">
    {{ $asanas->links() }}    
    </div>
</div>