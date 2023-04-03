<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Movie Picker') }}
        </h2>
    </x-slot>

    <div class="flex justify-center sm:my-8">
        <div class="sm:flex sm:basis-full lg:basis-3/4 xl:basis-1/2">
            <div
                class="flex flex-col justify-center px-8 py-5 text-center bg-gray-100 sm:basis-2/5 rounded-b-3xl sm:rounded-3xl">
                {{-- <img class="mx-auto max-w-1/2 sm:max-w-full"
                    src="https://m.media-amazon.com/images/M/MV5BOTA5NjhiOTAtZWM0ZC00MWNhLThiMzEtZDFkOTk2OTU1ZDJkXkEyXkFqcGdeQXVyMTA4NDI1NTQx._V1_FMjpg_UX1000_.jpg">
                <h1 class="my-2 text-4xl font-semibold sm:text-2xl">Star Wars</h1>

                <p class="text-sm tracking-wider uppercase">121 min - 1977 - Sci-fi</p> --}}
                <p class="text-2xl">Tonight you're watching: </p>
                <x-pick-movie />

                <hr class="h-px my-5 bg-gray-200 border-0 dark:bg-gray-700" />

                <x-pick-tvshow />

            </div>
            <div class="flex flex-col px-8 sm:basis-3/5">
                <x-hero-button href="{{ route('randommovie') }}" class="mb-4">
                    <x-heroicon-o-film class="inline-block h-12 mr-3" />
                    {{ __('Pick a Movie') }}
                </x-hero-button>

                <x-hero-button href="{{ route('randomtvshow') }}" class="mb-4 bg-purple-800 hover:bg-purple-700">
                    <x-heroicon-o-tv class="inline-block h-12 mr-3" />
                    {{ __('Pick a TV Show') }}
                </x-hero-button>

                <x-hero-button href="{{ route('addmovie') }}" class="mb-4">
                    <x-heroicon-o-film class="inline-block h-10" />
                    <x-heroicon-o-plus class="inline-block h-8 mr-2" />
                    {{ __('Add a Movie') }}
                </x-hero-button>

                <x-hero-button href="{{ route('addtvshow') }}" class="mb-4 bg-purple-800 hover:bg-purple-700">
                    <x-heroicon-o-tv class="inline-block h-10" />
                    <x-heroicon-o-plus class="inline-block h-8 mr-2" />
                    {{ __('Add a TV Show') }}
                </x-hero-button>

                <button
                    class="h-1/5 text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl py-2.5 text-center mt-4 mb-8 text-2xl drop-shadow-md"
                    id="open-btn">
                    Add Something
                </button>

            </div>
        </div>
    </div>

    <div class="w-full mx-auto mt-4">
        <!-- Tabs -->
        <ul id="tabs" class="inline-flex w-full border-b">
            <li class="px-4 py-2 -mb-px text-2xl font-bold text-gray-800 bg-white border-t border-l border-r rounded-t-xl">
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

<x-add-something></x-add-something>

<script src="{{ asset('/scripts/home-tabs.js') }}"></script>
