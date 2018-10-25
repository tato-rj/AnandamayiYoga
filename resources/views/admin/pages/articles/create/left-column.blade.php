<div class="col-lg-3 col-md-4 col-sm-12 col-12">
  {{-- COVER IMAGE --}}
  @include('admin/components/uploads/image-add')
  {{-- TOPICS --}}
  <div class="form-group row">
    @foreach($topics as $topic)
		<div class="form-check custom-control custom-checkbox col-6">
			<input 
				class="custom-control-input" 
				required
				name="topic[]" 
				type="checkbox" 
				id="topic-{{$topic->id}}" 
				value="{{$topic->id}}"
				@oldArray('topic', "{$topic->id}") checked @endoldArray>
			<label class="mb-2 custom-control-label text-muted" for="topic-{{$topic->id}}">{{$topic->name}}</label>
		</div>
    @endforeach
  </div>
</div>
