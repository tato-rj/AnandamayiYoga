<div class="form-row jumbotron bg-light p-4">
	<div class="col-lg-6 col-md-6 col-sm-12 col-12 px-2">
		<div class="form-group">
			<label>I want the sessions to last...</label>
			<select required class="form-control" name="duration">
				<option selected disabled></option>
				<option 
					value="5 to 10 min"
					@old('duration', "5 to 10 min") selected @endold>up to 10 min</option>
				<option 
					value="10 to 30 min"
					@old('duration', "10 to 30 min") selected @endold>up to 30 min</option>
				<option 
					value="30 to 60 min"
					@old('duration', "30 to 60 min") selected @endold>up to 60 min </option>
				<option 
					value="60+ min"
					@old('duration', "60+ min") selected @endold>any duration</option>
			</select>
		</div>
		<div class="form-group">
			<label>My age group is...</label>
			<select required class="form-control" name="age">
				<option selected disabled></option>
				<option 
					value="18 to 29"
					@old('age', "18 to 29") selected @endold>18 to 29</option>
				<option 
					value="29 to 39"
					@old('age', "29 to 39") selected @endold>29 to 39</option>
				<option 
					value="39 to 49"
					@old('age', "39 to 49") selected @endold>39 to 49</option>
				<option 
					value="49 to 59"
					@old('age', "49 to 59") selected @endold>49 to 59</option>
				<option 
					value="59 to 69"
					@old('age', "59 to 69") selected @endold>59 to 69</option>
				<option 
					value="70 or more"
					@old('age', "70 or more") selected @endold>70 or more</option>
			</select>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-12 px-2">
		<div class="form-group">
			<label>My lifestyle is...</label>
			<select required class="form-control" name="lifestyle">
				<option selected disabled></option>
				<option 
					value="Sedentary. I rarely exercise."
					@old('lifestyle', "Sedentary. I rarely exercise.") selected @endold>Sedentary. I rarely exercise.</option>
				<option 
					value="Moderate. I exercise once or twice a week."
					@old('lifestyle', "Moderate. I exercise once or twice a week.") selected @endold>Moderate. I exercise once or twice a week.</option>
				<option 
					value="Active. I exercise three or more times per week."
					@old('lifestyle', "Active. I exercise three or more times per week.") selected @endold>Active. I exercise three or more times per week.</option>
				<option 
					value="Intense. I exercise every day."
					@old('lifestyle', "Intense. I exercise every day.") selected @endold>Intense. I exercise every day.</option>
			</select>
		</div>
		<div class="form-group">
			<label>In case you don't exercise, it's because...</label>
			<select class="form-control" name="reason">
				<option selected></option>
				<option 
					value="I don't have enough time."
					@old('reason', "I don't have enough time.") selected @endold>I don't have enough time</option>
				<option 
					value="I feel tired."
					@old('reason', "I feel tired.") selected @endold>I feel tired</option>
				<option 
					value="I have an injury."
					@old('reason', "I have an injury.") selected @endold>I have an injury</option>
				<option 
					value="I can't stay motivated."
					@old('reason', "I can't stay motivated.") selected @endold>I can't stay motivated</option>
				<option 
					value="I don't like exercising."
					@old('reason', "I don't like exercising.") selected @endold>I don't like exercising</option>
				<option 
					value="Other"
					@old('reason', "Other") selected @endold>Other</option>
			</select>
		</div>

	</div>
</div>
