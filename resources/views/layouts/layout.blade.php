<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('components.head')
    <title>@yield('title')</title>
</head>
<body>
<div class="d-flex align-items-center justify-content-between admin-header pt-2 pb-2">
    @include('components.header')
</div>
<div class="d-flex align-items-center justify-content-center admin-content" id="wrapper">
    <div class="col-3 admin-sidebar">
        @include('components.sidebar', [
            'user' => \Illuminate\Support\Facades\Auth::user(),
            'menu' => include(config_path('menu.php'))
        ])
    </div>
    <div class="col-9 admin-content p-4">
        @yield('content')
    </div>
</div>
<div class="d-flex align-items-center justify-content-center admin-footer">
    @include('components.footer')
</div>
@include('components.footer-script')

</body>
</html>
