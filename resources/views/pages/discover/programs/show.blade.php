@if($programs->count() > 0)

@endif
<div class="d-flex align-items-center mb-7 flex-wrap w-100">
    @forelse($programs as $program)
        @include('components/program/card', ['program' => $program])
    @empty

    @include('components/filters/empty')

    @endforelse
    <div class="d-flex align-items-center w-100 justify-content-center mt-4">
    {{ $programs->links() }}    
    </div>
</div>