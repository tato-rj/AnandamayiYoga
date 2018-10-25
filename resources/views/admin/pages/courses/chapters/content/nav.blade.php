<ul class="nav nav-pills nav-fill form-group my-4 extra-menu">
	<li class="nav-item">
		<button type="button" class="btn btn-xs btn-light text-blue" data-toggle="modal" data-target="#new-lecture-{{$chapter->id}}"><i class="fas fa-video mr-2"></i>Lecture</button>

	</li>
	<li class="nav-item">
		<button type="button" class="btn btn-xs btn-light text-blue" data-toggle="modal" data-target="#new-demonstration-{{$chapter->id}}"><i class="fas fa-video mr-2"></i>Demonstration</button>

	</li>
	<li class="nav-item">
		<button type="button" class="btn btn-xs btn-light text-blue" data-toggle="modal" data-target="#new-assignment-{{$chapter->id}}"><i class="fas fa-file mr-2"></i>Assignment</button>

	</li>
	<li class="nav-item">
		<button type="button" class="btn btn-xs btn-light text-blue" data-toggle="modal" data-target="#new-quiz-{{$chapter->id}}"><i class="fas fa-file mr-2"></i>Quiz</button>

	</li>
</ul>