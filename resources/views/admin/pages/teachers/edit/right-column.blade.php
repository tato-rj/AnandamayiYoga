<div class="col-8">
  {{-- NAME --}}
  <div class="form-group edit-control" id="name-{{$teacher->id}}" name="name">

    @include('components/editing/label', [
      'title' => 'Name',
      'id' => "name-{$teacher->id}",
      'path' => "/admin/teachers/{$teacher->id}"
    ])
    
    <input type="text" disabled class="form-control" value="{{$teacher->name}}" name="name">

  </div>

  <div class="row">
    {{-- EMAIL --}}
    <div class="col form-group edit-control" id="email-{{$teacher->id}}" name="email">

      @include('components/editing/label', [
        'title' => 'E-mail',
        'id' => "email-{$teacher->id}",
        'path' => "/admin/teachers/{$teacher->id}"
      ])
      
      <input type="text" disabled class="form-control" value="{{$teacher->email}}" name="email">

    </div>

    {{-- WEBSITE --}}
    <div class="col form-group edit-control" id="website-{{$teacher->id}}" name="website">

      @include('components/editing/label', [
        'title' => 'Website (optional)',
        'id' => "website-{$teacher->id}",
        'path' => "/admin/teachers/{$teacher->id}"
      ])
      
      <input type="text" disabled class="form-control" value="{{$teacher->website}}" name="website">

    </div>
  </div>

  {{-- BIOGRAPHY --}}
  <div class="form-group edit-control" id="biography-{{$teacher->id}}" name="biography">
    
    @include('components/editing/label', [
      'title' => 'Biography',
      'id' => "biography-{$teacher->id}",
      'path' => "/admin/teachers/{$teacher->id}"
    ])

    <input type="hidden" bind="trix" id="trix-biography" name="biography" value="{{$teacher->biography}}">
    <trix-editor input="trix-biography" style="height: 180px" class="trix-disabled"></trix-editor>

  </div>

    {{-- CATEGORIES --}}
    <div class="form-group edit-control" id="category-{{$teacher->id}}" name="category">

      @include('components/editing/label', [
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

</div>