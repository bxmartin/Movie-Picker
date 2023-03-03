<x-layout>

    <h1 class="mb-4 text-3xl font-semibold">Welcome</h1>

    <p>This is the Movie picker project.</p>

    @if ($movies->count())
    <table class="min-w-full leading-normal">
        <thead class="table-header-group">
            <tr>
                <th class="px-5 py-3 font-semibold tracking-wider text-left text-gray-700 uppercase bg-gray-100 border-b-2 border-gray-200">Name</th>
                <th class="px-5 py-3 font-semibold tracking-wider text-left text-gray-700 uppercase bg-gray-100 border-b-2 border-gray-200">Type</th>
                <th class="px-5 py-3 font-semibold tracking-wider text-left text-gray-700 uppercase bg-gray-100 border-b-2 border-gray-200">Genre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
            <tr>
                <td class="px-5 py-5 bg-white border-b border-gray-200">{{ $movie->name }}</td>
                <td class="px-5 py-5 bg-white border-b border-gray-200">{{ $movie->type }}</td>
                <td class="px-5 py-5 bg-white border-b border-gray-200">{{ $movie->genre }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

</x-layout>
