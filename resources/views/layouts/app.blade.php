<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <title>Circle</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="https://bootswatch.com/4/materia/bootstrap.css">
    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <style>
        body {
            font-family: montserrat;
        }
    </style>
</head>
<body>
    <div id="app">

        @include('partials.nav')
        @include('partials.alerts')

        @if ( request()->path() == 'login' || request()->path() == 'register')
            <main class="py-4">            
        @else
            <main class="col-md-6 offset-md-3 py-4">    
        @endif        
            @yield('content')
        </main>
    </div>
</body>
</html>
