<x-app-layout>

    <section>
        <div class="my-8 px-2 container">

            <h2 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200 mb-4 text-center">
                {{ __('Archive - watched movies') }}
            </h2>

            <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">

                <div class="relative lg:inline-flex">
                    <x-inputs.archive-searchbox />
                </div>
                <div class="relative lg:inline-flex">
                    <x-dropdown.archive-genre />
                </div>

            </div>

            @if ($movies->count())

                <div x-data="{ show: false }">
                    <table class="table w-full leading-normal table-auto" id="moviesTable">
                        <thead class="table-header-group">
                            <tr class="hidden md:table-row">
                                <th
                                    class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50 rounded-tl-2xl min-w-">
                                    Title</th>
                                <th
                                    class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                                    Genre</th>
                                <th
                                    class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                                    Release Year</th>
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
                                    Date watched<br> (last updated)
                                </th>
                                <th
                                    class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50 rounded-tr-2xl">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="flex-1 text-gray-700 sm:flex-none">
                            @foreach ($movies as $movie)
                                <tr
                                    class="flex flex-col flex-wrap w-full p-1 border-t first:border-t-0 md:p-3 md:table-row odd:bg-slate-50 even:bg-slate-100">
                                    <td class="px-5 py-3 font-bold border-b border-gray-200">
                                        <label class="text-xs font-semibold text-gray-500 uppercase md:hidden"
                                            for="">Name</label>
                                        {{ $movie->name }}<br>
                                        <div class="bg-gray-100 h-60 px-2 w-full mx-auto mb-3">
                                            @if (isset($movie->image))
                                                <img src="{{ asset('images/movies/' . $movie->image) }}"
                                                    alt="{{ $movie->name }}"
                                                    class="w-full h-60 object-contain"
                                                    onerror="this.src='{{ asset('images/movie-no-photo-available.png') }}'">
                                            @else
                                                <img src="{{ asset('images/movie-no-photo-available.png') }}"
                                                    alt="no image"
                                                    class="w-full h-60 object-contain">
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-5 py-3 border-b border-gray-200">
                                        <label class="text-xs font-semibold text-gray-500 uppercase md:hidden"
                                            for="">Genre</label>
                                        {{ $movie->genre->name }}
                                    </td>
                                    <td class="px-5 py-3 border-b border-gray-200">
                                        <label class="text-xs font-semibold text-gray-500 uppercase md:hidden"
                                            for="">Release
                                            year</label>
                                        {{ $movie->releaseyear }}
                                    </td>
                                    <td class="px-5 py-3 border-b border-gray-200">
                                        <label class="text-xs font-semibold text-gray-500 uppercase md:hidden"
                                            for="">Runtime</label>
                                        @if (isset($movie->runtime))
                                            {{ $movie->runtime }}min
                                        @endif

                                    </td>
                                    <td class="px-5 py-3 border-b border-gray-200">
                                        <label class="text-xs font-semibold text-gray-500 uppercase md:hidden"
                                            for="">Effort</label>
                                        @if ($movie->effort == 'Easy')
                                            <img src="{{ asset('vendor/blade-heroicons/o-face-smile.svg') }}"
                                                class="inline-block w-auto h-8 svg-green" />
                                        @elseif($movie->effort == 'Medium')
                                        <img src="{{ asset('vendor/blade-heroicons/o-face-smile.svg') }}"
                                            class="inline-block w-auto h-8 svg-orange" />
                                        @elseif($movie->effort == 'Hard')
                                        <img src="{{ asset('vendor/blade-heroicons/o-face-smile.svg') }}"
                                            class="inline-block w-auto h-8 svg-red" />
                                        @endif
                                        {{-- {{ $movie->effort }} --}}
                                    </td>
                                    <td class="px-5 py-3 border-b border-gray-200">
                                        <label class="text-xs font-semibold text-gray-500 uppercase md:hidden"
                                            for="">Rating</label>
                                        @if (is_null($movie->rating))
                                            No rating yet!
                                        @else
                                            {{ $movie->rating }}/10
                                        @endif
                                    </td>
                                    <td class="px-5 py-3 border-b border-gray-200">
                                        {{ $movie->updated_at->diffForHumans() }}
                                    </td>
                                    <td class="px-5 py-3 border-b-0 border-gray-200 sm:border-b">
                                        <div class="inline-flex">
                                            <x-links.edit href="/movie/{{ $movie->id }}/edit"
                                                class="rounded-none rounded-l-lg">
                                                {{ __('Edit') }}
                                            </x-links.edit>

                                            <form method="POST" action="/movie/{{ $movie->id }}/delete">
                                                @csrf
                                                @method('DELETE')
                                                <x-buttons.danger class="rounded-none rounded-r-lg"
                                                    onclick="return confirm('Are you sure?')">
                                                    {{ __('Delete') }}
                                                </x-buttons.danger>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            @else
                <x-no-results />

            @endif


        </div>

    </section>

</x-app-layout>
