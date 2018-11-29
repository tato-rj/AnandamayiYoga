@extends('admin/layouts/app')

@section('content')

@component('admin/components/page-title', ['title' => 'Edit category'])
  @slot('subtitle')
    <a href="{{route('admin.categories.index')}}" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>Return to view all categories</a>
  @endslot
@endcomponent

<div class="row">
	<div class="col-6">
		<div class="form-group">
			@include('admin.components.input-lang')
		</div>

		@editInput([
			'name' => 'name', 
			'label' => 'The name of this category is', 
			'lang' => 'en', 
			'id' => "name-{$category->id}", 
			'path' => route('admin.categories.update', $category->id),
			'value' => $category->name
			])

		@editInput([
			'name' => 'name_pt', 
			'label' => 'O nome dessa categoria é', 
			'lang' => 'pt', 
			'id' => "name_pt-{$category->id}", 
			'path' => route('admin.categories.update', $category->id),
			'value' => $category->name_pt
			])

		@editInput([
			'name' => 'subtitle', 
			'label' => 'The subtitle of this category is', 
			'lang' => 'en', 
			'id' => "subtitle-{$category->id}", 
			'path' => route('admin.categories.update', $category->id),
			'value' => $category->subtitle
			])

		@editInput([
			'name' => 'subtitle_pt', 
			'label' => 'O subtítulo dessa categoria é', 
			'lang' => 'pt', 
			'id' => "subtitle_pt-{$category->id}", 
			'path' => route('admin.categories.update', $category->id),
			'value' => $category->subtitle_pt
			])

		@editTextarea([
			'name' => 'short_description', 
			'label' => 'The short description of this category is', 
			'lang' => 'en', 
			'id' => "short_description-{$category->id}", 
			'path' => route('admin.categories.update', $category->id),
			'value' => $category->short_description
			])

		@editTextarea([
			'name' => 'short_description_pt', 
			'label' => 'A descrição curta dessa categoria é', 
			'lang' => 'pt', 
			'id' => "short_description_pt-{$category->id}", 
			'path' => route('admin.categories.update', $category->id),
			'value' => $category->short_description_pt
			])

		@editTrix([
			'name' => 'long_description', 
			'label' => 'The long description of this category is', 
			'lang' => 'en', 
			'id' => "long_description-{$category->id}", 
			'path' => route('admin.categories.update', $category->id),
			'value' => strip_tags($category->long_description, '<br><strong><em><img><sub><sup><small><div><h1><h2><p>')
			])

		@editTrix([
			'name' => 'long_description_pt', 
			'label' => 'A descrição completa dessa categoria é', 
			'lang' => 'pt', 
			'id' => "long_description_pt-{$category->id}", 
			'path' => route('admin.categories.update', $category->id),
			'value' => strip_tags($category->long_description_pt, '<br><strong><em><img><sub><sup><small><div><h1><h2><p>')
			])

	</div>
</div>

@endsection

@section('scripts')
<script src="{{asset('js/edit.inputs.js')}}"></script>
<script src="{{asset('js/trix.files.js')}}"></script>
@endsection