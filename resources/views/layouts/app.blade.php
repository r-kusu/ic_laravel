<!doctype html>
<!-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> -->
<html lang="ja">

<head>
    @include("layouts.head")
    <title>@yield('title')</title>
</head>

<body>
    @yield('topbar')
    <main>
        @yield('content')
    </main>
</body>
</html>