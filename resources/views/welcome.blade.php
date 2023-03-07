<x-layout>
    <div class="flex justify-center sm:my-8">
        <div class="sm:flex sm:basis-full lg:basis-3/4 xl:basis-1/2">
            <div class="flex flex-col justify-center sm:basis-2/5 bg-gray-100 rounded-b-3xl sm:rounded-3xl py-5 px-8 text-center">
                <img class="max-w-1/2 sm:max-w-full mx-auto" src="https://m.media-amazon.com/images/M/MV5BOTA5NjhiOTAtZWM0ZC00MWNhLThiMzEtZDFkOTk2OTU1ZDJkXkEyXkFqcGdeQXVyMTA4NDI1NTQx._V1_FMjpg_UX1000_.jpg">
                <h1 class="text-4xl sm:text-2xl font-semibold my-2">Star Wars</h1>

                <p class="text-sm uppercase tracking-wider">121 min  -  1977  -  Sci-fi</p>
            </div>
            <div class="sm:basis-3/5 flex flex-col">
                <div class="cursor-pointer h-2/5 flex text-white bg-gradient-to-br from-amber-300 to-orange-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300font-medium rounded-xl mx-8 py-2.5 text-center mb-4 mt-8 h-24">
                    <h2 class="text-2xl self-center w-full drop-shadow-md">
                        Pick a Film
                    </h2>
                </div>
                <div class="cursor-pointer h-2/5 flex text-white bg-gradient-to-br from-amber-300 to-orange-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl mx-8 py-2.5 text-center my-4 h-24">
                    <h2 class="text-2xl self-center w-full drop-shadow-md">
                        Pick a Series
                    </h2>
                </div>
                <div class="cursor-pointer h-1/5 flex text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl mx-8 py-2.5 text-center mt-4 mb-8">
                    <h2 class="text-2xl self-center w-full drop-shadow-md">
                        Add Something
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-between">
        <h2 class="text-3xl my-8 px-4 font-bold">Movies</h2>
        <a href="/" class="mt-12 px-4">Hide watched movies</a>
    </div>
    <div class="flex justify-center">
    <table class="leading-normal w-full table-auto">
        <thead class="table-header-group">
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-indigo-600 text-left font-semibold text-slate-50 uppercase tracking-wider rounded-tl-2xl min-w-">Title</th>
                <th class="hidden sm:block px-5 py-3 border-b-2 border-gray-200 bg-indigo-600 text-left font-semibold text-slate-50 uppercase tracking-wider">Genre</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-indigo-600 text-left font-semibold text-slate-50 uppercase tracking-wider">Runtime</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-indigo-600 text-left font-semibold text-slate-50 uppercase tracking-wider rounded-tr-2xl sm:rounded-none">Watched</th>
                <th class="hidden sm:block px-5 py-3 border-b-2 border-gray-200 bg-indigo-600 text-left font-semibold text-slate-50 uppercase tracking-wider rounded-tr-2xl">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr class="odd:bg-white even:bg-slate-50">
                <td class="px-5 py-3 border-b border-gray-200 font-bold">Star Wars</td>
                <td class="hidden sm:block px-5 py-3 border-b border-gray-200">Sci-Fi</td>
                <td class="px-5 py-3 border-b border-gray-200">121min</td>
                <td class="px-5 py-3 border-b border-gray-200 text-center">
                        <input id="default-checkbox" type="checkbox" value="" class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="default-checkbox" hidden="hidden">Watched</label>
                </td>
                <td class="hidden sm:block px-5 py-3 border-b border-gray-200">
                    <div class="cursor-pointer flex text-white bg-gradient-to-br from-red-500 to-red-900 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 w-1/2 rounded-xl font-medium py-2.5 text-center">
                        <p class="w-full">
                            Delete
                        </p>
                    </div>
                </td>
            </tr>
            <tr class="odd:bg-white even:bg-slate-50">
                <td class="px-5 py-3 border-b border-gray-200 font-bold">Star Wars</td>
                <td class="hidden sm:block px-5 py-3 border-b border-gray-200">Sci-Fi</td>
                <td class="px-5 py-3 border-b border-gray-200">121min</td>
                <td class="px-5 py-3 border-b border-gray-200 text-center">
                        <input id="default-checkbox" type="checkbox" value="" class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="default-checkbox" hidden="hidden">Watched</label>
                </td>
                <td class="hidden sm:block px-5 py-3 border-b border-gray-200">
                    <div class="cursor-pointer flex text-white bg-gradient-to-br from-red-500 to-red-900 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 w-1/2 rounded-xl font-medium py-2.5 text-center">
                        <p class="w-full">
                            Delete
                        </p>
                    </div>
                </td>
            </tr>
            <tr class="odd:bg-white even:bg-slate-50">
                <td class="px-5 py-3 border-b border-gray-200 font-bold">Star Wars</td>
                <td class="hidden sm:block px-5 py-3 border-b border-gray-200">Sci-Fi</td>
                <td class="px-5 py-3 border-b border-gray-200">121min</td>
                <td class="px-5 py-3 border-b border-gray-200 text-center">
                        <input id="default-checkbox" type="checkbox" value="" class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="default-checkbox" hidden="hidden">Watched</label>
                </td>
                <td class="hidden sm:block px-5 py-3 border-b border-gray-200">
                    <div class="cursor-pointer flex text-white bg-gradient-to-br from-red-500 to-red-900 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 w-1/2 rounded-xl font-medium py-2.5 text-center">
                        <p class="w-full">
                            Delete
                        </p>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    </div>

    <div class="flex justify-between">
        <h2 class="text-3xl my-8 px-4 font-bold">Series</h2>
        <a href="/" class="mt-12 px-4">Hide watched series</a>
    </div>
    <div class="flex justify-center">
    <table class="leading-normal w-full table-auto">
        <thead class="table-header-group">
            <tr class="odd:bg-white even:bg-slate-50">
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-indigo-600 text-left font-semibold text-slate-50 uppercase tracking-wider rounded-tl-2xl">Title</th>
                <th class="hidden sm:block px-5 py-3 border-b-2 border-gray-200 bg-indigo-600 text-left font-semibold text-slate-50 uppercase tracking-wider">Genre</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-indigo-600 text-left font-semibold text-slate-50 uppercase tracking-wider">Episodes</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-indigo-600 text-left font-semibold text-slate-50 uppercase tracking-wider rounded-tr-2xl sm:rounded-none">Watched</th>
                <th class="hidden sm:block px-5 py-3 border-b-2 border-gray-200 bg-indigo-600 text-left font-semibold text-slate-50 uppercase tracking-wider rounded-tr-2xl">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr class="odd:bg-white even:bg-slate-50">
                <td class="px-5 py-3 border-b border-gray-200 font-bold">Breaking Bad</td>
                <td class="hidden sm:block px-5 py-3 border-b border-gray-200">Drama</td>
                <td class="px-5 py-3 border-b border-gray-200">62</td>
                <td class="px-5 py-3 border-b border-gray-200 text-center">
                        <input id="default-checkbox" type="checkbox" value="" class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="default-checkbox" hidden="hidden">Watched</label>
                </td>
                <td class="hidden sm:block px-5 py-3 border-b border-gray-200">
                    <div class="cursor-pointer flex text-white bg-gradient-to-br from-red-500 to-red-900 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 w-1/2 rounded-xl font-medium py-2.5 text-center">
                        <p class="w-full">
                            Delete
                        </p>
                    </div>
                </td>
            </tr>
            <tr class="odd:bg-white even:bg-slate-50">
                <td class="px-5 py-3 border-b border-gray-200 font-bold">Breaking Bad</td>
                <td class="hidden sm:block px-5 py-3 border-b border-gray-200">Drama</td>
                <td class="px-5 py-3 border-b border-gray-200">62</td>
                <td class="px-5 py-3 border-b border-gray-200 text-center">
                        <input id="default-checkbox" type="checkbox" value="" class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="default-checkbox" hidden="hidden">Watched</label>
                </td>
                <td class="hidden sm:block px-5 py-3 border-b border-gray-200">
                    <div class="cursor-pointer flex text-white bg-gradient-to-br from-red-500 to-red-900 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 w-1/2 rounded-xl font-medium py-2.5 text-center">
                        <p class="w-full">
                            Delete
                        </p>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="px-5 py-3 border-b border-gray-200 font-bold">Breaking Bad</td>
                <td class="hidden sm:block px-5 py-3 border-b border-gray-200">Drama</td>
                <td class="px-5 py-3 border-b border-gray-200">62</td>
                <td class="px-5 py-3 border-b border-gray-200 text-center">
                        <input id="default-checkbox" type="checkbox" value="" class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="default-checkbox" hidden="hidden">Watched</label>
                </td>
                <td class="hidden sm:block px-5 py-3 border-b border-gray-200">
                    <div class="cursor-pointer flex text-white bg-gradient-to-br from-red-500 to-red-900 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 w-1/2 rounded-xl font-medium py-2.5 text-center">
                        <p class="w-full">
                            Delete
                        </p>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

</div>
    @if ($films->count())
    <table class="min-w-full leading-normal">
        <thead class="table-header-group">
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-700 uppercase tracking-wider">Name</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-700 uppercase tracking-wider">Type</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-700 uppercase tracking-wider">Genre</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-700 uppercase tracking-wider">Runtime</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-700 uppercase tracking-wider">Rating</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($films as $film)
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 bg-white">{{ $film->name }}</td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white">{{ $film->type }}</td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white">{{ $film->genre }}</td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white">{{ $film->runtime }}</td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white">{{ $film->rating }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

</x-layout>
