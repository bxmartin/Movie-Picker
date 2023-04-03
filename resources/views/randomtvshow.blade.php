<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('You have picked a tv show!') }}
        </h2>
    </x-slot>

    <section>
        <div class="grid col-span-12 gap-4 px-10 pt-6 my-8 text-center md:col-span-6 lg:col-span-4 md:order-1 xl:gap-6">

            <p class="text-2xl">Tonight you're watching: </p>

            @if(isset($tvshow->image))
            <img src="{{ asset('images/tvshows/' . $tvshow->image) }}" alt="" class="w-1/2 mx-auto rounded-lg">
            @endif

            <h3 class="text-4xl font-bold">{{ $tvshow->name }}</h3>

            <p class="mb-2">Released: {{ $tvshow->releaseyear }}</p>

            <p class="mb-2">Genre: {{ $tvshow->genre->name }}</p>

            <p class="mb-2">
                @if($tvshow->effort =='Easy')
                <x-heroicon-o-face-smile class="inline-block w-auto h-8 text-green-500" />
                @elseif($tvshow->effort =='Medium')
                <x-heroicon-o-face-smile class="inline-block w-auto h-8 text-orange-500" />
                @elseif($tvshow->effort =='Hard')
                <x-heroicon-o-face-smile class="inline-block w-auto h-8 text-red-500" />
                @endif
            </p>



        </div>
    </section>

</x-app-layout>
