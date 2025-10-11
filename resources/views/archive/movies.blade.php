<x-app-layout>

    <section>
        <div class="my-8 px-2 container">

            <h2 class="text-2xl font-semibold leading-tight text-gray-800 mb-4 text-center">
                {{ __('Archive - watched movies') }}
            </h2>

            <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4 mb-8">

                <div class="relative lg:inline-flex">
                    <x-inputs.archive-searchbox />
                </div>
                <div class="relative lg:inline-flex">
                    <x-dropdown.archive-genre />
                </div>

            </div>

            @if ($movies->count())

                @foreach ($movies as $movie)
                    <div x-data="{ show: false }" class="mb-4 border border-gray-200 rounded p-2 bg-white">
                        <div class="bg-slate-100 px-2 w-full mx-auto mb-3">
                            @if (isset($movie->image))
                                <img src="{{ asset('images/movies/' . $movie->image) }}" alt="{{ $movie->name }}"
                                    class="w-full h-32 object-contain"
                                    onerror="this.src='{{ asset('images/movie-no-photo-available.png') }}'">
                            @else
                                <img src="{{ asset('images/movie-no-photo-available.png') }}" alt="no image"
                                    class="w-full h-32 object-contain">
                            @endif
                        </div>
                        <h4 class="mb-2 text-center">
                            <span class="font-lg font-semibold">{{ $movie->name }}</span>
                            @if (isset($movie->archived_at))
                             - {{ Carbon\Carbon::parse($movie->archived_at)->diffForHumans() }}
                             @else
                             - last updated {{ $movie->updated_at->diffForHumans() }}
                            @endif
                            </h4>
                        <button
                            class="flex items-center justify-between w-full p-3 font-medium text-gray-500 border border-gray-200 bg-white rounded hover:bg-gray-100"
                            @click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }">
                            View movie details
                        </button>
                        <div x-show="show" class="p-3 border border-gray-200 border-t-0 bg-white">
                            <label class="text-xs font-semibold text-gray-500 uppercase"
                                for="">Genre</label>
                            {{ $movie->genre->name }}
                            <hr class="my-4" />
                            <label class="text-xs font-semibold text-gray-500 uppercase"
                                for="">Release
                                year</label>
                            {{ $movie->releaseyear }}
                            <hr class="my-4" />
                            <label class="text-xs font-semibold text-gray-500 uppercase"
                                for="">Runtime</label>
                            @if (isset($movie->runtime))
                                {{ $movie->runtime }}min
                            @endif

                            <hr class="my-4" />
                            <label class="text-xs font-semibold text-gray-500 uppercase"
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

                            <hr class="my-4" />
                            <label class="text-xs font-semibold text-gray-500 uppercase"
                                for="">Rating</label>
                            @if (is_null($movie->rating))
                                No rating yet!
                            @else
                                {{ $movie->rating }}/10
                            @endif

                            <hr class="my-4" />
                            <form method="POST" action="/movie/{{ $movie->id }}/delete" class="inline-flex w-full">
                                <x-links.edit href="/movie/{{ $movie->id }}/edit"
                                    class="rounded-none rounded-l-lg !w-auto flex items-center">
                                    {{ __('Edit') }}
                                </x-links.edit>
                                @csrf
                                @method('DELETE')
                                <x-buttons.danger class="rounded-none rounded-r-lg flex items-center"
                                    onclick="return confirm('Are you sure?')">
                                    <img src="{{ asset('vendor/blade-heroicons/s-trash.svg') }}"
                                        class="inline-block h-4 mr-1 svg-white" />
                                    {{ __('Delete') }}
                                </x-buttons.danger>
                            </form>
                        </div>
                    </div>
                @endforeach



                </div>
            @else
                <x-no-results />

            @endif


        </div>

    </section>

</x-app-layout>
