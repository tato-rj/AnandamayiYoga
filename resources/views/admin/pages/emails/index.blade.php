@extends('admin/layouts/app')

@section('content')

@include('admin/components/page-title', [
  'title' => 'Email',
  'subtitle' => "Use this page to send out custom emails"
])
<div class="row">
	<div class="col-12">

		@include('admin/pages/emails/form')
	
	</div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#attachment-info').text(input.files[0].name);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$('#attachment-icon').on('click', function() {
  $('input[name="attachment"]').click();
});

$('input[name="attachment"]').change(function() {
 	readURL(this);
});
</script>
@endsection