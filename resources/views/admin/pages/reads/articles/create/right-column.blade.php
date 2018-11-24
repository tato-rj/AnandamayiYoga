<div class="col-lg-9 col-md-8 col-sm-12 col-12 mx-auto">
  <div class="form-group d-flex align-items-center justify-content-between">
    @include('admin.components.input-lang')
    <div id="pin" class="cursor-pointer" title="Click to pin this article to the top">
        <i class="fas fa-thumbtack"></i>
        <input type="hidden" name="is_pinned" value="0">
    </div>
  </div>

  {{-- TITLE --}}
  <div class="form-group">
    @input(['lang' => 'en', 'name' => 'title', 'label' => 'Title', 'value' => old('title')])
    <p class="m-0 ml-2 text-danger" id="validate-title" style="display: none;"><small>A lesson with this title already exists</small></p>
    @input(['lang' => 'pt', 'name' => 'title_pt', 'label' => 'Título', 'value' => old('title_pt')])
  </div>

  {{-- CONTENT --}}
  <div class="form-group">
    @trix(['lang' => 'en', 'name' => 'content', 'label' => 'Content', 'value' => old('content')])
    @trix(['lang' => 'pt', 'name' => 'content_pt', 'label' => 'Conteúdo', 'value' => old('content_pt')])
  </div>

  <div class="form-group text-right">
    
    @include('components/buttons/spinner', [
      'classes' => 'btn btn-red block-screen-button',
      'label' => 'All done, create the article!'])

  </div>
</div>