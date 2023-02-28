<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Movie Picker</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <script src="//unpkg.com/alpinejs" defer></script>

</head>

<body class="h-full">
    <div class="min-h-full">
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                <img class="h-10 w-10 float-left mr-4" src="/image/popcorn.png" alt="Movie picker">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Movie Picker</h1>
            </div>
        </header>
        <x-layout.nav />
