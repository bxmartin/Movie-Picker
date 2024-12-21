<form method="GET" action="/tvshows" class="space-y-2 lg:space-y-0 lg:space-x-4 my-4">
    @if (request('genre'))
        <input type="hidden" name="genre" value="{{ request('genre') }}">
    @endif
    <div class="relative lg:inline-flex lg:w-1/3">
        <x-inputs.text
            class="w-full" type="text" name="search" placeholder="Find something" value="{{ request('search') }}" />
    </div>
    <div class="relative lg:inline-flex lg:w-1/3">
        <x-dropdown.tvshows-genre />
    </div>
    <div class="relative lg:inline-flex">
        <x-buttons.primary-alt class="w-full text-center">
            {{ __('Search') }}
        </x-buttons.primary-alt>
    </div>
</form>
