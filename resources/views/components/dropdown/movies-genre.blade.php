<select name="movie_genre" onchange="location = this.value;"
    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
    required>
    <option>{{ isset($currentGenre) ? ucwords($currentGenre->name) : 'Genres' }}</option>
    <option value="/movies?{{ http_build_query(request()->except('genre', 'page')) }}"
        :active="request() - > routeIs('/')">All</option>
    @foreach (\App\Models\Genre::all()->sortBy('name') as $genre)
        <option value="/movies/?genre={{ $genre->name }}&{{ http_build_query(request()->except('genre', 'page')) }}"
            :active='request() - > is("/movies/?genre={$genre->name}")'>
            {{ ucwords($genre->name) }}</option>
    @endforeach
</select>

{{-- <x-dropdown>
    <x-slot name="trigger">
        <div
            class="flex justify-between p-2 border-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 w-full">
            <span class="">{{ isset($currentGenre) ? ucwords($currentGenre->name) : 'Genres' }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
        </div>

    </x-slot>

    <x-dropdown.link href="/?{{ http_build_query(request()->except('genre', 'page')) }}" :active="request()->routeIs('/')">
        All
    </x-dropdown.link>

    @foreach ($genres->sortBy('name') as $genre)
        <x-dropdown.link
            href="/movies/?genre={{ $genre->name }}&{{ http_build_query(request()->except('genre', 'page')) }}"
            :active='request()->is("/movies/?genre={$genre->name}")'>
            {{ ucwords($genre->name) }}
        </x-dropdown.link>
    @endforeach
</x-dropdown> --}}
