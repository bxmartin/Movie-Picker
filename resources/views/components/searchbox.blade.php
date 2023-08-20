<form method="GET" action="#">

    <x-text-input class="mt-1" type="text" name="search" placeholder="Find something"
        value="{{ request('search') }}" />

    <x-primary-button class="my-4 !text-left">
        {{ __('Search') }}
    </x-primary-button>

</form>
