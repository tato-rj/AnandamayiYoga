@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('components/sections/lead', ['image' => 'contact'])
    @include('pages/user/routine/instructions/content')

</div>
@endsection

@section('scripts')
<script type="text/javascript">

</script>
@endsection