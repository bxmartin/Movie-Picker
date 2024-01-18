<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Movie Picker') }}
        </h2>
    </x-slot> --}}

    <div class="justify-center my-1">
        <div class="">

            <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">

                <div class="relative lg:inline-flex">
                    <form method="GET" action="{{ route('index') }}">
                        @if (request('genre'))
                            <input type="hidden" name="genre" value="{{ request('genre') }}">
                        @endif
                        <x-text-input
                            class="mt-1 w-full bg-gray-100 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                            type="text" name="search" placeholder="Find something"
                            value="{{ request('search') }}" />
                    </form>
                </div>
                <div class="relative lg:inline-flex">
                    <x-genre-dropdown />
                </div>
                <div class="relative lg:inline-flex">
                    <x-primary-button class="!text-left">
                        {{ __('Search') }}
                    </x-primary-button>
                </div>

            </div>


            @forelse($movies as $movie)
                <li class="list-group-item">{{ $movie->name }}</li>
            @empty
                <x-no-results />
            @endforelse

        </div>
        <x-scroll-to-top />

</x-app-layout>

<script src="/scripts/scroll-to-top.js"></script>
