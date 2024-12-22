<select name="tvshow_genre" onchange="location = this.value;"
    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
    required>
    <option>{{ isset($currentGenre) ? ucwords($currentGenre->name) : 'Genres' }}</option>
    <option value="/tvshows?{{ http_build_query(request()->except('genre', 'page')) }}"
        :active="request() - > routeIs('/')">All</option>
    @foreach (\App\Models\Genre::all()->sortBy('name') as $genre)
        <option value="/tvshows/?genre={{ $genre->name }}"
            :active='request() - > is("/movies/?genre={$genre->name}")'>
            {{ ucwords($genre->name) }}</option>
    @endforeach
</select>

{{-- <option value="/tvshows/?genre={{ $genre->name }}&{{ http_build_query(request()->except('genre', 'page')) }}"
    :active='request() - > is("/movies/?genre={$genre->name}")'>
    {{ ucwords($genre->name) }}</option> --}}

