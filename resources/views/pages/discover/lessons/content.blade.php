<section id="scroll-mark" class="container py-4">
    
    @title(['title' => 'Our Catalogue'])

    <div class="row">

        @include('pages/discover/menu', ['classes' => 'btn-red'])
        
        <div class="col-12 mb-2">
            @include('components/filters/show', [
                'url' => route('discover.classes.index'),
                'include' => ['levels', 'categories', 'duration']
            ])
        </div>

        <div id="lessons-container" class="row justify-content-center w-100 position-relative ml-0">
            @include('pages/discover/lessons/show')
        </div>
    
    </div>

</section>
