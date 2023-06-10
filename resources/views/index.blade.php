<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Movie Picker') }}
        </h2>
    </x-slot> --}}

    <div class="flex justify-center sm:my-8 my-4">
        <div class="sm:flex sm:basis-full lg:basis-3/4 xl:basis-2/3">

            @if (($tvshows->count()) or ($movies->count()))
            {{-- Shown only if atleast one movie or tv show exists --}}
            <div
                class="flex flex-col justify-center px-8 py-5 mb-4 text-center bg-gray-100 sm:basis-2/5 md:rounded-b-3xl sm:rounded-3xl">

                @if ($movies->count())
                    <div id="movie-result" class="">
                        <livewire:pick-movie />
                    </div>
                @endif

                @if ($tvshows->count())
                <div id="tv-result" class="hidden">
                    <livewire:pick-tv-show />
                </div>
                @endif
            </div>
            @endif

            <div class="flex flex-col px-8 sm:basis-3/5">
                @if ($movies->count())
                <x-primary-button class="my-4 !text-left" id="movie-fire">
                    <x-heroicon-o-film class="inline-block h-12 mr-3" />
                    {{ __('Pick a Movie') }}
                </x-primary-button>
                @endif

                @if ($tvshows->count())
                <x-primary-button class="mb-4 !text-left from-purple-700 to-purple-500" id="tvshow-fire">
                    <x-heroicon-o-play class="inline-block h-12 mr-3" />
                    {{ __('Pick a TV Show') }}
                </x-primary-button>
                @endif

                <x-hero-link href="{{ route('addmovie') }}" class="mb-4 !text-left">
                    <x-heroicon-o-film class="inline-block h-10" />
                    <x-heroicon-o-plus class="inline-block h-8 mr-2" />
                    {{ __('Add a Movie') }}
                </x-hero-link>

                <x-hero-link href="{{ route('addtvshow') }}" class="mb-4 !text-left !from-purple-700 !to-purple-500">
                    <x-heroicon-o-play class="inline-block h-10" />
                    <x-heroicon-o-plus class="inline-block h-8 mr-2" />
                    {{ __('Add a TV Show') }}
                </x-hero-link>

                {{-- <button
                    class="h-1/5 text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl py-2.5 text-center mt-4 mb-8 text-2xl drop-shadow-md"
                    id="open-btn">
                    Add Something
                </button> --}}

            </div>
        </div>
    </div>

    <div class="w-full mx-auto mt-4">
        <!-- Tabs -->
        <ul id="tabs" class="inline-flex w-full border-b">
            <li
                class="px-4 py-2 -mb-px text-2xl font-bold text-gray-800 bg-white border-t border-l border-r rounded-t-xl">
                <a id="default-tab" href="#movies">Movies</a>
            </li>
            <li class="px-4 py-2 text-2xl font-bold text-gray-800 rounded-t-xl">
                <a href="#tvshows">TV Shows</a>
            </li>
        </ul>

        <!-- Tab Contents -->
        <div id="tab-contents" class="border border-t-0">
            <div id="movies" class="p-4">
                <x-movies-list />
            </div>
            <div id="tvshows" class="hidden p-4">
                <x-tvshows-list />
            </div>
        </div>
    </div>

</x-app-layout>

{{-- <x-add-something></x-add-something> --}}

<script src="{{ asset('/scripts/home-tabs.js') }}"></script>
<script src="{{ asset('/scripts/home-picks.js') }}"></script>
