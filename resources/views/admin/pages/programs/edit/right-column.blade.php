<div class="col-8">
  {{-- NAME --}}          
  <div class="form-group edit-control" id="name-{{$program->id}}" name="name">

    @include('components/editing/label', [
      'title' => 'The name of this program is',
      'id' => "name-{$program->id}",
      'path' => "/admin/programs/{$program->id}"])
    
    <input type="text" disabled class="form-control" value="{{$program->name}}" name="name" placeholder="Program Name" >

  </div>
  {{-- DESCRIPTION --}}
  <div class="form-group edit-control" id="description-{{$program->id}}" name="description">
    
    @include('components/editing/label', [
      'title' => 'This program is about',
      'id' => "description-{$program->id}",
      'path' => "/admin/programs/{$program->id}"])

    <textarea disabled class="form-control" placeholder="Description" rows="3">{{$program->description}}</textarea>

  </div>

  {{-- CATEGORIES --}}
  <div class="form-group edit-control" id="category-{{$program->id}}" name="category">

    @include('components/editing/label', [
      'title' => 'This program is good for',
      'id' => "category-{$program->id}",
      'path' => "/admin/programs/{$program->id}/categories"])
    
    <div class="row mx-2">
      @foreach($categories as $category)
      <div class="form-check custom-control custom-checkbox col-lg-6 col-md-6 col-sm-12 col-12">
        <input class="custom-control-input" disabled name="category[]" type="checkbox" id="category-{{$category->id}}" value="{{$category->id}}" 
          @exists($program->categories->pluck('id'), $category->id) checked @endexists>
        <label class="mb-2 custom-control-label text-muted" for="category-{{$category->id}}">{{$category->name}}</label>
      </div>
      @endforeach
    </div>
  </div>
  
  {{-- LESSONS --}}
  <div class="mt-2 pt-4 border-top edit-control" id="lessons-{{$program->id}}" name="lessons">

    @include('components/editing/label', [
      'title' => 'This program has the following lessons',
      'id' => "lessons-{$program->id}",
      'path' => "/admin/programs/{$program->id}/lessons"])

    <div class="row">
      @include('admin/components/dragndrop/edit')
    </div>
  </div>
</div>