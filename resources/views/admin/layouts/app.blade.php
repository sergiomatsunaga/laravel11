<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title") - APP Laravel 11</title>
</head>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<body>
    <header>header default</header>
    
    @yield('content')

    <footer>footer default</footer>
</body>
</html>