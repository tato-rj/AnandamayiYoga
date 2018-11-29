@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('components/sections/lead', ['image' => 'library'])

    @include('pages/reads/books/content')
	
	@include('components/bars/devices')

	@include('components/bars/testimonials')

</div>

@endsection

@section('scripts')
<script type="text/javascript">
$('.thumbnail').on('click', function() {
	$('#book-preview').attr('src', $(this).attr('src'));
});
</script>
@endsection