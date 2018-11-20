<div class="col-auto">
    <select class="form-control" name="category" onchange="this.form.submit()">
        <option selected disabled>@lang('Any style')</option>
        @foreach($wallpaperCategories as $wpCategory)
        <option value="{{$wpCategory->id}}">{{$wpCategory->name}}</option>
        @endforeach
    </select>
</div>