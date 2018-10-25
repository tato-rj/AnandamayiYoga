<div class="modal fade" id="add-discussion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create a discussion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form method="POST" action="{{route('user.course.discussion.store', $course->slug)}}">
          {{csrf_field()}}

          {{-- CHAPTER --}}
          <div class="form-group">
            <select class="form-control" name="chapter_id">
              <option selected disabled>Chapter (optional)</option>
              @foreach($course->chapters as $chapter)
              <option value="{{$chapter->id}}" 
                @if(! empty($chapter_id))
                {{$chapter_id == $chapter->id ? 'selected' : null}}
                @endif
                >{{"$loop->iteration. $chapter->name"}}</option>
              @endforeach
            </select>
          </div>

          {{-- SUBJECT --}}
          <div class="form-group">
            <input required type="text" class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" name="subject" value="{{ old('subject') }}" placeholder="What is this discussion about?">
            @if ($errors->has('subject'))
            <div class="invalid-feedback">
              {{ $errors->first('subject') }}
            </div>
            @endif
          </div>
          {{-- DESCRIPTION --}}
          <div class="form-group">
            <textarea required name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" placeholder="Write your question/comment here" rows="3">{{ old('body') }}</textarea>
            @if ($errors->has('body'))
            <div class="invalid-feedback">
              {{ $errors->first('body') }}
            </div>
            @endif
          </div>

          <div class="text-right">
            <button type="submit" class="btn-bold btn-xs btn-red">Ready to submit</button>
          </div>
          
        </form>
      </div>

    </div>
  </div>
</div>