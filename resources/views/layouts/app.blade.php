<<<<<<< HEAD
<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
</head>
<body>
    @yield('topbar')
    @yield('content')

</body>
=======
<!doctype html>
<!-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> -->
<html lang="ja">

<head>
    @yield('head')
</head>

<body>
    @yield('topbar')
    @yield('content')
</body>

>>>>>>> 45ee520abaad69596e6ccce127fea4d0ec049158
</html>