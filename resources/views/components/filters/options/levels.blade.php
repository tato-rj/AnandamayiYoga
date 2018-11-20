<div class="col-auto">
	<select class="form-control" name="levels" onchange="this.form.submit()">
	    <option selected disabled>@lang('Any level')</option>
	    @foreach($levels as $level)
	    <option value="{{$level->slug}}" @filter('levels', $level->slug) selected @endfilter>{{$level->name}}</option>
	    @endforeach
	</select>
</div>