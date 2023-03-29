<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('You have picked a movie!') }}
        </h2>
    </x-slot>

    <div class="flex flex-col items-center min-h-screen pt-1 sm:justify-center sm:pt-0 dark:bg-gray-900">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-lg dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-center text-gray-900 dark:text-gray-100">

                    <p class="text-2xl">Tonight you're watching: </p>

                    <img src="{{ $movie->image }}" class="w-1/2 mx-auto rounded-lg img-fluid">

                    <h3 class="text-4xl">{{ $movie->name }}</h3>

                    <hr  class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700" />

                    <p class="mb-2">Released: {{ $movie->releaseyear }}</p>

                    <p class="mb-2">Genre: {{ $movie->genre }}</p>

                    <p class="mb-2">{{ $movie->runtime }}min</p>

                    <p class="mb-2">Rating: {{ $movie->rating }}/10</p>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
