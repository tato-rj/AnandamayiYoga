<div class="col-8">
  <div class="form-group">
    @include('admin.components.input-lang')
  </div>

  @editInput([
    'name' => 'name', 
    'label' => 'The name of this program is', 
    'lang' => 'en', 
    'id' => "name-{$program->id}", 
    'path' => "/admin/programs/{$program->id}",
    'value' => $program->name
    ])

  @editInput([
    'name' => 'name_pt', 
    'label' => 'O nome desse programa é', 
    'lang' => 'pt', 
    'id' => "name_pt-{$program->id}", 
    'path' => "/admin/programs/{$program->id}",
    'value' => $program->name_pt
    ])

  @editTextarea([
    'name' => 'description', 
    'label' => 'This program is about', 
    'lang' => 'en', 
    'id' => "description-{$program->id}", 
    'path' => "/admin/programs/{$program->id}",
    'value' => $program->description
    ])

  @editTextarea([
    'name' => 'description_pt', 
    'label' => 'Esse programa é sobre', 
    'lang' => 'pt', 
    'id' => "description_pt-{$program->id}", 
    'path' => "/admin/programs/{$program->id}",
    'value' => $program->description_pt
    ])

  {{-- CATEGORIES --}}
  <div class="form-group edit-control" id="category-{{$program->id}}" name="category">

    @include('components.form.edit.label', [
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

    @include('components.form.edit.label', [
      'title' => 'This program has the following lessons',
      'id' => "lessons-{$program->id}",
      'path' => "/admin/programs/{$program->id}/lessons"])

    <div class="row">
      @include('admin/components/dragndrop/edit')
    </div>
  </div>
</div>