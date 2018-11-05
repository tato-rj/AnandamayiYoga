<div class="col-lg-3 col-md-4 col-sm-12 col-12">
  {{-- COVER IMAGE --}}
  @include('admin/components/uploads/image-add')
  {{-- TOPICS --}}
  	<div class=" my-4 mx-2">
	  	<label class="d-block text-muted"><small>This post is about</small></label>
	  	<div class="form-group">
		    @foreach($topics as $topic)
				<div class="form-check custom-control custom-checkbox">
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
</div>
