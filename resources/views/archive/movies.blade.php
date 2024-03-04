<x-app-layout>

    <section>
        <div class="my-8 px-2 container">

            <h2 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200 mb-4 text-center">
                {{ __('Archive - watched movies') }}
            </h2>

            <div class="flex flex-wrap mt-4 gap-2 justify-center">
                <div class="w-full lg:w-1/3">
                    <x-archive-searchbox />
                </div>
                <div class="w-full lg:w-1/3">
                    <x-archive-genre-dropdown />
                </div>

            </div>

            @if ($movies->count())

                <div x-data="{ show: false }">
                    <div class="w-full mt-4" id="moviesTable">
                        {{-- <div class="table-header-group">
                            <div class="hidden md:table-row">
                                <div
                                    class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50 rounded-tl-2xl min-w-">
                                    Title</div>
                                <div
                                    class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                                    Genre</div>
                                <div
                                    class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                                    Release Year</div>
                                <div
                                    class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                                    Runtime</div>
                                <div
                                    class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                                    Effort</div>
                                <div
                                    class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                                    Rating</div>
                                <div
                                    class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                                    Date watched<br> (last updated)
                                </div>
                                <div
                                    class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50 rounded-tr-2xl">
                                    Actions</div>
                            </div>
                        </div> --}}
                        <div class="grid auto-rows-fr grid-cols-2 xl:grid-cols-4 gap-4 text-gray-700">
                            @foreach ($movies as $movie)
                                <div class="w-full p-1 md:p-3 h-full flex flex-col">
                                    <div class=" flex-1 px-md-5 py-3 mt-auto font-bold text-center">
                                        {{-- <label class="text-xs font-semibold text-gray-500 uppercase"
                                            for="">Name</label> --}}
                                        {{ $movie->name }}<br>
                                        <div class="bg-gray-50 rounded-xl h-60 w-full md:w-60 m-auto">
                                        @if (isset($movie->image))
                                            <img src="{{ asset('images/movies/' . $movie->image) }}"
                                                alt="{{ $movie->name }}" class="w-full rounded-xl h-60 object-contain" onerror="this.src='{{ asset('images/movie-no-photo-available.png') }}'">
                                        @else
                                            <img src="{{ asset('images/movie-no-photo-available.png') }}" alt="no image"
                                                class="w-full rounded-xl h-60 object-contain">
                                        @endif
                                    </div>
                                    </div>
                                    <div class="p-3 hidden md:block">
                                        <label class="text-xs font-semibold text-gray-500 uppercase"
                                            for="">Genre</label>
                                        {{ $movie->genre->name }}
                                    </div>
                                    <div class="p-3 hidden md:block">
                                        <label class="text-xs font-semibold text-gray-500 uppercase"
                                            for="">Release
                                            year</label>
                                        {{ $movie->releaseyear }}
                                    </div>
                                    <div class="p-3 hidden md:block">
                                        <label class="text-xs font-semibold text-gray-500 uppercase"
                                            for="">Runtime</label>
                                        @if (isset($movie->runtime))
                                            {{ $movie->runtime }}min
                                        @endif

                                    </div>
                                    <div class="px-3">
                                        <label class="text-xs font-semibold text-gray-500 uppercase"
                                            for="">Effort</label>
                                        @if ($movie->effort == 'Easy')
                                            <x-heroicon-o-face-smile class="block w-auto h-8 text-green-500" />
                                        @elseif($movie->effort == 'Medium')
                                            <x-heroicon-o-face-smile class="block w-auto h-8 text-orange-500" />
                                        @elseif($movie->effort == 'Hard')
                                            <x-heroicon-o-face-smile class="block w-auto h-8 text-red-500" />
                                        @endif
                                        {{-- {{ $movie->effort }} --}}
                                    </div>
                                    <div class="p-3 hidden md:block">
                                        <label class="text-xs font-semibold text-gray-500 uppercase md:hidden"
                                            for="">Rating</label>
                                        @if (is_null($movie->rating))
                                            No rating yet!
                                        @else
                                            {{ $movie->rating }}/10
                                        @endif
                                    </div>
                                    <div class="mt-2 p-3 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                                        role="alert">
                                        We watched this <span
                                            class="font-medium">{{ $movie->updated_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="py-3">
                                        <div class="flex">
                                            <x-primary-link href="/movie/{{ $movie->id }}/edit"
                                                class="rounded-none !rounded-l-lg w-1/2">
                                                {{ __('Edit') }}
                                            </x-primary-link>

                                            <form method="POST" action="/movie/{{ $movie->id }}/delete"
                                                class="w-1/2">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button class="rounded-none !rounded-r-lg w-full"
                                                    onclick="return confirm('Are you sure?')">
                                                    {{ __('Delete') }}
                                                </x-danger-button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            @else
                <x-no-results />

            @endif


        </div>

    </section>

</x-app-layout>
