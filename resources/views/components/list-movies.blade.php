@if ($movies->count())
<div class="flex justify-end">
    <button x-on:click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }"
        class="px-4 mb-4">Hide watched movies</button>
</div>

<table class="table w-full leading-normal table-auto" id="moviesTable">
    <thead class="table-header-group">
        <tr class="hidden md:table-row">
            <th class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50 rounded-tl-2xl min-w-"">
                        Title</th>
                    <th class="px-5 py-3 font-semibold tracking-wider text-left uppercase bg-indigo-600 border-b-2 border-gray-200 text-slate-50">
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
                {{ $movie->name }}<br>
                @if(isset($movie->image))
                <img src="{{ asset('images/movies/' . $movie->image) }}" alt="{{ $movie->name }}"
                    class="w-full rounded-xl md:w-60">
                @else
                <img src="{{ asset('images/no-photo-available.png') }}" alt="no image"
                    class="w-full rounded-xl md:w-60">
                @endif
            </td>
            <td class="px-5 py-3 border-b border-gray-200">
                <label class="text-xs font-semibold text-gray-500 uppercase md:hidden" for="">Genre</label>
                {{ $movie->genre->name }}
            </td>
            <td class="px-5 py-3 border-b border-gray-200">
                <label class="text-xs font-semibold text-gray-500 uppercase md:hidden" for="">Release year</label>
                {{ $movie->releaseyear }}
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
                <input id="{{ $movie->id }}-checkbox" type="checkbox" value=""
                    class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                    {{ $movie->watched == 1 ? 'checked' : ''}}>
                <label for="{{ $movie->id }}-checkbox" hidden="hidden">Watched</label>
            </td>
            <td class="py-3 border-b border-gray-200">

                <div class="inline-flex">
                    <x-primary-link href="/movie/{{ $movie->id }}/edit" class="rounded-none rounded-l-lg">
                        {{ __('Edit') }}
                    </x-primary-link>
                    <form method="POST" action="/movie/{{ $movie->id }}/delete">
                        @csrf
                        @method('DELETE')
                        <x-danger-button class="rounded-none rounded-r-lg">
                            {{ __('Delete') }}
                        </x-danger-button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- Pagination --}}
<div class="mt-3 d-flex justify-content-center">
    {!! $movies->links() !!}
</div>

@endif
