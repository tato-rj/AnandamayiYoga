<div class="col-lg-9 col-md-8 col-sm-12 col-12">

  @editInput([
    'name' => 'name', 
    'label' => 'The name of this course is', 
    'lang' => null, 
    'id' => "name-{$course->id}", 
    'path' => "/admin/courses/{$course->id}",
    'value' => $course->name
    ])

  @editTextarea([
    'name' => 'headline', 
    'label' => 'A quick description for this course is', 
    'lang' => null, 
    'id' => "headline-{$course->id}", 
    'path' => "/admin/courses/{$course->id}",
    'value' => $course->headline
    ])

  @editTrix([
    'name' => 'description', 
    'label' => 'A complete description of this course is', 
    'lang' => null, 
    'id' => "description-{$course->id}", 
    'path' => "/admin/courses/{$course->id}",
    'value' => $course->description
    ])

  {{-- TEACHERS --}}
  <div class="form-group edit-control" id="teachers-{{$course->id}}" name="teachers[]">
    @include('components.form.edit.label', [
      'title' => 'Teachers',
      'id' => "teachers-{$course->id}",
      'path' => "/admin/courses/{$course->id}/teachers"
    ])

    <select multiple name="teachers[]" disabled class="form-control">
       @foreach($teachers as $teacher)
       <option value="{{$teacher->id}}" 
        @exists($course->teachers, $teacher->id) selected @endexists>{{$teacher->name}}</option>
        @endforeach
    </select>
  </div>
 
  @include('admin/pages/courses/edit/buttons')
</div>