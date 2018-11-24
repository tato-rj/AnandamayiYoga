<section id="scroll-mark" class="container py-4">

    @title(['title' => 'Yoga Resources for Teachers & Practicioners'])

    <div class="row">

        @include('pages/reads/articles/menu')

    </div>

    <div class="d-flex flex-wrap mb-4">

        @foreach($articles as $article)
        @include('pages.reads.articles.card')
        @endforeach

    </div>

    <div class="d-flex align-items-center w-100 justify-content-center mb-4">
    {{ $articles->links() }}    
    </div>
</section>
