<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts/favicon')
    
    <title>
    @auth
        @if(count(auth()->user()->unreadNotifications) > 0)
        ({{count(auth()->user()->unreadNotifications)}})
        @endif
    @endauth
    {{config('app.name')}}
    </title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}?version=52" rel="stylesheet">
</head>
<body>
	@yield('content')
	<script src="{{ asset('js/app.js') }}"></script>
	@yield('scripts')
</body>
</html>