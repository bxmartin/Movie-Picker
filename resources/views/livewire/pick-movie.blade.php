<div>

    @isset($movie)

        @if (isset($movie->image))
            <img src="{{ asset('images/movies/' . $movie->image) }}" alt=""
                class="w-1/2 mx-auto mb-3 outline outline-offset-4 outline-gray-500 outline-1 rounded-xl">
        @else
            <img src="{{ asset('images/movie-no-photo-available.png') }}" alt="no image"
                class="w-1/2 mx-auto mb-3 outline outline-offset-4 outline-gray-500 outline-1 rounded-xl">
        @endif

        <h3 class="text-2xl font-bold">
            <span class="inline-block">{{ $movie->name }}</span>
            @if ($movie->effort == 'Easy')
                <x-heroicon-o-face-smile class="inline-block w-auto h-8 text-green-500" />
            @elseif($movie->effort == 'Medium')
                <x-heroicon-o-face-smile class="inline-block w-auto h-8 text-orange-500" />
            @elseif($movie->effort == 'Hard')
                <x-heroicon-o-face-smile class="inline-block w-auto h-8 text-red-500" />
            @endif
        </h3>

        {{-- <p class="mb-2">Released: {{ $movie->releaseyear }}</p>

    <p class="mb-2">Genre: {{ $movie->genre->name }}</p> --}}

        <p class="mb-2">{{ $movie->runtime }}min</p>


        <x-buttons.primary wire:click="$refresh" class="mb-4 w-full">
            <img src="{{ asset('vendor/blade-heroicons/o-arrow-path-rounded-square.svg') }}" class="svg-white inline-block h-8 mr-3" />
            {{ __('Pick another Movie') }}
        </x-buttons.primary>

    @endisset

</div>
