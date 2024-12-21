<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Movie Picker') }}
        </h2>
    </x-slot> --}}

    <div class="justify-center my-1">
        <div class="">

            @if ($movies->count())
                {{-- Shown only if atleast one movie exists --}}
                <div class="flex flex-col justify-center px-8 py-5 mb-2 text-center bg-gray-100">

                    <div id="movie-result" class="">
                        <livewire:pick-movie />
                    </div>

                    <x-links.hero href="{{ route('addmovie') }}" class="">
                        <img src="{{ asset('vendor/blade-heroicons/o-plus.svg') }}" class="inline-block h-8 mr-3 svg-white" />
                        {{ __('Add a Movie') }}
                    </x-links.hero>

                </div>
            @endif

        </div>
    </div>

    <div class="w-full mx-auto py-4 px-2">

        <x-inputs.movies-searchbox />

        <x-movies-list />

    </div>

    <x-scroll-to-top />

</x-app-layout>


<script src="/scripts/scroll-to-top.js"></script>
<script src="{{ asset('/scripts/home-picks.js') }}"></script>
