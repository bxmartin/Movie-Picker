@if ($movies->count())

    <div x-data="{ show: false }">
        <div class="flex justify-end mb-4">
            <x-buttons.secondary class="rounded-lg" @click="show = ! show"
                x-text="show ? 'Hide watched movies' : 'Include watched movies'">
                Include watched movies
            </x-buttons.secondary>
        </div>

        <div class="" id="moviesTable">
            <div class="grid auto-rows-fr grid-cols-2 xl:grid-cols-4 gap-4">
                @foreach ($movies as $movie)
                    <div class="w-full border border-gray-200 rounded-xl h-full flex flex-col"
                        x-show="{{ $movie->watched === 1 ? 'show' : '' }}">
                        <div class="p-1 mt-auto font-bold text-center">
                            <h4 class="mb-1">{{ $movie->name }}</h4>
                            <div class="bg-gray-50 h-60 px-2 w-full mx-auto mb-3">
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
                        </div>
                        <div class="p-3 hidden md:block">
                            <x-inputs.label :value="__('Genre')" class="!inline-block" />
                            {{ $movie->genre->name }}
                        </div>
                        <div class="p-3 hidden md:block">
                            <x-inputs.label :value="__('Release year')" class="!inline-block" />
                            {{ $movie->releaseyear }}
                        </div>
                        <div class="p-3 hidden md:block">
                            <x-inputs.label :value="__('Runtime')" class="!inline-block" />
                            @if (isset($movie->runtime))
                                {{ $movie->runtime }}min
                            @endif
                        </div>
                        <div class="px-3">
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
                            {{-- {{ $movie->effort }} --}}
                        </div>
                        <div class="p-3 hidden md:block">
                            <x-inputs.label :value="__('Rating')" class="!inline-block" />
                            @if (is_null($movie->rating))
                                No rating yet!
                            @else
                                {{ $movie->rating }}/10
                            @endif
                        </div>
                        <div class="p-3">
                            @if ($movie->watched == 0)
                                <form method="POST" action="/movie/{{ $movie->id }}/watched"
                                    id="watched-{{ $movie->id }}">
                                    @csrf
                                    @method('PATCH')
                                    <x-buttons.primary class="rounded-lg w-full"
                                        onclick="document.getElementById('watched-{{ $movie->id }}').submit();">
                                        Mark watched
                                    </x-buttons.primary>
                                </form>
                            @else
                                <x-alerts.watched>
                                    <span class="hidden lg:inline-flex">We watched this </span>
                                    <span class="inline-flex"><strong>{{ $movie->updated_at->diffForHumans() }}</strong></span>
                                </x-alerts.watched>
                            @endif
                            <div class="flex">
                                <x-links.primary href="/movie/{{ $movie->id }}/edit"
                                    class="rounded-none !rounded-l-lg w-1/2">
                                    {{ __('Edit') }}
                                </x-links.primary>

                                <form method="POST" action="/movie/{{ $movie->id }}/delete" class=" w-1/2">
                                    @csrf
                                    @method('DELETE')
                                    <x-buttons.danger class="rounded-none !rounded-r-lg w-full"
                                        onclick="return confirm('Are you sure you want to delete {{ $movie->name }}?')">
                                        {{ __('Delete') }}
                                    </x-buttons.danger>
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
        <x-links.primary href="{{ route('addmovie') }}" class="mb-4 !text-left !from-purple-700 !to-purple-500">
            {{ __('Add a new movie') }}
        </x-links.primary>
    </div>

@endif
