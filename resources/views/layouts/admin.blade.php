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
<div class="container">
    @include('layouts.parts.admin.navbar')
    <div class="row">
        <div class="col-md-4">

            <div class="card" style="width: 20rem;">
                <ul class="list-group list-group-flush sidemenu">
                    @if ($sidemenus)
                        @foreach($sidemenus as $menu)
                            @foreach ($menu->getItems() as $item)
                                <li class="list-group-item">
                                    <a
                                            @if ($item->isActive()) class="active" @endif
                                    href="{{ $item->getUrl() }}"
                                            title="{{ $item->getTitle() }}"
                                    >{{ $item->getTitle() }}</a></li>
                            @endforeach
                        @endforeach
                    @endif
                </ul>
            </div>

        </div>

        <div class="col-md-8">
            @yield('breadcrumbs')
            @include('layouts.parts.admin.notifications')



            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
<?php return;?>
