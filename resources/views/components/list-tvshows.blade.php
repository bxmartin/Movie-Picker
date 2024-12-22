@if ($tvshows->count())

    <div x-data="{ show: false }">
        <div class="flex justify-end my-4">
            <x-buttons.secondary class="rounded-lg" @click="show = ! show"
                x-text="show ? 'Hide watched shows' : 'Include watched shows'">
                Include watched shows
            </x-buttons.secondary>
        </div>

        <div class="" id="tvshowsTable">
            <div class="grid auto-rows-fr grid-cols-2 xl:grid-cols-4 gap-4">
                @foreach ($tvshows as $tvshow)
                    <div class="w-full border border-gray-200 rounded-xl h-full flex flex-col"
                        x-show.transition.in="{{ $tvshow->watched == 1 ? 'show' : '' }}">
                        <div class="p-1 mt-auto font-bold text-center">
                            <h4 class="mb-1">{{ $tvshow->name }}</h4>
                            <div class="bg-slate-100 h-60 px-2 w-full mx-auto mb-3">
                                @if (isset($tvshow->image))
                                    <img src="{{ asset('images/tvshows/' . $tvshow->image) }}" alt="{{ $tvshow->name }}"
                                        class="w-full h-60 object-contain"
                                        onerror="this.src='{{ asset('images/movie-no-photo-available.png') }}'">
                                @else
                                    <img src="{{ asset('images/tvshow-no-photo-available.png') }}" alt="no image"
                                        class="w-full h-60 object-contain">
                                @endif
                            </div>
                        </div>
                        <div class="p-3 hidden md:block">
                            <x-inputs.label :value="__('Genre')" class="!inline-block" />
                            @props(['genre'])
                            {{ $tvshow->genre->name }}
                        </div>
                        <div class="p-3 hidden md:block">
                            <x-inputs.label :value="__('Release year')" class="!inline-block" />
                            {{ $tvshow->releaseyear }}
                        </div>
                        <div class="p-3 hidden md:block">
                            <x-inputs.label :value="__('Length')" class="!inline-block" />
                            @if (isset($tvshow->seasons))
                                @if ($tvshow->seasons == 1)
                                    {{ $tvshow->seasons }} season
                                @else
                                    {{ $tvshow->seasons }} seasons
                                @endif
                            @endif
                            @if (isset($tvshow->episodes))
                                {{ $tvshow->episodes }} episodes
                            @endif
                        </div>
                        <div class="p-3">
                            <x-inputs.label :value="__('Effort')" class="!inline-block" />
                            @if ($tvshow->effort == 'Easy')
                                <img src="{{ asset('vendor/blade-heroicons/o-face-smile.svg') }}"
                                    class="inline-block w-auto h-8 svg-green" />
                            @elseif($tvshow->effort == 'Medium')
                                <img src="{{ asset('vendor/blade-heroicons/o-face-smile.svg') }}"
                                    class="inline-block w-auto h-8 svg-orange" />
                            @elseif($tvshow->effort == 'Hard')
                                <img src="{{ asset('vendor/blade-heroicons/o-face-smile.svg') }}"
                                    class="inline-block w-auto h-8 svg-red" />
                            @endif
                        </div>
                        <div class="p-3 hidden md:block">
                            <x-inputs.label :value="__('Rating')" class="!inline-block" />
                            @if (is_null($tvshow->rating))
                                No rating yet!
                            @else
                                {{ $tvshow->rating }}/10
                            @endif
                        </div>
                        <div class="p-3">
                            @if ($tvshow->watched == 0)
                                <form method="POST" action="/tvshow/{{ $tvshow->id }}/watched"
                                    id="watched-{{ $tvshow->id }}">
                                    @csrf
                                    @method('PATCH')
                                    <x-buttons.primary class="rounded-lg w-full"
                                        onclick="document.getElementById('watched-{{ $tvshow->id }}').submit();">
                                        <img src="{{ asset('vendor/blade-heroicons/s-eye.svg') }}"
                                            class="inline-block h-5 mr-1 svg-white" />
                                        <span class="mt-0.5">Mark watched</span>
                                    </x-buttons.primary>
                                </form>
                            @else
                                <x-alerts.watched>
                                    <span class="hidden lg:inline-flex">We watched this </span>
                                    <span
                                        class="inline-flex"><strong>{{ $tvshow->updated_at->diffForHumans() }}</strong></span>
                                </x-alerts.watched>
                            @endif
                            <div class="md:flex md:gap-2">

                                <x-links.edit href="/tvshow/{{ $tvshow->id }}/edit"
                                    class="!md:rounded-l-lg w-full md:w-1/2 mt-2">
                                    {{ __('Edit') }}
                                </x-links.edit>

                                <form method="POST" action="/tvshow/{{ $tvshow->id }}/delete"
                                    class="w-full md:w-1/2 mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <x-buttons.danger class="rounded-lg !md:rounded-r-lg w-full"
                                        onclick="return confirm('Are you sure you want to delete {{ $tvshow->name }}?')">
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
        {!! $tvshows->links() !!}
    </div> --}}
@else
    <p class="text-center">There are no TV shows yet. </p>

    <div class="flex flex-col items-center">
        <x-links.primary href="{{ route('addtvshow') }}" class="mb-4 !text-left !from-purple-700 !to-purple-500">
            {{ __('Add a new TV Show') }}
        </x-links.primary>

    </div>

@endif
