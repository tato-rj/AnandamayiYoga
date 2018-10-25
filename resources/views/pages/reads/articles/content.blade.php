<section id="scroll-mark" class="container py-4">
    <div class="row my-3">
    	
        @component('components/sections/title', [
            'title' => 'Reads'])
            @slot('subtitle')
            Browse through our collection of articles and books. If you couldn't find what you're looking for, please <a href="{{route('support.contact.show')}}" class="link-blue">let us know</a>!
            @endslot
        @endcomponent

        @include('pages/reads/menu', ['articles' => 'btn-red'])
        
        <div class="col-lg-9 col-md-9 col-sm-9 col-12">
            @if(request()->has('topic'))
            <div class="row mx-4">
                <div class="col-12">
                    <div class="bg-light rounded px-2 py-1 text-right d-flex justify-content-between align-items-center">
                        <p class="m-0"><i class="fas fa-tags"></i></p>
                        <p class="m-0">about <strong>{{str_replace('-', ' ', request('topic'))}}</strong></p>
                    </div>
                </div>
            </div>
            @endif
            @foreach($articles as $article)
                @include('pages/reads/articles/item')
            @endforeach
        </div>

        @include('pages/reads/articles/sidebar')

    </div>
</section>
