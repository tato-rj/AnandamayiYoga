<div class="bg-light rounded p-4 mb-2 quiz-questions {{! empty($hidden) ? 'original-type' : null }}" style="display: {{! empty($hidden) ? 'none' : null}}">

	<div class="form-group">
		<div class="input-group input-group-sm">
		  <div class="input-group-prepend">
		    <span class="input-group-text" id="inputGroup-sizing-sm">Question</span>
		  </div>
		  <input type="text" name="{{empty($hidden) ? 'content[0][question]' : null }}" value="" class="form-control">
		</div>
	</div>

	<ol class="mb-0">
		<li class="mb-2 pl-2">
			<div class="input-group input-group-sm">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="inputGroup-sizing-sm">Answer</span>
			  </div>
			  <input type="text" name="{{empty($hidden) ? 'content[0][answers][options][0]' : null }}" value="" class="form-control">
			  <div class="input-group-append">
			    <span class="input-group-text p-2">
			    	<input type="checkbox" title="Check if this answer is correct" name="{{empty($hidden) ? 'content[0][answers][correct][0]' : null }}">
			    </span>
			  </div>
			</div>
		</li>
		<li class="mb-2 pl-2">
			<div class="input-group input-group-sm">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="inputGroup-sizing-sm">Answer</span>
			  </div>
			  <input type="text" name="{{empty($hidden) ? 'content[0][answers][options][1]' : null }}" value="" class="form-control">
			  <div class="input-group-append">
			    <span class="input-group-text p-2">
			    	<input type="checkbox" title="Check if this answer is correct" name="{{empty($hidden) ? 'content[0][answers][correct][1]' : null }}">
			    </span>
			  </div>
			</div>
		</li>
		<li class="mb-2 pl-2">
			<div class="input-group input-group-sm">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="inputGroup-sizing-sm">Answer</span>
			  </div>
			  <input type="text" name="{{empty($hidden) ? 'content[0][answers][options][2]' : null }}" value="" class="form-control">
			  <div class="input-group-append">
			    <span class="input-group-text p-2">
			    	<input type="checkbox" title="Check if this answer is correct" name="{{empty($hidden) ? 'content[0][answers][correct][2]' : null }}">
			    </span>
			  </div>
			</div>
		</li>
		<li class="pl-2">
			<div class="input-group input-group-sm">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="inputGroup-sizing-sm">Answer</span>
			  </div>
			  <input type="text" name="{{empty($hidden) ? 'content[0][answers][options][3]' : null }}" value="" class="form-control">
			  <div class="input-group-append">
			    <span class="input-group-text p-2">
			    	<input type="checkbox" title="Check if this answer is correct" name="{{empty($hidden) ? 'content[0][answers][correct][3]' : null }}">
			    </span>
			  </div>
			</div>
		</li>
	</ol>


	<a class="remove-field text-danger text-right mt-2 mx-2 d-block"><small>Remove question</small></a>


</div>