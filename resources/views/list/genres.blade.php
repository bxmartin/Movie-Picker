<x-app-layout>

    <section>
        <div class="my-8  px-2 container">

            <h2 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Genres') }}
            </h2>

            @if (session('status'))
                <div class="px-5">
                    <div class="p-4 text-green-700 bg-green-100 border-l-4 border-green-500">
                        {{ session('status') }}
                    </div>
                </div>
            @endif

            <div class="flex justify-end">
                <x-links.primary href="/addgenre" class="rounded-lg">
                    <x-heroicon-o-plus class="inline-block h-8 mr-2" />
                    {{ __('Add genre') }}
                </x-links.primary>
            </div>

            <ul class="w-96">
                @foreach ($genres as $genre)
                    <li class="w-full border-b-2 border-neutral-100 border-opacity-100 py-4 dark:border-opacity-50">
                        {{ $genre->name }}
                        <div class="inline-flex">
                            <x-links.primary href="/genre/{{ $genre->id }}/edit" class="mx-2">
                                {{ __('Edit') }}
                            </x-links.primary>
                            <form method="POST" action="/genre/{{ $genre->id }}/delete">
                                @csrf
                                @method('DELETE')
                                <x-buttons.danger class="" onclick="return confirm('Are you sure?')">
                                    {{ __('Delete') }}
                                </x-buttons.danger>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>

        </div>

    </section>

</x-app-layout>
