<div class="col-auto">
    <select class="form-control" name="duration" onchange="this.form.submit()">
        <option selected disabled>@lang('Any duration')</option>
        <option value="10" @filter('duration', '10') selected @endfilter>10 @lang('minutes')</option>
        <option value="15" @filter('duration', '15') selected @endfilter>15 @lang('minutes')</option>
        <option value="20" @filter('duration', '20') selected @endfilter>20 @lang('minutes')</option>
        <option value="30" @filter('duration', '30') selected @endfilter>30 @lang('minutes')</option>
        <option value="45" @filter('duration', '45') selected @endfilter>45 @lang('minutes')</option>
        <option value="60" @filter('duration', '60') selected @endfilter>60 @lang('minutes')</option>
    </select>
</div>   