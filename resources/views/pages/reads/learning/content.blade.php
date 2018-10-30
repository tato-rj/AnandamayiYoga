<section id="scroll-mark" class="container py-4">
    <div class="row my-3">
    	
        @include('components/sections/title', [
            'title' => 'Learning about Yoga',
            'subtitle' => 'Resources for yoga teachers and practitioners. If you can\'t find what you\'re looking for, please let us know!'])

        @include('pages/reads/learning/menu')

    </div>

    <div class="card-columns mb-4">

        @foreach($articles as $article)
        
            <div class="card hover-shadow-light t-2">
                <a href="{{route('reads.learning.show', [$article->subject, $article->slug])}}" class="link-none">
                <div class="card-body">
                    <h5 class="card-title pb-2 text-uppercase" style="border-bottom: 2px solid #ef476f;">{{$article->title}}</h5>
                    <p class="card-text">{{$article->summary}}</p>
                </div>
                <div class="card-footer px-3 py-1">
                  <small class="text-muted">Last updated {{$article->updated_at->diffForHumans()}}</small>
                </div>
            </a>
            </div>
        
        @endforeach
    </div>

    <div class="d-flex align-items-center w-100 justify-content-center mb-4">
    {{ $articles->links() }}    
    </div>
</section>
