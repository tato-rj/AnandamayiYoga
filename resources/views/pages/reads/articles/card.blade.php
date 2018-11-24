<div class="p-2" style="width: 33.33%;">
    <div class="h-100 card hover-shadow-light t-2">
        <a href="{{route('reads.articles.show', [$article->topic->slug, $article->slug])}}" class="link-none">
            <div class="bg-full rounded-top" style="background-image: url({{cloud($article->image_path)}}); height: 200px"></div>
        </a>
        <div class="card-body d-flex justify-content-between flex-column">
            <div class="mb-2">
                <h5 class="card-title mb-0">{{$article->title}}</h5>
                <p class="text-muted mb-2"><small>published on {{$article->created_at->toFormattedDateString()}}</small></p>
                <p class="card-text" style="line-height: 1.2"><small>{{$article->preview(40)}}</small></p>
            </div>
            <div>
                <a href="{{route('reads.articles.show', [$article->topic->slug, $article->slug])}}" class="link-blue">@lang('Read more')</a>
            </div>
        </div>
    </div>
</div>