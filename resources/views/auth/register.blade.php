@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('components/sections/lead', ['image' => 'anandamayi'])

    @include('pages/register/content')
    
    @include('components/bars/gift')
    
    @include('components/bars/devices')
	
	@include('components/bars/benefits')
    
    @include('components/bars/testimonials')

</div>

@endsection

@section('scripts')

<script type="text/javascript">
$('input[name="categories"]').val($.session.get('categories'));
$('input[name="level_id"]').val($.session.get('level_id'));

$.session.remove('categories');
$.session.remove('level_id');
</script>

<script type="text/javascript">
var timezone_offset_minutes = new Date().getTimezoneOffset();
timezone_offset_minutes = timezone_offset_minutes == 0 ? 0 : -timezone_offset_minutes;

$('input[name="timezone"]').val(timezone_offset_minutes);
</script>
@endsection
