<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('index') }}">
                        <x-application-logo class="block w-auto h-9" alt="Movie Picker" title="Movie Picker" />
                    </a>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -mr-2">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-slate-100">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-links.nav-responsive :href="route('index')" :active="request()->routeIs('index')">
                {{ __('Home') }}
            </x-links.nav-responsive>
            <x-links.nav-responsive :href="route('movies')" :active="request()->routeIs('movies')">
                <img src="{{ asset('vendor/blade-heroicons/o-film.svg') }}" class="inline-block h-4 mr-1 svg-black" />
                {{ __('Movies') }}
            </x-links.nav-responsive>
            <x-links.nav-responsive :href="route('tvshows')" :active="request()->routeIs('tvshows')">
                <img src="{{ asset('vendor/blade-heroicons/o-play.svg') }}" class="inline-block h-4 mr-1 svg-black" />
                {{ __('TV Shows') }}
            </x-links.nav-responsive>
            <hr />
            <x-links.nav-responsive :href="route('addmovie')" :active="request()->routeIs('addmovie')">
                <img src="{{ asset('vendor/blade-heroicons/o-plus.svg') }}" class="inline-block h-4 mr-1 svg-black" />
                {{ __('Add a Movie') }}
            </x-links.nav-responsive>
            <x-links.nav-responsive :href="route('addtvshow')" :active="request()->routeIs('addtvshow')">
                <img src="{{ asset('vendor/blade-heroicons/o-plus.svg') }}" class="inline-block h-4 mr-1 svg-black" />
                {{ __('Add a TV Show') }}
            </x-links.nav-responsive>
            <x-links.nav-responsive :href="route('addgenre')" :active="request()->routeIs('addgenre')">
                <img src="{{ asset('vendor/blade-heroicons/o-plus.svg') }}" class="inline-block h-4 mr-1 svg-black" />
                {{ __('Add a Genre') }}
            </x-links.nav-responsive>
            <hr />
            <x-links.nav-responsive :href="route('genres')" :active="request()->routeIs('genres')">
                {{ __('View all Genres') }}
            </x-links.nav-responsive>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-links.nav-responsive :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                    {{ __('Profile') }}
                </x-links.nav-responsive>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-links.nav-responsive :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-links.nav-responsive>
                </form>
            </div>
        </div>
    </div>
</nav>
