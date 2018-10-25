<div class="row">
	<div class="col-4">
	  {{-- VIDEO --}}
	  @include('admin/components/uploads/video-edit', [
	    'video' => $content->video_path,
	    'path' => route('admin.courses.chapters.content.video.update', [$course->slug, $chapter->id, str_plural($content->type), $content->id])])
	   <span class="text-muted"><small>Duration: <strong>{{secondsToTime($content->duration)}}</strong></small></span>
	</div>

	<div class="col-8">
	  {{-- NAME --}}          
	  <div class="form-group edit-control" id="name-{{$content->id}}-{{$content->type}}" name="name">

	    @include('components/editing/label', [
	      'title' => 'The name of this lecture is',
	      'id' => "name-{$content->id}-{$content->type}",
	      'path' => route('admin.courses.chapters.content.update', [$course->slug, $chapter->id, str_plural($content->type), $content->id])
	    ])

	    <input type="text" disabled class="form-control" value="{{$content->name}}" name="name" placeholder="Lecture Name" >

	  </div>
	  {{-- DESCRIPTION --}}
	  <div class="form-group edit-control" id="description-{{$content->id}}-{{$content->type}}" name="description">
	    
	    @include('components/editing/label', [
	      'title' => 'This lecture is about',
	      'id' => "description-{$content->id}-{$content->type}",
	      'path' => route('admin.courses.chapters.content.update', [$course->slug, $chapter->id, str_plural($content->type), $content->id])
	    ])

	    <textarea disabled class="form-control" placeholder="Description" rows="3">{{$content->description}}</textarea>

	  </div>

	</div>
</div>
