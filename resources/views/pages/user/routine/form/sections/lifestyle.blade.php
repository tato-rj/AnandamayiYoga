<div class="form-row jumbotron bg-light p-4">
	<div class="col-lg-3 col-md-3 col-sm-12 col-12 px-2">
		<div class="form-group">
			<label>My Yoga level is...</label>
			@foreach($levels as $level)
			<div class="form-radio custom-control custom-radio">
				<input 
					class="custom-control-input"
					required 
					name="level" 
					type="radio" 
					id="level-{{$level->name}}" 
					value="{{$level->name}}"
					@old('level', "{$level->name}") checked @endold>
				<label class="mb-2 custom-control-label text-muted" for="level-{{$level->name}}">{{$level->name}}</label>
			</div>
			@endforeach
		</div>
	</div>
	<div class="col-lg-9 col-md-9 col-sm-12 col-12 px-2">
		<div class="form-group">
			<label class="d-block">I currently practice...</label>
			<div class="row mx-2">
				@foreach($activities as $activity)
				<div class="form-check custom-control custom-checkbox col-lg-3 col-md-4 col-sm-6 col-6">
					<input 
						class="custom-control-input" 
						required
						name="practice[]" 
						type="checkbox" 
						id="practice-{{$activity}}" 
						value="{{$activity}}"
						@oldArray('practice', "{$activity}") checked @endoldArray>
					<label class="mb-2 custom-control-label text-muted" for="practice-{{$activity}}">{{$activity}}</label>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>