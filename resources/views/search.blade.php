<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Movie Picker') }}
        </h2>
    </x-slot> --}}

    <div class="justify-center my-1">
        <div class="">

            <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">

                <div class="relative lg:inline-flex">
                    <form method="GET" action="{{ route('index') }}">
                        @if (request('genre'))
                            <input type="hidden" name="genre" value="{{ request('genre') }}">
                        @endif
                        <x-inputs.text
                            class="mt-1 w-full bg-slate-100 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            type="text" name="search" placeholder="Find something"
                            value="{{ request('search') }}" />
                    </form>
                </div>
                <div class="relative lg:inline-flex">
                    <x-dropdown.movies-genre />
                </div>
                <div class="relative lg:inline-flex">
                    <x-buttons.primary class="!text-left">
                        {{ __('Search') }}
                    </x-buttons.primary>
                </div>

            </div>


            @forelse($movies as $movie)
                <li class="list-group-item">{{ $movie->name }}</li>
            @empty
                <x-no-results />
            @endforelse

        </div>
        <x-scroll-to-top />

</x-app-layout>

<script src="/scripts/scroll-to-top.js"></script>
