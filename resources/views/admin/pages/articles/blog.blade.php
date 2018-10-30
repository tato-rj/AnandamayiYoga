@extends('admin/layouts/app')

@section('content')

@include('admin/components/page-title', [
  'title' => 'Blog',
  'subtitle' => "Showing {$articles->firstItem()}-{$articles->lastItem()} of a total of {$articles->total()} posts"
])

<div class="row">
  {{-- PLUS --}}
  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-4">
    <a href="{{route('admin.articles.create', 'blog')}}">
      <div class="rounded cursor-pointer position-relative p-0 t-2 h-100" style="border: dashed 10px lightgrey; min-height: 271.6px">
        <i class="fas fa-plus fa-4x absolute-center" style="color: lightgrey"></i>
      </div>
    </a>
  </div>

  {{-- CARDS --}}
  @foreach($articles as $article)
    @include('admin/components/cards/article')
  @endforeach
</div>
{{-- PAGINATION --}}
<div class="row mt-4">
    <div class="d-flex align-items-center w-100 justify-content-center my-4">
    {{ $articles->links() }}    
    </div>
</div>

@component('admin/components/modals/delete', ['title' => 'Delete article'])
Are you sure you want to delete this article?
@endcomponent

@endsection

@section('scripts')
<script src="{{asset('js/modal.delete.js')}}"></script>
@endsection