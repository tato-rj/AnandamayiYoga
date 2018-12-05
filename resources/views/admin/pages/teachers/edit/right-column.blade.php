<div class="col-8">
  <div class="form-group">
    @include('admin.components.input-lang')
  </div>

  @editInput([
    'name' => 'name', 
    'label' => 'Name', 
    'lang' => null, 
    'id' => "name-{$teacher->id}", 
    'path' => "/admin/teachers/{$teacher->id}",
    'value' => $teacher->name
    ])

  <div class="row">
    @editInput([
      'name' => 'email', 
      'classes' => 'col',
      'label' => 'E-mail', 
      'lang' => null, 
      'id' => "email-{$teacher->id}", 
      'path' => "/admin/teachers/{$teacher->id}",
      'value' => $teacher->email
      ])

    @editInput([
      'name' => 'website', 
      'classes' => 'col',
      'label' => 'Website (optional)', 
      'lang' => null, 
      'id' => "website-{$teacher->id}", 
      'path' => "/admin/teachers/{$teacher->id}",
      'value' => $teacher->website
      ])
  </div>

  @editTrix([
    'name' => 'biography', 
    'label' => 'Biography', 
    'lang' => 'en', 
    'id' => "biography-{$teacher->id}", 
    'path' => "/admin/teachers/{$teacher->id}",
    'value' => $teacher->biography
    ])

  @editTrix([
    'name' => 'biography_pt', 
    'label' => 'Biografia', 
    'lang' => 'pt', 
    'id' => "biography_pt-{$teacher->id}", 
    'path' => "/admin/teachers/{$teacher->id}",
    'value' => $teacher->biography_pt
    ])
    @manager
    {{-- CATEGORIES --}}
    <div class="form-group edit-control" id="category-{{$teacher->id}}" name="category">

      @include('components.form.edit.label', [
        'title' => 'This teacher focuses on',
        'id' => "category-{$teacher->id}",
        'path' => route('admin.teachers.categories.update', $teacher->slug)
      ])

      <div class="row mx-2">
        @foreach($categories as $category)
        <div class="form-check custom-control custom-checkbox col-lg-6 col-md-6 col-sm-12 col-12">
          <input class="custom-control-input" 
            disabled 
            name="category[]" 
            type="checkbox" 
            id="category-{{$category->id}}" 
            value="{{$category->id}}" 
            @exists($teacher->categoriesIds(), $category->id) checked @endexists>
          <label class="mb-2 custom-control-label text-muted" for="category-{{$category->id}}">{{$category->name}}</label>
        </div>
        @endforeach
      </div>
    </div>
    @endmanager
</div>