@if ($tvshows->count())

    <div x-data="{ show: false }">
        <div class="flex justify-end">
            <button class="px-4 mb-4" @click="show = ! show"
                x-text="show ? 'Hide watched shows' : 'Include watched shows'">
                Include watched shows
            </button>
        </div>

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
                        class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50 rounded-tr-2xl">
                        Actions</th>
                </tr>
            </thead>
            <tbody class="flex-1 text-gray-700 sm:flex-none">
                @foreach ($tvshows as $tvshow)
                    <tr class="flex flex-col flex-wrap w-full p-1 border-t first:border-t-0 md:p-3 md:table-row odd:bg-slate-50 even:bg-slate-100"
                        x-show.transition.in="{{ $tvshow->watched == 1 ? 'show' : '' }}">
                        <td class="px-5 py-3 font-bold border-b border-gray-200">
                            <label class="text-xs font-semibold text-gray-500 uppercase md:hidden"
                                for="">Name</label>
                            {{ $tvshow->name }}<br>

                            @if (isset($tvshow->image))
                                <img src="{{ asset('images/tvshows/' . $tvshow->image) }}" alt="{{ $tvshow->name }}"
                                    class="w-full rounded-xl md:w-60">
                            @else
                                <img src="{{ asset('images/tvshow-no-photo-available.png') }}" alt="no image"
                                    class="w-full rounded-xl md:w-60">
                            @endif
                        </td>
                        <td class="px-5 py-3 border-b border-gray-200">
                            <label class="text-xs font-semibold text-gray-500 uppercase md:hidden"
                                for="">Genre</label>
                            @props(['genre'])
                            {{ $tvshow->genre->name }}
                        </td>
                        <td class="px-5 py-3 border-b border-gray-200">
                            <label class="text-xs font-semibold text-gray-500 uppercase md:hidden"
                                for="">Release
                                year</label>
                            {{ $tvshow->releaseyear }}
                        </td>
                        <td class="px-5 py-3 border-b border-gray-200">
                            <label class="text-xs font-semibold text-gray-500 uppercase md:hidden"
                                for="">Length</label>
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
                        </td>
                        <td class="px-5 py-3 border-b border-gray-200">
                            <label class="text-xs font-semibold text-gray-500 uppercase md:hidden"
                                for="">Effort</label>
                            @if ($tvshow->effort == 'Easy')
                                <x-heroicon-o-face-smile class="block w-auto h-8 text-green-500" />
                            @elseif($tvshow->effort == 'Medium')
                                <x-heroicon-o-face-smile class="block w-auto h-8 text-orange-500" />
                            @elseif($tvshow->effort == 'Hard')
                                <x-heroicon-o-face-smile class="block w-auto h-8 text-red-500" />
                            @endif
                        </td>
                        <td class="px-5 py-3 border-b border-gray-200">
                            <label class="text-xs font-semibold text-gray-500 uppercase md:hidden"
                                for="">Rating</label>
                            @if (is_null($tvshow->rating))
                                No rating yet!
                            @else
                                {{ $tvshow->rating }}/10
                            @endif
                        </td>

                        <td class="px-5 py-3 border-b border-gray-200">
                            @if ($tvshow->watched == 0)
                                <form method="POST" action="/tvshow/{{ $tvshow->id }}/watched"
                                    id="watched-{{ $tvshow->id }}">
                                    @csrf
                                    @method('PATCH')
                                    <x-primary-button class="rounded-lg"
                                        onclick="document.getElementById('watched-{{ $tvshow->id }}').submit();">
                                        <x-heroicon-o-eye class="inline-block w-8 h-8" />
                                        Mark watched
                                    </x-primary-button>
                                </form>
                            @endif
                            <div class="inline-flex">
                                <x-primary-link href="/tvshow/{{ $tvshow->id }}/edit"
                                    class="rounded-none rounded-l-lg">
                                    {{ __('Edit') }}
                                </x-primary-link>
                                <form method="POST" action="/tvshow/{{ $tvshow->id }}/delete">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button class="rounded-none rounded-r-lg"
                                        onclick="return confirm('Are you sure?')">
                                        {{ __('Delete') }}
                                    </x-danger-button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-3 d-flex justify-content-center">
        {!! $tvshows->links() !!}
    </div>
@else
    <p class="text-center">There are no TV shows yet. </p>

    <div class="flex flex-col items-center">
        <x-primary-link href="{{ route('addtvshow') }}" class="mb-4 !text-left !from-purple-700 !to-purple-500">
            {{ __('Add a new TV Show') }}
        </x-primary-link>

    </div>

@endif
