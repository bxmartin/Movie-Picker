@if ($movies->count())

    <div x-data="{ show: false }">
        <div class="flex justify-end">
            <x-secondary-button class="rounded-lg" @click="show = ! show"
                x-text="show ? 'Hide watched movies' : 'Include watched movies'">
                Include watched movies
            </x-secondary-button>
        </div>

        <div class="" id="moviesTable">



            {{-- <div class="table-header-group">
                <div class="hidden md:table-row">
                    <th
                        class="p-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50 rounded-tl-2xl min-w-">
                        Title</th>
                    <th
                        class="p-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                        Genre</th>
                    <th
                        class="p-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                        Release Year</th>
                    <th
                        class="p-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                        Runtime</th>
                    <th
                        class="p-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                        Effort</th>
                    <th
                        class="p-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
                        Rating</th>

                    <th
                        class="p-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50 rounded-tr-2xl">
                        Actions</th>
                </div>
            </div> --}}
            <div class="text-gray-700 grid grid-cols-2 gap-y-2">
                @foreach ($movies as $movie)
                    <div class="p-1 md:p-3" x-show="{{ $movie->watched === 1 ? 'show' : '' }}">
                        <div class="px-md-5 py-3 mt-auto font-bold text-center">
                            {{-- <label class="text-xs font-semibold text-gray-500 uppercase" for="">Name</label> --}}
                            {{ $movie->name }}<br>
                            @if (isset($movie->image))
                                <img src="{{ asset('images/movies/' . $movie->image) }}" alt="{{ $movie->name }}"
                                    class="w-full rounded-xl md:w-60 m-auto">
                            @else
                                <img src="{{ asset('images/movie-no-photo-available.png') }}" alt="no image"
                                    class="w-full rounded-xl md:w-60 m-auto">
                            @endif
                        </div>
                        <div class="p-3 hidden md:block">
                            <label class="text-xs font-semibold text-gray-500 uppercase" for="">Genre</label>
                            {{ $movie->genre->name }}
                        </div>
                        <div class="p-3 hidden md:block">
                            <label class="text-xs font-semibold text-gray-500 uppercase" for="">Release
                                year</label>
                            {{ $movie->releaseyear }}
                        </div>
                        <div class="p-3 hidden md:block">
                            <label class="text-xs font-semibold text-gray-500 uppercase" for="">Runtime</label>
                            @if (isset($movie->runtime))
                                {{ $movie->runtime }}min
                            @endif

                        </div>
                        <div class="px-3">
                            <label class="text-xs font-semibold text-gray-500 uppercase" for="">Effort</label>
                            @if ($movie->effort == 'Easy')
                            <img src="{{ asset('vendor/blade-heroicons/o-face-smile.svg') }}" class="inline-block w-auto h-8 svg-green" />
                            @elseif($movie->effort == 'Medium')
                            <img src="{{ asset('vendor/blade-heroicons/o-face-smile.svg') }}" class="inline-block w-auto h-8 svg-orange" />
                            @elseif($movie->effort == 'Hard')
                            <img src="{{ asset('vendor/blade-heroicons/o-face-smile.svg') }}" class="inline-block w-auto h-8 svg-red" />
                            @endif
                            {{-- {{ $movie->effort }} --}}
                        </div>
                        <div class="p-3 hidden md:block">
                            <label class="text-xs font-semibold text-gray-500 uppercase" for="">Rating</label>
                            @if (is_null($movie->rating))
                                No rating yet!
                            @else
                                {{ $movie->rating }}/10
                            @endif
                        </div>
                        <div class="py-3">
                            @if ($movie->watched == 0)
                                <form method="POST" action="/movie/{{ $movie->id }}/watched"
                                    id="watched-{{ $movie->id }}">
                                    @csrf
                                    @method('PATCH')
                                    <x-primary-button class="rounded-lg w-full"
                                        onclick="document.getElementById('watched-{{ $movie->id }}').submit();">
                                        Mark watched
                                    </x-primary-button>
                                </form>
                            @else
                                We watched this {{ $movie->updated_at->diffForHumans() }}
                            @endif
                            <div class="flex">
                                <x-primary-link href="/movie/{{ $movie->id }}/edit" class="rounded-none !rounded-l-lg w-50">
                                    {{ __('Edit') }}
                                </x-primary-link>

                                <form method="POST" action="/movie/{{ $movie->id }}/delete">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button class="rounded-none !rounded-r-lg w-50" onclick="return confirm('Are you sure?')">
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

    {{-- Pagination --}}
    {{-- <div class="mt-3 d-flex justify-content-center">
        {!! $movies->links() !!}
    </div> --}}
@else
    <p class="text-center">There are no movies yet. </p>

    <div class="flex flex-col items-center">
        <x-primary-link href="{{ route('addmovie') }}" class="mb-4 !text-left !from-purple-700 !to-purple-500">
            {{ __('Add a new movie') }}
        </x-primary-link>
    </div>

@endif
