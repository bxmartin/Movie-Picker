<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Movie Picker') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-900">

    <div
        class="flex flex-col items-center min-h-screen pt-6 bg-gradient-to-r from-cyan-200 to-blue-300 justify-center px-6 dark:bg-gray-900">
        <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md max-w-md dark:bg-gray-800 rounded-lg">
            <a href="/">
                <x-application-logo class="w-20 h-20 mx-auto text-gray-500 fill-current" /><br>
                <h1 class="text-4xl text-center font-semibold mb-4">{{ config('app.name', 'Movie Picker') }}</h1>
            </a>
            {{ $slot }}
        </div>

        @stack('scripts')
</body>

</html>
