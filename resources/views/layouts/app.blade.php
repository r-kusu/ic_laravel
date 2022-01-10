<!doctype html>
<!-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> -->
<html lang="ja">

<head>
    @yield('head')
</head>

<body>
    @yield('topbar')
    <main>
        @yield('content')
    </main>
</body>
</html>