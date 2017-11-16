<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{ asset('/favicon.ico') }} ">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

<!-- Begin page content -->
{{--<div class="container">--}}
    @yield('content')
{{--</div>--}}

</body>
</html>
<?php return;?>
