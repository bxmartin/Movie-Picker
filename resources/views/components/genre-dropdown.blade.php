<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{ isset($currentGenre) ? ucwords($currentGenre->name) : 'Genres' }}

        </button>
    </x-slot>

    <x-dropdown-link href="/" :active="request()->routeIs('home')">All</x-dropdown-link>

    @foreach ($genres as $genre)
        <x-dropdown-link
            href="/?genre={{ $genre->slug }}"
            :active='request()->is("genres/{$genre->slug}")'
        >{{ ucwords($genre->name) }}</x-dropdown-link>
    @endforeach
</x-dropdown>
