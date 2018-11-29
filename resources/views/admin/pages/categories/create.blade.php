@extends('admin/layouts/app')

@section('content')

@component('admin/components/page-title', ['title' => 'Create a new category'])
  @slot('subtitle')
    <a href="{{route('admin.categories.index')}}" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>Return to view all categories</a>
  @endslot
@endcomponent

<div class="row">

    <form method="POST" action="/admin/categories" class="col-6">
      @csrf        
      <div class="form-group">
          @include('admin.components.input-lang')
        </div>
      <div class="form-group">
        @input(['lang' => 'en', 'name' => 'name', 'label' => 'Category name', 'value' => old('name')])
        @input(['lang' => 'pt', 'name' => 'name_pt', 'label' => 'Nome da categoria', 'value' => old('name_pt')])
      </div>
      <div class="form-group">
        @input(['lang' => 'en', 'name' => 'subtitle', 'label' => 'Subtitle', 'value' => old('subtitle')])
        @input(['lang' => 'pt', 'name' => 'subtitle_pt', 'label' => 'Subtítulo', 'value' => old('subtitle_pt')])
      </div>
      <div class="form-group">
        @textarea(['lang' => 'en', 'name' => 'short_description', 'label' => 'Short description', 'value' => old('short_description')])
        @textarea(['lang' => 'pt', 'name' => 'short_description_pt', 'label' => 'Descrição curta', 'value' => old('short_description_pt')])
      </div>
      <div class="form-group">
        @trix(['lang' => 'en', 'name' => 'long_description', 'label' => 'Full description', 'value' => old('long_description')])
        @trix(['lang' => 'pt', 'name' => 'long_description_pt', 'label' => 'Descrição completa', 'value' => old('long_description_pt')])
      </div>
      <div class="text-right">
        <button type="submit" class="btn-bold btn-red">Save</button>
      </div>
    </form>
</div>

@endsection