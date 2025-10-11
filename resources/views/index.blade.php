<x-app-layout>

    <div class="justify-center my-1">
        <div class="">

            @if ($tvshows->count() or $movies->count())
                {{-- Shown only if atleast one movie or tv show exists --}}
                <div class="flex flex-col justify-center px-8 py-5 mb-4 text-center bg-slate-100">

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
                        <x-buttons.primary class="mb-2" id="movie-fire">
                        <img src="{{ asset('vendor/blade-heroicons/o-film.svg') }}" class="inline-block h-8 mr-3 svg-white" />
                            {{ __('Pick a Movie') }}
                        </x-buttons.primary>
                    @endif

                    @if ($tvshows->count())
                        <x-buttons.primary-alt class="mb-2" id="tvshow-fire">
                            <img src="{{ asset('vendor/blade-heroicons/o-play.svg') }}" class="inline-block h-8 mr-3 svg-white" />
                            {{ __('Pick a TV Show') }}
                        </x-buttons.primary-alt>
                    @endif

                </div>
            @endif

            <div class="flex flex-col px-2">

                <h4 class="text-xl font-bold text-center mb-3">View the full collection</h2>

                    <div class="flex flex-row gap-2">
                        <x-links.hero :href="route('movies')" class="mb-2 basis-1/2">
                            <img src="{{ asset('vendor/blade-heroicons/o-film.svg') }}" class="inline-block h-8 mr-3 svg-white" />
                            {{ __('Movies') }}
                        </x-links.hero>
                        <x-links.hero-alt :href="route('tvshows')" class="mb-2 basis-1/2">
                            <img src="{{ asset('vendor/blade-heroicons/o-play.svg') }}" class="inline-block h-8 mr-3 svg-white" />
                            {{ __('TV Shows') }}
                        </x-links.hero-alt>
                    </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('/scripts/home-picks.js') }}"></script>

</x-app-layout>
