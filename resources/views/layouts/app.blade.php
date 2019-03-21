<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body{
            margin: 0;
            padding: 0;
        }

        .wrapper{
            padding: 0;
            margin: 0;
            width: 100vw;
            height: 100vh;
            border:1px solid black;

            display: flex;


        }


        .container{
            text-align: center;
            margin: auto;
        }

        .content{
            padding: 0 2rem;
            text-align: center;
            margin: auto;
        }
    </style>
</head>
<body>

    @yield('content')

</body>
</html>
