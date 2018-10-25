<div class="col-4">
  {{-- COVER IMAGE --}}
  @include('admin/components/uploads/image-add')
  
  {{-- VIDEO --}}
  @include('admin/components/uploads/video-add')

  {{-- COST --}}
  <div class="form-group">
      <label class="d-block text-muted"><small>This course costs (numbers only)</small></label>
      
      <div class="input-group mb-3">
          <div class="input-group-prepend">
              <span class="input-group-text">$</span>
          </div>
          <input type="number" name="cost" placeholder="Amount here" value="{{old('cost')}}" required class="form-control">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
      </div>
  </div>

</div>