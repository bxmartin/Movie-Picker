<div>

    @isset($tvshow)

        @if (isset($tvshow->image))
        <img src="{{ asset('images/tvshows/' . $tvshow->image) }}" alt="{{ $tvshow->name }}"
            class="w-1/2 mx-auto mb-3 outline outline-offset-4 outline-gray-500 outline-1 rounded-xl">
    @else
        <img src="{{ asset('images/no-photo-available.png') }}" alt="no image"
            class="w-1/2 mx-auto mb-3 outline outline-offset-4 outline-gray-500 outline-1 rounded-xl">
    @endif

    <h3 class="mb-2 text-2xl font-bold">
        <span class="inline-block">{{ $tvshow->name }}</span>
        @if ($tvshow->effort == 'Easy')
            <x-heroicon-o-face-smile class="inline-block w-auto h-8 text-green-500" />
        @elseif($tvshow->effort == 'Medium')
            <x-heroicon-o-face-smile class="inline-block w-auto h-8 text-orange-500" />
        @elseif($tvshow->effort == 'Hard')
            <x-heroicon-o-face-smile class="inline-block w-auto h-8 text-red-500" />
        @endif
    </h3>

    <x-buttons.primary wire:click="$refresh" class="mb-4 !from-purple-700 !to-purple-500 w-full">
        <x-heroicon-o-arrow-path-rounded-square class="inline-block h-8 mr-1" />
        {{ __('Pick another TV show') }}
    </x-buttons.primary>

    @endisset


</div>
