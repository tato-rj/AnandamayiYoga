<div class="col-auto">
    <select class="form-control" name="chapter" onchange="this.form.submit()">
        <option selected disabled>All discussions</option>
        @foreach($course->chapters as $chapter)
        <option value="{{$chapter->id}}" @filter('chapter', $chapter->id) selected @endfilter>{{$chapter->name}}</option>
        @endforeach
    </select>
</div>