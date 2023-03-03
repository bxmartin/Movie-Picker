<x-layout>
    <div class="flex justify-center my-8">
        <div class="flex basis-1/2">
            <div class="px-8 py-5 text-center bg-gray-100 basis-2/5 rounded-3xl">
                <img
                    src="https://m.media-amazon.com/images/M/MV5BOTA5NjhiOTAtZWM0ZC00MWNhLThiMzEtZDFkOTk2OTU1ZDJkXkEyXkFqcGdeQXVyMTA4NDI1NTQx._V1_FMjpg_UX1000_.jpg">
                <h1 class="my-2 text-2xl font-semibold">Star Wars</h1>

                <p class="text-sm tracking-wider uppercase">121 min - 1977 - Sci-fi</p>
            </div>
            <div class="flex flex-col basis-3/5">
                <div
                    class="cursor-pointer h-2/5 flex text-white bg-gradient-to-br from-amber-300 to-orange-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300font-medium rounded-xl mx-8 py-2.5 text-center mb-4 mt-8 h-24">
                    <h2 class="self-center w-full text-2xl drop-shadow-md">
                        Pick a Movie
                    </h2>
                </div>
                <div
                    class="cursor-pointer h-2/5 flex text-white bg-gradient-to-br from-amber-300 to-orange-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl mx-8 py-2.5 text-center my-4 h-24">
                    <h2 class="self-center w-full text-2xl drop-shadow-md">
                        Pick a Series
                    </h2>
                </div>
                <div
                    class="cursor-pointer h-1/5 flex text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl mx-8 py-2.5 text-center mt-4 mb-8">
                    <h2 class="self-center w-full text-2xl drop-shadow-md">
                        Add Something
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-between">
        <h2 class="px-4 my-8 text-3xl font-bold">Movies</h2>
        <a href="/" class="px-4 mt-12">Hide watched movies</a>
    </div>
    <div class="flex justify-center">

        @if ($movies->count())
        <table class="w-full leading-normal">
            <thead class="table-header-group">
                <tr>
                    <th
                        class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50 rounded-tl-2xl">
                        Title</th>
                    <th
                        class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                        Genre</th>
                    <th
                        class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                        Runtime</th>
                    <th
                        class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                        Rating</th>
                    <th
                        class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                        Watched</th>
                    <th
                        class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50 rounded-tr-2xl">
                        Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                <tr class="odd:bg-white even:bg-slate-50">

                    <td class="px-5 py-3 font-bold border-b border-gray-200">{{ $movie->name }}</td>
                    <td class="px-5 py-3 border-b border-gray-200">{{ $movie->genre }}</td>
                    <td class="px-5 py-3 border-b border-gray-200">{{ $movie->runtime }}min</td>
                    <td class="px-5 py-3 border-b border-gray-200">{{ $movie->rating }}/10</td>
                    <td class="px-5 py-3 border-b border-gray-200">
                        <input id="default-checkbox" type="checkbox" value=""
                            class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="default-checkbox" hidden="hidden">Watched</label>
                    </td>
                    <td class="px-5 py-3 border-b border-gray-200">
                        <div
                            class="cursor-pointer flex text-white bg-gradient-to-br from-red-500 to-red-900 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 w-1/2 rounded-xl font-medium py-2.5 text-center">
                            <p class="w-full">
                                Delete
                            </p>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @endif
    </div>

    <div class="flex justify-between">
        <h2 class="px-4 my-8 text-3xl font-bold">Series</h2>
        <a href="/" class="px-4 mt-12">Hide watched series</a>
    </div>
    <div class="flex justify-center">
        @if ($tvshows->count())
        <table class="w-full leading-normal">
            <thead class="table-header-group">
                <tr class="odd:bg-white even:bg-slate-50">
                    <th
                        class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50 rounded-tl-2xl">
                        Title</th>
                    <th
                        class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                        Genre</th>
                    <th
                        class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                        Episodes</th>
                    <th
                        class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                        Rating</th>
                    <th
                        class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                        Watched</th>
                    <th
                        class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50 rounded-tr-2xl">
                        Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tvshows as $tvshow)
                <tr class="odd:bg-white even:bg-slate-50">
                    <td class="px-5 py-3 font-bold border-b border-gray-200">{{ $tvshow->name }}</td>
                    <td class="px-5 py-3 border-b border-gray-200">{{ $tvshow->genre }}</td>
                    <td class="px-5 py-3 border-b border-gray-200">{{ $tvshow->episodes }}</td>
                    <td class="px-5 py-3 border-b border-gray-200">{{ $tvshow->rating }}/10</td>
                    <td class="px-5 py-3 border-b border-gray-200">
                        <input id="default-checkbox" type="checkbox" value=""
                            class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="default-checkbox" hidden="hidden">Watched</label>
                    </td>
                    <td class="px-5 py-3 border-b border-gray-200">
                        <div
                            class="cursor-pointer flex text-white bg-gradient-to-br from-red-500 to-red-900 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 w-1/2 rounded-xl font-medium py-2.5 text-center">
                            <p class="w-full">
                                Delete
                            </p>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @endif
    </div>

</x-layout>
