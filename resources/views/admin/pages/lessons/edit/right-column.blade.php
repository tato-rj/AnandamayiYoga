<div class="col-8">
  {{-- NAME --}}          
  <div class="form-group edit-control" id="name-{{$lesson->id}}" name="name">

    @include('components/editing/label', [
      'title' => 'The name of this lesson is',
      'id' => "name-{$lesson->id}",
      'path' => "/office/classes/{$lesson->id}"
    ])
    
    <input type="text" disabled class="form-control" value="{{$lesson->name}}" name="name" placeholder="Class Name" >

  </div>
  {{-- DESCRIPTION --}}
  <div class="form-group edit-control" id="description-{{$lesson->id}}" name="description">
    
    @include('components/editing/label', [
      'title' => 'This lesson is about',
      'id' => "description-{$lesson->id}",
      'path' => "/office/classes/{$lesson->id}"
    ])

    <textarea disabled class="form-control" placeholder="Description" rows="3">{{$lesson->description}}</textarea>

  </div>

    {{-- CATEGORIES --}}
    <div class="form-group edit-control" id="category-{{$lesson->id}}" name="category">

      @include('components/editing/label', [
        'title' => 'This lesson is good for',
        'id' => "category-{$lesson->id}",
        'path' => "/office/classes/{$lesson->id}/categories"
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
            @exists($lesson->categoriesIds(), $category->id) checked @endexists>
          <label class="mb-2 custom-control-label text-muted" for="category-{{$category->id}}">{{$category->name}}</label>
        </div>
        @endforeach
      </div>
    </div>

    {{-- LEVELS --}}
    <div class="form-group edit-control" id="levels-{{$lesson->id}}" name="levels">
      @include('components/editing/label', [
        'title' => 'The Yoga level is',
        'id' => "levels-{$lesson->id}",
        'path' => "/office/classes/{$lesson->id}/levels"
      ])

      @foreach($levels as $level)
      <div class="form-check custom-control custom-checkbox d-inline mx-2">
        <input class="custom-control-input" 
          disabled
          name="levels[]" 
          type="checkbox" 
          id="level-{{$level->id}}" 
          value="{{$level->id}}"
          @exists($lesson->levels()->pluck('id'), $level->id) checked @endexists>
        <label class="mb-2 custom-control-label text-muted" for="level-{{$level->id}}">{{$level->name}}</label>
      </div>
      @endforeach
    </div>

  <div class="row">
    {{-- PROGRAM --}}
    <div class="form-group edit-control col" name="program_id" id="program_id-{{$lesson->id}}">
      
      @include('components/editing/label', [
        'title' => 'This lesson is part of the program',
        'id' => "program_id-{$lesson->id}",
        'path' => "/office/classes/{$lesson->id}"
      ])

      <select disabled class="form-control">
        <option selected value="">No program</option>
        @foreach($programs as $program)
          <option value="{{$program->id}}" @match($lesson->program_id, $program->id) selected @endmatch>{{$program->name}}</option>
        @endforeach
      </select>

    </div>

    {{-- COST --}}
    <div class="form-group edit-control col" id="is_free-{{$lesson->id}}" name="is_free">
      
      @include('components/editing/label', [
        'title' => 'Is this lesson free?',
        'id' => "is_free-{$lesson->id}",
        'path' => "/office/classes/{$lesson->id}"
      ])

      <div class="custom-control custom-radio custom-control-inline">
        <input disabled type="radio" id="is_free-yes" name="cost" value="1" class="custom-control-input"
        @match($lesson->is_free, true) checked @endmatch>
        <label class="custom-control-label" for="is_free-yes">Yes</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input disabled type="radio" id="is_free-no" name="cost" value="0" class="custom-control-input"
        @match($lesson->is_free, false) checked @endmatch>
        <label class="custom-control-label" for="is_free-no">No</label>
      </div>
    </div>
  </div>

  <div class="row">
    {{-- TEACHER --}}
    <div class="form-group edit-control col" name="teacher_id" id="teacher_id-{{$lesson->id}}">
      
      @include('components/editing/label', [
        'title' => 'This lesson is taught by',
        'id' => "teacher_id-{$lesson->id}",
        'path' => "/office/classes/{$lesson->id}"
      ])

      <select disabled class="form-control">
        <option selected value="">No teacher</option>
        @foreach($teachers as $teacher)
          <option value="{{$teacher->id}}" @match($lesson->teacher_id, $teacher->id) selected @endmatch>{{$teacher->name}}</option>
        @endforeach
      </select>

    </div>

    <div class="col">

    </div>
  </div>
</div>