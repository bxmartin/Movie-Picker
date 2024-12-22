<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('You have picked a movie!') }}
        </h2>
    </x-slot> --}}

    <section>
        <div class="grid col-span-12 gap-4 px-10 pt-6 my-8 text-center md:col-span-6 lg:col-span-4 md:order-1 xl:gap-6">

            <p class="text-2xl">Tonight you're watching: </p>

            <h3 class="text-4xl font-bold">{{ $movie->name }}</h3>

            @if (isset($movie->image))
                <img src="{{ asset('images/movies/' . $movie->image) }}" alt="{{ $movie->name }}"
                    class="w-full rounded-xl md:w-60 m-auto">
            @else
                <img src="{{ asset('images/movie-no-photo-available.png') }}" alt="no image"
                    class="w-full rounded-xl md:w-60 m-auto">
            @endif

            @if (isset($movie->releaseyear))
                <p class="mb-2">Released: {{ $movie->releaseyear }}</p>
            @endif

            <p class="mb-2">Genre: {{ $movie->genre->name }}</p>

            @if (isset($movie->runtime))
                <p class="mb-2">{{ $movie->runtime }}min</p>
            @endif

            <p class="mb-2">Effort:
                @if ($movie->effort == 'Easy')
                    <img src="{{ asset('vendor/blade-heroicons/o-face-smile.svg') }}"
                        class="inline-block w-auto h-8 svg-green" />
                @elseif($movie->effort == 'Medium')
                    <img src="{{ asset('vendor/blade-heroicons/o-face-smile.svg') }}"
                        class="inline-block w-auto h-8 svg-orange" />
                @elseif($movie->effort == 'Hard')
                    <img src="{{ asset('vendor/blade-heroicons/o-face-smile.svg') }}"
                        class="inline-block w-auto h-8 svg-red" />
                @endif
            </p>

            <p>
                <x-links.secondary class="mt-10" :href="route('movies')">
                    {{ __('Go back to movie list') }}
                </x-links.secondary>
            </p>

        </div>
    </section>

</x-app-layout>
