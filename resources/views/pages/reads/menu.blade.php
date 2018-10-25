<div class="col-12 mb-4">
    <div class="d-flex flex-row flex-wrap justify-content-center">
        <a href="{{route('reads.articles.index')}}" class="btn-not-bold mobile-block m-2 btn-lg rounded-0 {{$articles or 'btn-outline-red'}}">Articles</a>
        <a href="{{route('reads.learning.index')}}" class="btn-not-bold mobile-block m-2 btn-lg rounded-0 {{$learning or 'btn-outline-red'}}">Learning about Yoga</a>
        <a href="{{route('reads.books')}}" class="btn-not-bold mobile-block m-2 btn-lg rounded-0 {{$books or 'btn-outline-red'}}">Books</a>
    </div>
</div>