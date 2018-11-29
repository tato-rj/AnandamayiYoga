@extends('admin/layouts/app')

@section('content')

@include('admin/components/page-title', [
  'title' => 'Books',
  'subtitle' => "Showing {$books->firstItem()}-{$books->lastItem()} of a total of {$books->total()} books"
])

<div class="row">
  {{-- PLUS --}}
  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-4">
    @include('admin/components/plus-card')
  </div>

  {{-- CARDS --}}
  @foreach($books as $book)
    @include('admin/components/cards/book')
  @endforeach
</div>
{{-- PAGINATION --}}
<div class="row mt-4">
    <div class="d-flex align-items-center w-100 justify-content-center my-4">
    {{ $books->links() }}    
    </div>
</div>

@include('admin/pages/reads/books/add/modal')

@component('admin/components/modals/delete', ['title' => 'Delete book'])
Are you sure you want to delete this book?
@endcomponent

@endsection

@section('scripts')
<script src="{{asset('js/modal.delete.js')}}"></script>
@endsection