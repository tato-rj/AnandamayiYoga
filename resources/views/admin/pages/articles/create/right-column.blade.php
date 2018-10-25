<div class="col-lg-9 col-md-8 col-sm-12 col-12">
  {{-- TITLE --}}
  <div class="form-group">
    <input required type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" value="{{ old('title') }}" placeholder="Title">
    <p class="m-0 ml-2 text-danger" id="validate-name" style="display: none;"><small>An article with this title already exists</small></p>
    @if ($errors->has('title'))
    <div class="invalid-feedback">
      {{ $errors->first('title') }}
    </div>
    @endif
  </div>

  {{-- AUTHOR --}}
  <div class="form-group">
    <input required type="text" class="form-control {{ $errors->has('author') ? 'is-invalid' : '' }}" name="author" value="{{ old('author') }}" placeholder="Written by">
    @if ($errors->has('author'))
    <div class="invalid-feedback">
      {{ $errors->first('author') }}
    </div>
    @endif
  </div>

  {{-- SUMMARY --}}
  <div class="form-group">
    <textarea class="form-control" name="summary" rows="5" placeholder="Summary"></textarea>
    @if ($errors->has('summary'))
    <div class="invalid-feedback">
      {{ $errors->first('summary') }}
    </div>
    @endif
  </div>

  {{-- CONTENT --}}
  <div class="form-group">
    <input type="hidden" id="trix-content" name="content" value="{{old('content')}}">
    <trix-editor input="trix-content" placeholder="Content" required style="height: 560px"></trix-editor>
    @if ($errors->has('content'))
    <div class="invalid-feedback">
      {{ $errors->first('content') }}
    </div>
    @endif
  </div>

  <div class="form-group text-right">
    
    @include('components/buttons/spinner', [
      'classes' => 'btn btn-red block-screen-button',
      'label' => 'All done, create the article!'])

  </div>
</div>