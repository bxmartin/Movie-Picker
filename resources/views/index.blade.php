<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Movie Picker') }}
        </h2>
    </x-slot> --}}

    <div class="justify-center my-1">
        <div class="">

            @if ($tvshows->count() or $movies->count())
                {{-- Shown only if atleast one movie or tv show exists --}}
                <div class="flex flex-col justify-center px-8 py-5 mb-4 text-center bg-gray-100">

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

                    <hr />

                    @if ($movies->count())
                        <x-primary-button class="mb-2 !text-left" id="movie-fire">
                        <img src="{{ asset('vendor/blade-heroicons/o-film.svg') }}" class="inline-block h-8 mr-3 svg-white" />
                            {{ __('Pick a Movie') }}
                        </x-primary-button>
                    @endif

                    @if ($tvshows->count())
                        <x-primary-button class="mb-2 !text-left from-purple-700 to-purple-500" id="tvshow-fire">
                            <img src="{{ asset('vendor/blade-heroicons/o-play.svg') }}" class="inline-block h-8 mr-3 svg-white" />
                            {{ __('Pick a TV Show') }}
                        </x-primary-button>
                    @endif

                </div>
            @endif

            <div class="flex flex-col px-2">

                <h4 class="text-xl font-bold text-center mb-3">View the full collection</h2>

                    <div class="flex flex-row gap-2">
                        <x-hero-link :href="route('movies')" class="mb-2 !text-left basis-1/2">
                            <img src="{{ asset('vendor/blade-heroicons/o-film.svg') }}" class="inline-block h-8 mr-3 svg-white" />
                            {{ __('Movies') }}
                        </x-hero-link>
                        <x-hero-link :href="route('tvshows')" class="mb-2 !text-left basis-1/2">
                            <img src="{{ asset('vendor/blade-heroicons/o-play.svg') }}" class="inline-block h-8 mr-3 svg-white" />
                            {{ __('TV Shows') }}
                        </x-hero-link>
                    </div>

            </div>
        </div>
    </div>



</x-app-layout>

<script src="{{ asset('/scripts/home-picks.js') }}"></script>
