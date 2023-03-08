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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Favicons -->
        <link rel="apple-touch-icon" sizes="180x180" href="/image/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/image/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/image/favicon/favicon-16x16.png">
        <link rel="manifest" href="/image/favicon/site.webmanifest">
        <link rel="mask-icon" href="/image/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="shadow bg-gradient-to-r from-cyan-200 to-blue-300 dark:bg-gray-800">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="container w-full mx-auto mb-32 overflow-hidden sm:px-16">
                {{ $slot }}
            </main>

            @include('layouts.foot')
        </div>

    </body>
</html>
