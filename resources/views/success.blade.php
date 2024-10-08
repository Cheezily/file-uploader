<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Success!</title>

    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <h1 style="color: green; text-align: center; margin-top: 50px;">{{ $message }}</h1>
    </body>
</html>
