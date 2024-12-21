<form method="GET" action="/movies" class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
    @if (request('genre'))
        <input type="hidden" name="genre" value="{{ request('genre') }}">
    @endif
    <div class="relative lg:inline-flex lg:w-1/3">
        <x-inputs.text
            class="w-full" type="text" name="search" placeholder="Find something" value="{{ request('search') }}" />
    </div>
    <div class="relative lg:inline-flex lg:w-1/3">
        <x-dropdown.movies-genre />
    </div>
    <div class="relative lg:inline-flex">
        <x-buttons.primary class="w-full">
            {{ __('Search') }}
        </x-buttons.primary>
    </div>
</form>
