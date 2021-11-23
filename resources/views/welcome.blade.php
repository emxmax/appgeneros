<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="container" style="min-height: 100vh">
        <div class="row d-flex justify-content-center align-items-center"  style="min-height: 100vh">
            <a class="btn btn-success" style="font-size: 2rem"
               href="{{route('login')}}">Log in with Spotify
            </a>
        </div>
    </body>
</html>
