<div class="col-auto">
	<select class="form-control" name="levels" onchange="this.form.submit()">
	    <option selected disabled>Any level</option>
	    <option value="beginner" @filter('levels', 'beginner') selected @endfilter>Beginner</option>
	    <option value="intermediate" @filter('levels', 'intermediate') selected @endfilter>Intermediate</option>
	    <option value="advanced" @filter('levels', 'advanced') selected @endfilter>Advanced</option>
	</select>
</div>