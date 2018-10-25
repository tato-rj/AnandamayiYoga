<div class="form-group type-container {{$display or 'd-flex'}}">

	@include('admin/components/multitype/remove')

	<textarea rows="{{$rows}}" disabled class="form-control" name="{{str_plural($type)}}[]">{{$value or null}}</textarea>

</div>