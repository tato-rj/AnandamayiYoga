@if($lessons->count() > 0)
<p class="m-0 text-muted"><small>Total of <span id="lessons-count">{{$lessons->total()}}</span> lessons</small></p>
@endif
<div class="d-flex align-items-center mb-7 flex-wrap w-100">
    @forelse($lessons as $lesson)
        @include('components/lesson/card', [
            'lesson' => $lesson,
            'sizes' => null
        ])
    @empty

    @include('components/filters/empty')

    @endforelse
    <div class="d-flex align-items-center w-100 justify-content-center mt-4">
    {{ $lessons->links() }}    
    </div>
</div>