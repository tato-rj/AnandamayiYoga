<div class="form jumbotron bg-light p-4">
	<div class="mx-2">
		<div class="form-group">
			<label class="d-block">I'm looking for classes about...</label>
			<div class="row mx-2">
				@foreach($categories as $category)
				<div class="form-check custom-control custom-checkbox col-lg-3 col-md-4 col-sm-6 col-12">
					<input 
						class="custom-control-input"
						required 
						name="categories[]" 
						type="checkbox" 
						id="category-{{$category->name}}" 
						value="{{$category->name}}"
						@oldArray('categories', "{$category->name}") checked @endoldArray>
					<label class="mb-2 custom-control-label text-muted" for="category-{{$category->name}}">{{$category->name}}</label>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>