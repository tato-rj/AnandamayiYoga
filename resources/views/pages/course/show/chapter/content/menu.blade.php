<div class="accordion" id="chapters-menu">
	@foreach($chapter->course->chapters as $courseChapter)
	<div class="card rounded-0 border-0">
		<div class="card-header border-left cursor-pointer" data-toggle="collapse" data-target="#chapter-{{$loop->iteration}}">
			<div>
				<p class="m-0 clamp-1"><strong>Chapter {{$loop->iteration}}</strong> | {{$courseChapter->name}}</p>
			</div>
		</div>
		<div id="chapter-{{$loop->iteration}}" class="collapse {{$courseChapter->id == $chapter->id ? 'show' : null}}" data-parent="#chapters-menu">
			<div class="list-group">
				@foreach($courseChapter->content as $lesson)

					<a href="{{route('user.course.chapter.show', [$courseChapter->course->slug, $courseChapter->id, $lesson->type, $lesson->id])}}" 
						class="py-3 list-group-item rounded-0 list-group-item-action {{$lesson->id == $content->id ? 'disabled text-blue' : null}}"
						style="border-left: 0; border-right: 0">

						<div class="d-flex justify-content-between align-items-center">
							<div>
								<span class="text-muted" style="font-size: .9em">
									<small>
										@if(auth()->user()->dateCompleted($lesson))
										<i class="fas fa-check-circle mr-1 text-success"></i>
										@endif
										{{strtoupper($lesson->type)}}
									</small>
								</span>
								<p class="m-0 clamp-1 text-left">{{$loop->iteration}}. {{$lesson->name}}</p>
							</div>
							<div>
								<span class="text-muted d-flex align-items-center flex-nowrap">
									@if($lesson->id == $content->id)
									<i class="fas fa-eye mr-2 text-blue"></i>
									@endif
									<strong>{{secondsToTime($lesson->duration) ?? null}}</strong>
								</span>
							</div>
						</div>
					</a>

				@endforeach
			</div>
			@include('pages/course/show/accordion/downloads', ['chapter' => $courseChapter])
		</div>
	</div>
	
	@endforeach
</div>