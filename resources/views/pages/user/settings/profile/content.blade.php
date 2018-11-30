@component('pages/user/settings/show', ['title' => __('My Profile')])

<div class="row">
	<div class="col-lg-4">
          <div id="upload-box" class="card border-0 rounded-0">
            <input type="file" id="avatar" name="image" style="display:none;" />
            <img class="w-100" id="avatar-final" src="{{auth()->user()->avatar()}}" alt="Not an image">
            <div class="card-body text-center p-2 d-flex align-items-center justify-content-center">
            	<button type="button" id="select-button" class="btn-link text-blue cursor-pointer border-0 px-4">
            		<i class="fas fa-folder-open"></i>
            		<div class="text-muted"><small>@lang('Select')</small></div>
            	</button>
            	<button type="button" id="upload-button" disabled class="btn-link text-blue cursor-pointer border-0 px-4">
            		<i class="fas fa-cloud-upload-alt"></i>
            		<div class="text-muted"><small>@lang('Upload')</small></div>
            	</button>
            	<div style="display: none;">
            		<p class="text-success mb-0"><i class="fas fa-check-circle mr-2"></i><strong>@lang('All set!')</strong></p>
            	</div>
            </div>
          </div>	
          <div class="progress mt-4" style="display: none;">
          	<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
          </div>
	</div>
	<div class="col-lg-8">
	    <div class="form-group">
	    	<label class="text-muted"><small>@lang('First name')</small></label>
	    	<div class="d-flex align-items-center">
		        <input id="first_name" type="text" class="form-control bg-light border-0 mr-2" name="first_name" placeholder="@lang('First name')" value="{{ auth()->user()->first_name }}"  disabled>
		        @include('pages/user/settings/controls')	    		
	    	</div>
	    </div>

	    <div class="form-group">
	    	<label class="text-muted"><small>@lang('Last name')</small></label>
	    	<div class="d-flex align-items-center">
		        <input id="last_name" type="text" class="form-control bg-light border-0 mr-2" name="last_name" placeholder="@lang('Last name')" value="{{ auth()->user()->last_name }}"  disabled>
		    	@include('pages/user/settings/controls')
		    </div>
	    </div>

	    <div class="form-group">
	    	<label class="text-muted"><small>Email</small></label>
	    	<div class="d-flex align-items-center">
		        <input id="email" type="email" class="form-control bg-light border-0 mr-2" name="email" placeholder="E-mail" value="{{ auth()->user()->email }}" disabled>
		    	@include('pages/user/settings/controls')
		    </div>
	    </div>
	    <hr class="mt-4 mb-3">
	    <div class="form-group">
	    	<label class="text-muted"><small>@lang('Gender')</small></label>
	    	<div class="d-flex align-items-center">
		    	<select class="form-control mr-2" name="gender" disabled>
		    		<option value="female" {{(auth()->user()->gender == 'female') ? 'selected' : null}}>@lang('Female')</option>
		    		<option value="male" {{(auth()->user()->gender == 'male') ? 'selected' : null}}>@lang('Male')</option>
		    	</select>	    	
		    	@include('pages/user/settings/controls')	
	    	</div>
	    </div>
	    <div class="form-group">
	    	<label class="text-muted"><small>@lang('Language')</small></label>
	    	<div class="d-flex align-items-center">
		    	<select class="form-control mr-2" name="lang" disabled>
		    		<option value="en" {{(auth()->user()->lang == 'en') ? 'selected' : null}}>@lang('English')</option>
		    		<option value="pt" {{(auth()->user()->lang == 'pt') ? 'selected' : null}}>@lang('Portuguese')</option>
		    	</select>	    	
		    	@include('pages/user/settings/controls')	
	    	</div>
	    </div>
	    <div class="form-group">
	    	<label class="text-muted"><small>@lang('Timezone')</small></label>
	    	<div class="d-flex align-items-center">
		    	<select class="form-control mr-2" disabled name="timezone">
		    		@foreach($timezones as $timezone)
		    		<option value="{{$timezone}}" {{($timezone == auth()->user()->timezone) ? 'selected' : null}}>{{str_replace('_', ' ', $timezone)}}</option>
		    		@endforeach
		    	</select>
		    	@include('pages/user/settings/controls')		
	    	</div>
	    </div>
	    <div class="form-group">
	    	<label class="text-muted"><small>@lang('Currency')</small></label>
	    	<div class="d-flex align-items-center">
		    	<select class="form-control mr-2" disabled name="currency">
		    		@foreach($currencies as $code => $name)
		    		<option value="{{$code}}" {{($code == auth()->user()->currency) ? 'selected' : null}}>{{$name}}</option>
		    		@endforeach
		    	</select>
		    	@include('pages/user/settings/controls')		
	    	</div>
	    </div>
	    <hr class="mt-4 mb-3">
	    <div class="form-group">
	    	<label class="text-muted"><small>@lang('Password')</small></label>
	    	<div class="d-flex align-items-center">
		        <input id="password" type="password" class="form-control bg-light border-0 mr-2" placeholder="&bullet;&bullet;&bullet;&bullet;&bullet;&bullet;" name="password" disabled>
		    	@include('pages/user/settings/controls')
		    </div>
	    </div>
	</div>
</div>




<!-- Modal -->
<div class="modal fade" id="crop-container" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">

      	<div>
        <img id="avatar-to-crop" src="" style="max-width: 100%; width: 100%;">
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="crop" class="btn-bold btn-red mx-auto"><i class="fas fa-check-circle mr-2"></i>@lang('Ready to upload my new picture')</button>
      </div>
    </div>
  </div>
</div>
@endcomponent