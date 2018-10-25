<section id="scroll-mark" class="container py-4">
    <div class="row my-3">
        
        @include('components/sections/title', [
            'title' => 'Our Catalogue',
            'subtitle' => 'Browse through our collection of videos for teachers & practitioners. We are constantly creating new videos and programs for you, enjoy!'])

        @include('pages/discover/menu', ['browse' => 'btn-red'])
        
    </div>

    <div class="row mt-4 mb-7">
        @foreach($categories as $category)
            @component('pages/discover/browse/show', ['url' => route('discover.category', $category->slug)])
            {{$category->name}}
            @endcomponent
        @endforeach
    </div>
</section>
