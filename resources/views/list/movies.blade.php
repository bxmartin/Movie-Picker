<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Movie Picker') }}
        </h2>
    </x-slot> --}}

    <div class="justify-center my-1">
        <div class="">

            @if ($movies->count())
                {{-- Shown only if atleast one movie or tv show exists --}}
                <div class="flex flex-col justify-center px-8 py-5 mb-4 text-center bg-slate-100">

                    @if ($movies->count())
                        <div id="movie-result" class="">
                            <livewire:pick-movie />
                        </div>
                    @endif
                </div>
            @endif

            <div class="flex flex-col px-2">
                @if ($movies->count())
                    <x-buttons.primary class="mb-4 !text-left" id="movie-fire">
                        <x-heroicon-o-film class="inline-block h-12 mr-3" />
                        {{ __('Pick a Movie') }}
                    </x-buttons.primary>
                @endif

                <x-links.hero href="{{ route('addmovie') }}" class="mb-4 !text-left">
                    <x-heroicon-o-film class="inline-block h-10" />
                    <x-heroicon-o-plus class="inline-block h-8 mr-2" />
                    {{ __('Add a Movie') }}
                </x-links.hero>

                <x-links.hero-alt href="{{ route('addtvshow') }}" class="mb-4 !text-left">
                    <x-heroicon-o-play class="inline-block h-10" />
                    <x-heroicon-o-plus class="inline-block h-8 mr-2" />
                    {{ __('Add a TV Show') }}
                </x-links.hero-alt>

            </div>
        </div>
    </div>

    <div class="w-full mx-auto mt-4">

        <x-movies-list />
    </div>

    <x-scroll-to-top />

</x-app-layout>


<script src="/scripts/scroll-to-top.js"></script>
<script src="{{ asset('/scripts/home-tabs.js') }}"></script>
<script src="{{ asset('/scripts/home-picks.js') }}"></script>
