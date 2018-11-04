  @editInput([
    'name' => 'name', 
    'label' => 'The name of this assignment is', 
    'lang' => null, 
    'id' => "name-{$content->id}", 
    'path' => route('admin.courses.chapters.content.update', [$course->slug, $chapter->id, str_plural($content->type), $content->id]),
    'value' => $content->name
    ])

  @editTextarea([
    'name' => 'question', 
    'label' => 'The question for this assignment is', 
    'lang' => null, 
    'id' => "question-{$content->id}", 
    'path' => route('admin.courses.chapters.content.update', [$course->slug, $chapter->id, 'assignments', $content->id]),
    'value' => $content->question
    ])
