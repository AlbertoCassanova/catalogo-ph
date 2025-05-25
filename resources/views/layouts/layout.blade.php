<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Placer Hispano - {{ $pageTitle }}</title>
</head>
<body>
    @if ( !Route::is('admin.login'))
        @include('layouts.navbar')
    @endif
    @yield("content")
    @if ( !Route::is('admin.login'))
        @include('layouts.footer')
    @endif
</body>
<script src="https://cdn.tailwindcss.com"></script>
</html>
