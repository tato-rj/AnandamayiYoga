<div class="col-lg-9 col-md-8 col-sm-12 col-12 mx-auto">
  {{-- TITLE --}}
  <div class="form-group">
    @input(['name' => 'title', 'label' => 'Title', 'value' => old('title')])
  </div>
  
  {{-- SUBTITLE --}}
  <div class="form-group">
    @input(['name' => 'subtitle', 'label' => 'Subtitle', 'value' => old('subtitle')])
  </div>

  {{-- DESCRIPTION --}}
  <div class="form-group">
    @trix(['name' => 'description', 'label' => 'Description', 'value' => old('description')])
  </div>

  {{-- AMAZON --}}
  <div class="form-group">
    @input(['name' => 'amazon_url', 'label' => 'Amazon URL', 'value' => old('amazon_url')])
  </div>
</div>