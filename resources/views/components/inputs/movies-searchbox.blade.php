<div>

    <div x-cloak x-show="searchmodalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="searchmodalIsOpen"
        x-on:keydown.esc.window="searchmodalIsOpen = false" x-on:click.self="searchmodalIsOpen = false"
        class="fixed inset-0 z-30 items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8"
        role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">

        <div x-show="searchmodalIsOpen"
            class="flex max-w-xl flex-col overflow-hidden rounded-sm border border-neutral-300 bg-white text-neutral-600">

            <div
                class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                <h3 id="searchdefaultModalTitle" class="font-semibold tracking-wide text-neutral-900 dark:text-white">Search for a Movie
                </h3>
                <button x-on:click="searchmodalIsOpen = false" aria-label="close modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor"
                        fill="none" stroke-width="1.4" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="p-4">
                <form method="GET" action="/movies" class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
                    @if (request('genre'))
                        <input type="hidden" name="genre" value="{{ request('genre') }}">
                    @endif
                    <div class="relative lg:inline-flex lg:w-1/3">
                        <x-inputs.text class="w-full" type="text" name="search" placeholder="Find something"
                            value="{{ request('search') }}" />
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
            </div>

        </div>
    </div>


</div>
