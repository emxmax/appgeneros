<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App Encuestas</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <main id="app">
        <test :genders="{{ $genders }}" :profile="{{ $profile }}"></test>
    </main>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
