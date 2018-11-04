<div class="form-group type-container {{$display ?? 'd-flex'}}">

	@include('admin/components/multitype/remove')

	@include('components/form/edit/input-group', ['type' => str_plural($type), 'value' => $value ?? null, 'disabled' => true])

</div>