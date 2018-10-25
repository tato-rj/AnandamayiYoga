<section id="scroll-mark" class="container py-4">
    <div class="row my-3">
    	
        @include('components/sections/title', [
            'title' => 'Reads',
            'subtitle' => 'Browse through our collection of articles and books'])

        @include('pages/reads/menu', ['learning' => 'btn-red'])

    </div>
    <div class="row">

        @foreach($topics as $topic => $articles)
            @component('pages/reads/learning/topic', ['topic' => $topic])
            <ul class="list-group list-group-flush">
                @foreach($articles as $article)
                    @include('pages/reads/learning/list', ['title' => $article])
                @endforeach
            </ul>
            @endcomponent
        @endforeach

    </div>
</section>
