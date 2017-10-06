<html>
<head>
    <title>RaceAlert - @yield('title')</title>
</head>
<body>
    <ul class="nav navbar-nav">
        @yield('menu')
    </ul>

    @if ($message = session('status'))
        <div class="status">
            {{ $message }}
        </div>
    @endif

    <div class="container">
        @yield('content')
    </div>
</body>
</html>