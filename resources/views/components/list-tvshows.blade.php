@if ($tvshows->count())

    <div x-data="{ show: false }">
        <div class="flex justify-end">
            <x-secondary-button class="rounded-lg" @click="show = ! show"
                x-text="show ? 'Hide watched shows' : 'Include watched shows'">
                Include watched shows
            </x-secondary-button>
        </div>

        <div class="" id="tvshowsTable">
            {{-- <div class="table-header-group">
                <div class="hidden md:table-row">
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
                        class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50 rounded-tr-2xl">
                        Actions</th>
                </div>
            </div> --}}
            <div class="text-gray-700 grid grid-cols-2 gap-y-2">
                @foreach ($tvshows as $tvshow)
                    <div class="p-1 md:p-3" x-show.transition.in="{{ $tvshow->watched == 1 ? 'show' : '' }}">
                        <div class="px-md-5 py-3 mt-auto font-bold text-center">
                            {{-- <label class="text-xs font-semibold text-gray-500 uppercase"
                                for="">Name</label> --}}
                            {{ $tvshow->name }}<br>

                            @if (isset($tvshow->image))
                                <img src="{{ asset('images/tvshows/' . $tvshow->image) }}" alt="{{ $tvshow->name }}"
                                    class="w-full rounded-xl md:w-60 m-auto">
                            @else
                                <img src="{{ asset('images/tvshow-no-photo-available.png') }}" alt="no image"
                                    class="w-full rounded-xl md:w-60 m-auto">
                            @endif
                        </div>
                        <div class="p-3 hidden md:block">
                            <label class="text-xs font-semibold text-gray-500 uppercase" for="">Genre</label>
                            @props(['genre'])
                            {{ $tvshow->genre->name }}
                        </div>
                        <div class="p-3 hidden md:block">
                            <label class="text-xs font-semibold text-gray-500 uppercase" for="">Release
                                year</label>
                            {{ $tvshow->releaseyear }}
                        </div>
                        <div class="p-3 hidden md:block">
                            <label class="text-xs font-semibold text-gray-500 uppercase" for="">Length</label>
                            @if (isset($tvshow->seasons))
                                @if ($tvshow->seasons == 1)
                                    {{ $tvshow->seasons }} season <br>
                                @else
                                    {{ $tvshow->seasons }} seasons <br>
                                @endif
                            @endif
                            @if (isset($tvshow->episodes))
                                {{ $tvshow->episodes }} episodes
                            @endif
                        </div>
                        <div class="px-3">
                            <label class="text-xs font-semibold text-gray-500 uppercase" for="">Effort</label>
                            @if ($tvshow->effort == 'Easy')
                            <img src="{{ asset('vendor/blade-heroicons/o-face-smile.svg') }}" class="inline-block w-auto h-8 svg-green" />
                            @elseif($tvshow->effort == 'Medium')
                            <img src="{{ asset('vendor/blade-heroicons/o-face-smile.svg') }}" class="inline-block w-auto h-8 svg-orange" />
                            @elseif($tvshow->effort == 'Hard')
                            <img src="{{ asset('vendor/blade-heroicons/o-face-smile.svg') }}" class="inline-block w-auto h-8 svg-red" />
                            @endif
                        </div>
                        <div class="p-3 hidden md:block">
                            <label class="text-xs font-semibold text-gray-500 uppercase" for="">Rating</label>
                            @if (is_null($tvshow->rating))
                                No rating yet!
                            @else
                                {{ $tvshow->rating }}/10
                            @endif
                        </div>

                        <div class="py-3">
                            @if ($tvshow->watched == 0)
                                <form method="POST" action="/tvshow/{{ $tvshow->id }}/watched"
                                    id="watched-{{ $tvshow->id }}">
                                    @csrf
                                    @method('PATCH')
                                    <x-primary-button class="rounded-lg w-full"
                                        onclick="document.getElementById('watched-{{ $tvshow->id }}').submit();">
                                        Mark watched
                                    </x-primary-button>
                                </form>
                            @endif

                            <x-primary-link href="/tvshow/{{ $tvshow->id }}/edit" class="rounded-lg w-full">
                                {{ __('Edit') }}
                            </x-primary-link>

                            <form method="POST" action="/tvshow/{{ $tvshow->id }}/delete">
                                @csrf
                                @method('DELETE')
                                <x-danger-button class="rounded-lg w-full" onclick="return confirm('Are you sure?')">
                                    {{ __('Delete') }}
                                </x-danger-button>
                            </form>
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
        <x-primary-link href="{{ route('addtvshow') }}" class="mb-4 !text-left !from-purple-700 !to-purple-500">
            {{ __('Add a new TV Show') }}
        </x-primary-link>

    </div>

@endif
