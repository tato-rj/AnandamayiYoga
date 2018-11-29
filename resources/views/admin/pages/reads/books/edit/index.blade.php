@extends('admin/layouts/app')

@section('content')

@component('admin/components/page-title', ['title' => 'Edit the book'])
  @slot('subtitle')
    <a href="{{route('admin.reads.books.admin')}}" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>Return to view all books</a>
  @endslot
@endcomponent

<div class="row">
  
    @include('admin/pages/reads/books/edit/left-column')
    
    @include('admin/pages/reads/books/edit/right-column')

</div>

@endsection

@section('scripts')
<script src="{{asset('js/edit.inputs.js')}}"></script>
@endsection