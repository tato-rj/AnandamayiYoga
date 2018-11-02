<div class="form-group type-container {{$display ?? 'd-flex'}}">

	@include('admin/components/multitype/remove')

	<textarea rows="{{$rows}}" disabled class="form-control" name="{{str_plural($type)}}[]">{{$value ?? null}}</textarea>

</div>