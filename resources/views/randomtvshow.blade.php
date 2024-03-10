<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('You have picked a tv show!') }}
        </h2>
    </x-slot>

    <section>
        <div class="grid col-span-12 gap-4 px-10 pt-6 my-8 text-center md:col-span-6 lg:col-span-4 md:order-1 xl:gap-6">

            <p class="text-2xl">Tonight you're watching: </p>

            @if (isset($tvshow->image))
                <img src="{{ asset('images/tvshows/' . $tvshow->image) }}" alt="{{ $tvshow->name }}" class="w-1/2 mx-auto rounded-lg">
            @else
                <img src="{{ asset('images/movie-no-photo-available.png') }}" alt="no image"
                    class="w-full rounded-xl md:w-60 m-auto">
            @endif

            <h3 class="text-4xl font-bold">{{ $tvshow->name }}</h3>

            <p class="mb-2">Released: {{ $tvshow->releaseyear }}</p>

            <p class="mb-2">Genre: {{ $tvshow->genre->name }}</p>

            <p class="mb-2">Effort:
                @if ($tvshow->effort == 'Easy')
                    <img src="{{ asset('vendor/blade-heroicons/o-face-smile.svg') }}"
                        class="inline-block w-auto h-8 svg-green" />
                @elseif($tvshow->effort == 'Medium')
                    <img src="{{ asset('vendor/blade-heroicons/o-face-smile.svg') }}"
                        class="inline-block w-auto h-8 svg-orange" />
                @elseif($tvshow->effort == 'Hard')
                    <img src="{{ asset('vendor/blade-heroicons/o-face-smile.svg') }}"
                        class="inline-block w-auto h-8 svg-red" />
                @endif
            </p>

        </div>
    </section>

</x-app-layout>
