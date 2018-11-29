<div class="col-lg-3 col-md-4 col-sm-12 col-12">
  {{-- COVER IMAGE --}}
  @include('admin/components/uploads/image-add')
  {{-- LANGUAGE --}}
  <div class="form-group">
    <select required class="form-control {{ $errors->has('lang') ? 'is-invalid' : '' }}" name="lang">
      <option disabled selected>Language</option>
      <option value="en" @old('lang', 'en') selected @endold>English</option>
      <option value="pt" @old('lang', 'pt') selected @endold>Português</option>
    </select>
    @include('components/feedback/form', ['field' => 'lang'])
  </div>
</div>
