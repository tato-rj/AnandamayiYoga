<div class="col-auto">
    <select class="form-control" name="categories" onchange="this.form.submit()">
        <option selected disabled>Any style</option>
        @foreach($categories as $category)
        <option value="{{$category->slug}}" @filter('categories', $category->slug) selected @endfilter>{{$category->name}}</option>
        @endforeach
    </select>
</div>