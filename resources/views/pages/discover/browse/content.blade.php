<section id="scroll-mark" class="container py-4">

    @title(['title' => 'Our Catalogue'])

    <div class="row">

        @include('pages/discover/menu', ['browse' => 'btn-red'])
        
    </div>

    <div class="row mt-4 mb-7">
        @foreach($categories as $category)
            @include('pages/discover/browse/show', [
                'url' => route('discover.category', $category->slug),
                'name' => $category->name])
        @endforeach
    </div>
</section>
