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
    <body class="container">
        <div style="padding-top:30vh;">
            <div class="row justify-content-center">
                <label for="terminos" style="width: 250px;line-height:18px;margin-bottom:20px;text-align:center;"><input id="terminos" type="checkbox"> Permite usted que la aplicación pueda acceder a su lista de géneros musicales de Spotify.</label>
            </div>
            <div class="row d-flex justify-content-center align-items-center">
                <a id="btnlogin" class="btn btn-success disabled" style="font-size: 2rem"
                href="{{route('login')}}" role="button" aria-disabled="true">Log in with Spotify
                </a>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
         $(document).ready(function(){
            $('#terminos').change(function(){
                var active = "";
                if ($(this).is(":checked")){
                    $('#btnlogin').removeClass('disabled')
                }else{
                    $('#btnlogin').addClass('disabled')
                }
            });
         });
    </script>
</html>
