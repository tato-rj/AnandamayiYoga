<div class="col-lg-9 col-md-8 col-sm-12 col-12">
  {{-- NAME --}}          
  <div class="form-group edit-control" id="name-{{$course->id}}" name="name">

    @component('components/editing/label', [
      'title' => 'The name of this course is',
      'id' => "name-{$course->id}",
      'path' => "/office/courses/{$course->id}"
    ])
    @endcomponent
    
    <input type="text" disabled class="form-control" value="{{$course->name}}" name="name" placeholder="Course Name" >

  </div>

  {{-- SHORT DESCRIPTION --}}          
  <div class="form-group edit-control" id="headline-{{$course->id}}" name="headline">

    @component('components/editing/label', [
      'title' => 'A short description of this course is',
      'id' => "headline-{$course->id}",
      'path' => "/office/courses/{$course->id}"
    ])
    @endcomponent
    
    <textarea disabled class="form-control" name="headline" placeholder="Short description" rows="3">{{$course->headline}}</textarea>

  </div>

  {{-- LONG DESCRIPTION --}}
  <div class="form-group edit-control" id="description-{{$course->id}}" name="description">
    
    @include('components/editing/label', [
      'title' => 'A long description of this course is',
      'id' => "description-{$course->id}",
      'path' => "/office/courses/{$course->id}"
    ])

    <input type="hidden" bind="trix" id="trix-description" name="description" value="{{$course->description}}">
    <trix-editor input="trix-description" style="height: 260px" class="trix-disabled"></trix-editor>

  </div>

  {{-- TEACHERS --}}
  <div class="form-group edit-control" id="teachers-{{$course->id}}" name="teachers[]">
    @include('components/editing/label', [
      'title' => 'Teachers',
      'id' => "teachers-{$course->id}",
      'path' => "/office/courses/{$course->id}/teachers"
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