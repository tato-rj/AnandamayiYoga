<div class="mb-7">
  @include('pages.user.routine.form.sections.title', [
    'title' => __('WE NEED TO KNOW A LITTLE MORE ABOUT YOU...'),
    'subtitle' => $teacher->name . __(' will use your answers to create your Yoga routine.')])

  @include('pages.user.routine.form.sections.progress-bar')

  <div id="questions-carousel" class="carousel slide" data-interval="false">
    <div class="carousel-inner">
      @foreach($teacher->questionaire->questionsLocale as $question)
      <div class="carousel-item px-2 {{$loop->first ? 'active' : null}}">
        <div class="text-center mb-4 text-muted">
          <small>@lang('Question') {{$loop->iteration}} of {{$loop->count}}</small>
        </div>
        <p><span class="text-red"><strong>@lang('Question')</strong></span><span> | {{$question}}</span></p>
        <div class="form-group">
          <input type="hidden" name="questions[]" value="{{$question}}">
          <textarea class="form-control" rows="3" name="answers[]"></textarea>
        </div>
        @include('pages.user.routine.form.sections.controls', ['first' => $loop->first])
      </div>
      @endforeach
      <div class="carousel-item">
        @include('pages.user.routine.form.sections.submit')
      </div>
    </div>
  </div>
</div>