<div class="col-4">
  {{-- COVER IMAGE --}}
  @include('admin/components/uploads/image-add')
  
  {{-- VIDEO --}}
  @include('admin/components/uploads/video-add')

  {{-- COST --}}
  <div class="form-group">
      <div class="input-group mb-3">
          <div class="input-group-prepend">
              <span class="input-group-text">$</span>
          </div>
          <input type="number" name="cost" placeholder="Cost" value="{{old('cost')}}" required class="form-control">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
      </div>
  </div>

  {{-- LANGUAGE --}}
  <div class="form-group">
    <select name="language" class="form-control">
      <option>Select language</option>
      <option value="en">English</option>
      <option value="pt">Português</option>
    </select>
  </div>
</div>