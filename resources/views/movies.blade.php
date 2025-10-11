<x-app-layout>

    <div class="flex flex-col justify-center px-8 py-5 mb-2 text-center bg-slate-100">
        @if ($movies->count())
            {{-- Shown only if atleast one movie exists --}}

            <div id="movie-result" class="">
                <livewire:pick-movie />
            </div>
        @endif

        <x-links.hero href="{{ route('addmovie') }}" class="">
            <img src="{{ asset('vendor/blade-heroicons/o-plus.svg') }}" class="inline-block h-8 mr-3 svg-white" />
            {{ __('Add a Movie') }}
        </x-links.hero>

    </div>

    <div class="w-full mx-auto p-2">

        @if ($movies->count())
            <div x-data="{ show: false, searchmodalIsOpen: false, modalIsOpen: false }">

                <div class="flex flex-row gap-2">
                    <x-buttons.secondary x-on:click="searchmodalIsOpen = true" type="button"
                        class="w-1/2 block mb-1"><i class="fa-solid fa-magnifying-glass mr-2"></i>
                        Search</x-buttons.secondary>
                    <x-buttons.secondary class="w-1/2 block mb-1" x-on:click="modalIsOpen = true" type="button"><i
                            class="fa-solid fa-up-down mr-2"></i> Sort</x-buttons.secondary>
                </div>

                <div class="flex flex-row gap-2 mb-4">
                    <x-buttons.secondary class="w-1/2 block mb-1" @click="show = ! show"
                        x-text="show ? 'Hide watched movies' : 'Include watched movies'">
                        Include watched movies
                    </x-buttons.secondary>
                    <a class="items-center px-4 py-3.5 bg-white border border-gray-200 rounded-md font-semibold text-xs text-black uppercase shadow-sm hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 w-1/2 block mb-1"
                        href="{{ route('movie.archive') }}"><i class="fa-solid fa-box-archive mr-2"></i>
                        View archive
                    </a>
                </div>

                <x-sort />

                <x-inputs.movies-searchbox />

                <div class="" id="moviesTable">
                    <div class="grid grid-cols-2 xl:grid-cols-4 gap-4">
                        @foreach ($movies as $movie)
                            <div class="w-full p-1" x-show="{{ $movie->watched === 1 ? 'show' : '' }}">
                                <div class="border border-gray-200 bg-white rounded-xl">
                                    <div class="p-1 mt-auto text-center">
                                        <h4 class="my-2 font-bold">{{ $movie->name }}</h4>
                                        <div class="bg-slate-100 h-60 w-full mx-auto mb-2">
                                            @if (isset($movie->image))
                                                <img src="{{ asset('images/movies/' . $movie->image) }}"
                                                    alt="{{ $movie->name }}" class="w-full h-60 object-contain"
                                                    onerror="this.src='{{ asset('images/movie-no-photo-available.png') }}'">
                                            @else
                                                <img src="{{ asset('images/movie-no-photo-available.png') }}"
                                                    alt="no image" class="w-full h-60 object-contain">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <x-inputs.label :value="__('Effort')" class="!inline-block" />
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
                                    </div>

                                    <div x-data="{ show: false }" class="px-3">
                                        <button
                                            class="items-center justify-between w-full p-2 font-medium text-gray-500 border border-gray-200 bg-white rounded hover:bg-gray-100 text-center"
                                            @click="show = !show" :aria-expanded="show ? 'true' : 'false'"
                                            :class="{ 'active': show }">
                                            Full details
                                        </button>
                                        <div x-show="show">
                                            <div class="p-3">
                                                <x-inputs.label :value="__('Added by')" class="!inline-block" />
                                                @if (isset($movie->createdBy))
                                                    {{ $movie->createdBy->name }}
                                                @endif
                                            </div>
                                            <div class="p-3">
                                                <x-inputs.label :value="__('Genre')" class="!inline-block" />
                                                {{ $movie->genre->name }}
                                            </div>
                                            <div class="p-3">
                                                <x-inputs.label :value="__('Release year')" class="!inline-block" />
                                                {{ $movie->releaseyear }}
                                            </div>
                                            <div class="p-3">
                                                <x-inputs.label :value="__('Runtime')" class="!inline-block" />
                                                @if (isset($movie->runtime))
                                                    {{ $movie->runtime }}min
                                                @endif
                                            </div>

                                            <div class="p-3 hidden md:block">
                                                <x-inputs.label :value="__('Rating')" class="!inline-block" />
                                                @if (is_null($movie->rating))
                                                    No rating yet!
                                                @else
                                                    {{ $movie->rating }}/10
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        @if ($movie->watched == 0)
                                            <form method="POST" action="/movie/{{ $movie->id }}/watched"
                                                id="watched-{{ $movie->id }}">
                                                @csrf
                                                @method('PATCH')
                                                <x-buttons.primary class="w-full"
                                                    onclick="document.getElementById('watched-{{ $movie->id }}').submit();">
                                                    <img src="{{ asset('vendor/blade-heroicons/s-eye.svg') }}"
                                                        class="inline-block h-5 mr-1 svg-white" />
                                                    <span class="mt-0.5">Mark watched</span>
                                                </x-buttons.primary>
                                            </form>
                                        @else
                                            <x-alerts.watched>
                                                <span class="hidden lg:inline-flex">We watched this </span>
                                                <span
                                                    class="inline-flex"><strong>{{ $movie->updated_at->diffForHumans() }}</strong></span>
                                            </x-alerts.watched>
                                        @endif
                                        <div class="md:flex md:gap-2">
                                            <x-links.edit href="/movie/{{ $movie->id }}/edit"
                                                class="!md:rounded-l-lg w-full md:w-1/2 mt-2">
                                                {{ __('Edit') }}
                                            </x-links.edit>

                                            <form method="POST" action="/movie/{{ $movie->id }}/delete"
                                                class="w-full md:w-1/2 mt-2">
                                                @csrf
                                                @method('DELETE')
                                                <x-buttons.danger class="rounded-lg !md:rounded-r-lg w-full"
                                                    onclick="return confirm('Are you sure you want to delete {{ $movie->name }}?')">
                                                    {{ __('Delete') }}
                                                </x-buttons.danger>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            {{-- <div class="mt-3 d-flex justify-content-center">
                {!! $movies->links() !!}
            </div> --}}
        @else
            <p class="text-center">There are no movies yet. </p>

            <div class="flex flex-col items-center">
                <x-links.primary href="{{ route('addmovie') }}"
                    class="mb-4 !text-left !from-purple-700 !to-purple-500">
                    {{ __('Add a new movie') }}
                </x-links.primary>
            </div>
        @endif

        {{-- <x-movies-list /> --}}

    </div>

    <x-scroll-to-top />

</x-app-layout>


<script src="/scripts/scroll-to-top.js"></script>
<script src="{{ asset('/scripts/home-picks.js') }}"></script>
