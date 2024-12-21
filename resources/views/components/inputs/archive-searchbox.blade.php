<form method="GET" action="/archive/movies">
    @if (request('genre'))
        <input type="hidden" name="genre" value="{{ request('genre') }}">
    @endif

    <x-inputs.text class="mt-1 w-full bg-gray-100 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" type="text" name="search" placeholder="Find something"
        value="{{ request('search') }}" />

    {{-- <x-buttons.primary class="my-4 !text-left">
        {{ __('Search') }}
    </x-buttons.primary> --}}

</form>
