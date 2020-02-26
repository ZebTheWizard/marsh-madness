<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Marsh Madness</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="main.css"> --}}
    {{-- <link rel="stylesheet" href="app.css"> --}}
    <script src="https://kit.fontawesome.com/a6c241853b.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="mb-12">
    <div id="app">
        <main class="mb-12">
            @yield('content')
        </main>
        <footer>
            <hr class="mx-auto border-black mt-8" style="max-width:768px;">
            <div class="mx-auto pt-4 text-center" >
                @if(Auth::check())
                    <p><a href="/home">Dashboard</a></p>
                @else
                    <p><a href="/login">Dashboard Login</a></p>
                @endif
                <p>MarshMadness.live is not affilated with the LHSAA</p>
                <p>Created by <a href="mailto:burroughszeb@me.com" class="underline">Zeb</a> &copy; {{ now()->year }}</p>
                
            </div>
            
        </footer>
    </div>
</body>
</html>
