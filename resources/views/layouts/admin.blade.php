<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Employee Management System</title>

    <!-- Styles -->
    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

</head>
<body class="sb-nav-fixed">

    @include('layouts.inc.admin-navbar')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('layouts.inc.admin-sidebar')
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container px-4">
                    @if(Session::has('flash_message'))
                        <div class="mt-3">
                            <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
                            </div>
                        </div>
                    @endif
                    <br>
                    @yield('content')
                </div>
            </main>
            @include('layouts.inc.admin-footer')
        </div>
    </div>

    <script src="{{ asset('frontend/js/bootstrap5.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/js/scripts.js"') }}"></script>


</body>
</html>
