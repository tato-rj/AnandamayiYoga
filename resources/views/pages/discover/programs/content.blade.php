<section id="scroll-mark" class="container py-4">

    <div class="row my-3">

        @include('components/sections/title', [
            'title' => 'Our Catalogue',
            'subtitle' => 'Browse through our collection of videos for teachers & practitioners. We are constantly creating new videos and programs for you, enjoy!'])
        
        @include('pages/discover/menu', ['programs' => 'btn-red'])
        
        <div class="col-12 mb-2">
            @include('components/filters/show', [
                'url' => route('discover.programs.index'),
                'include' => ['duration', 'categories']
            ])
        </div>
        
        <div id="programs-container" class="row w-100 position-relative ml-0">
            
            @include('pages/discover/programs/show')

        </div>
        
    </div>

</section>
