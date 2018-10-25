<div class="col-auto">
    <select class="form-control" name="category" onchange="this.form.submit()">
        <option selected disabled>Any category</option>
        @foreach($wallpaperCategories as $wpCategory)
        <option value="{{$wpCategory->id}}">{{$wpCategory->name}}</option>
        @endforeach
    </select>
</div>