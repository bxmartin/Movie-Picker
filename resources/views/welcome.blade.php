<x-layout>

    <h1 class="text-3xl font-semibold mb-4">Welcome</h1>

    <p>This is the movie picker project.</p>

    @if ($films->count())
    <table class="min-w-full leading-normal">
        <thead class="table-header-group">
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-700 uppercase tracking-wider">Name</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-700 uppercase tracking-wider">Type</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-700 uppercase tracking-wider">Genre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($films as $film)
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 bg-white">{{ $film->name }}</td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white">{{ $film->type }}</td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white">{{ $film->genre }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

</x-layout>
