<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Live Temperature</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>

        @vite('resources/js/app.js')
    </head>
    <body class="flex items-center justify-center h-screen bg-gradient-to-r from-cyan-500 to-pink-400 p-2">
        <livewire:temperature-status />
    </body>
</html>
