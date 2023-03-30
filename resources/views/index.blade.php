<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Movie Picker') }}
        </h2>
    </x-slot>

    <div class="flex justify-center sm:my-8">
        <div class="sm:flex sm:basis-full lg:basis-3/4 xl:basis-1/2">
            <div
                class="flex flex-col justify-center px-8 py-5 text-center bg-gray-100 sm:basis-2/5 rounded-b-3xl sm:rounded-3xl">
                <img class="mx-auto max-w-1/2 sm:max-w-full"
                    src="https://m.media-amazon.com/images/M/MV5BOTA5NjhiOTAtZWM0ZC00MWNhLThiMzEtZDFkOTk2OTU1ZDJkXkEyXkFqcGdeQXVyMTA4NDI1NTQx._V1_FMjpg_UX1000_.jpg">
                <h1 class="my-2 text-4xl font-semibold sm:text-2xl">Star Wars</h1>

                <p class="text-sm tracking-wider uppercase">121 min - 1977 - Sci-fi</p>
            </div>
            <div class="flex flex-col px-8 sm:basis-3/5">
                <x-hero-button href="{{ route('randommovie') }}" class="mb-4">
                    <x-heroicon-o-film class="inline-block h-12 mr-3" />
                    {{ __('Pick a Movie') }}
                </x-hero-button>

                <x-hero-button href="{{ route('randommovie') }}" class="mb-4 bg-purple-800 hover:bg-purple-700">
                    <x-heroicon-o-tv class="inline-block h-12 mr-3" />
                    {{ __('Pick a TV Show') }}
                </x-hero-button>

                <x-hero-button href="{{ route('addmovie') }}" class="mb-4">
                    <x-heroicon-o-film class="inline-block h-10" />
                    <x-heroicon-o-plus class="inline-block h-8 mr-2" />
                    {{ __('Add a Movie') }}
                </x-hero-button>

                <x-hero-button href="{{ route('addtvshow') }}" class="mb-4 bg-purple-800 hover:bg-purple-700">
                    <x-heroicon-o-tv class="inline-block h-10" />
                    <x-heroicon-o-plus class="inline-block h-8 mr-2" />
                    {{ __('Add a TV Show') }}
                </x-hero-button>

                <button
                    class="h-1/5 text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl py-2.5 text-center mt-4 mb-8 text-2xl drop-shadow-md"
                    id="open-btn">
                    Add Something
                </button>

            </div>
        </div>
    </div>

    @if ($movies->count())
    <div class="flex justify-between">
        <h2 class="px-4 my-8 text-3xl font-bold">Movies</h2>
        <button x-on:click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }"
            class="px-4 mt-12">Hide watched movies</button>
    </div>

    <table class="table w-full leading-normal table-auto" id="moviesTable">
        <thead class="table-header-group">
            <tr class="hidden md:table-row">
                <th class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50 rounded-tl-2xl min-w-"">
                        Title</th>
                    <th
                        class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                    Genre</th>
                <th
                    class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                    Runtime</th>
                <th
                    class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                    Effort</th>
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
        <tbody class="flex-1 text-gray-700 sm:flex-none">
            @foreach ($movies as $movie)
            <tr
                class="flex flex-col flex-wrap w-full p-1 border-t first:border-t-0 md:p-3 md:table-row odd:bg-white even:bg-slate-50">
                <td class="px-5 py-3 font-bold border-b border-gray-200">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:hidden" for="">Name</label>
                    {{ $movie->name }}
                </td>
                <td class="px-5 py-3 border-b border-gray-200">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:hidden" for="">Genre</label>
                    {{ $movie->genre }}
                </td>
                <td class="px-5 py-3 border-b border-gray-200">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:hidden" for="">Runtime</label>
                    {{ $movie->runtime }}min
                </td>
                <td class="px-5 py-3 border-b border-gray-200">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:hidden" for="">Effort</label>
                    @if($movie->effort =='Easy')
                    <x-heroicon-o-face-smile class="block w-auto h-8 text-green-500" />
                    @elseif($movie->effort =='Medium')
                    <x-heroicon-o-face-smile class="block w-auto h-8 text-orange-500" />
                    @elseif($movie->effort =='Hard')
                    <x-heroicon-o-face-smile class="block w-auto h-8 text-red-500" />
                    @endif
                    {{-- {{ $movie->effort }} --}}
                </td>
                <td class="px-5 py-3 border-b border-gray-200">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:hidden" for="">Rating</label>
                    @if(is_null($movie->rating))
                    No rating!
                    @else
                    {{ $movie->rating }}/10
                    @endif
                </td>
                <td class="px-5 py-3 border-b border-gray-200">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:hidden" for="">Watched?</label>
                    <input id="default-checkbox" type="checkbox" value=""
                        class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                        {{ $movie->watched == 1 ? 'checked' : ''}}">
                    <label for="default-checkbox" hidden="hidden">Watched</label>
                </td>
                <td class="py-3 border-b border-gray-200">
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

    <div class="flex justify-between">
        <h2 class="px-4 my-8 text-3xl font-bold">Series</h2>
        <a href="/" class="px-4 mt-12">Hide watched series</a>
    </div>
    <div class="flex justify-center">
        @if ($tvshows->count())
        <table class="table w-full leading-normal table-auto" id="tvshowsTable">
            <thead class="table-header-group">
                <tr class="hidden md:table-row">
                    <th
                        class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50 rounded-tl-2xl">
                        Title</th>
                    <th
                        class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                        Genre</th>
                        <th
                            class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                            Release Year</th>
                    <th
                        class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                        Length</th>
                    <th
                        class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                        Effort</th>
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
            <tbody class="flex-1 text-gray-700 sm:flex-none">
                @foreach ($tvshows as $tvshow)
                <tr
                    class="flex flex-col flex-wrap w-full p-1 border-t first:border-t-0 md:p-3 md:table-row odd:bg-white even:bg-slate-50">
                    <td class="px-5 py-3 font-bold border-b border-gray-200">
                        <label class="text-xs font-semibold text-gray-500 uppercase md:hidden" for="">Name</label>
                        {{ $tvshow->name }}
                    </td>
                    <td class="px-5 py-3 border-b border-gray-200">
                        <label class="text-xs font-semibold text-gray-500 uppercase md:hidden" for="">Genre</label>
                        {{ $tvshow->genre }}
                    </td>
                    <td class="px-5 py-3 border-b border-gray-200">
                        <label class="text-xs font-semibold text-gray-500 uppercase md:hidden" for="">Release year</label>
                        {{ $tvshow->releaseyear }}
                    </td>
                    <td class="px-5 py-3 border-b border-gray-200">
                        <label class="text-xs font-semibold text-gray-500 uppercase md:hidden" for="">Length</label>
                        {{ $tvshow->seasons }} seasons and {{ $tvshow->episodes }} episodes
                    </td>
                    <td class="px-5 py-3 border-b border-gray-200">
                        <label class="text-xs font-semibold text-gray-500 uppercase md:hidden" for="">Effort</label>
                        @if($tvshow->effort =='Easy')
                        <x-heroicon-o-face-smile class="block w-auto h-8 text-green-500" />
                        @elseif($tvshow->effort =='Medium')
                        <x-heroicon-o-face-smile class="block w-auto h-8 text-orange-500" />
                        @elseif($tvshow->effort =='Hard')
                        <x-heroicon-o-face-smile class="block w-auto h-8 text-red-500" />
                        @endif
                    </td>
                    <td class="px-5 py-3 border-b border-gray-200">
                        <label class="text-xs font-semibold text-gray-500 uppercase md:hidden" for="">Rating</label>
                        @if(is_null($tvshow->rating))
                        No rating!
                        @else
                        {{ $tvshow->rating }}/10
                        @endif
                    </td>
                    <td class="px-5 py-3 border-b border-gray-200">
                        <label class="text-xs font-semibold text-gray-500 uppercase md:hidden" for="">Watched?</label>
                        <input id="default-checkbox" type="checkbox" value=""
                            class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                            {{ $tvshow->watched == 1 ? 'checked' : ''}}>
                        <label for="default-checkbox" hidden="hidden">Watched</label>
                    </td>
                    <td class="py-3 border-b border-gray-200">
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

    <x-add-something></x-add-something>
