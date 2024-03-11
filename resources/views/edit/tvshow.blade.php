<x-app-layout>

    <section>
        <div
            class="my-8 px-2 container">

            <h2 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200 text-center">
                {{ __('Edit a TV show') }}
            </h2>

            @if(session('status'))
            <div class="px-5">
                <div class="p-4 text-green-700 bg-green-100 border-l-4 border-green-500">
                    {{ session('status') }}
                </div>
            </div>
            @endif

            <form method="POST" action="/tvshow/{{ $tvshow->id }}/update" class="w-full pb-6"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <x-inputs.label for="name" :value="__('Name')" class="!inline-block" required /><span class="inline-block font-bold">*</span>
                    <x-inputs.text id="name" class="block w-full mt-1" type="text" name="name"
                        :value="old('name', $tvshow->name)" required autofocus />
                    <x-inputs.error :messages="$errors->get('name', $tvshow->name)" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-inputs.label for="image" :value="__('Image')" class="!inline-block" required /><span class="inline-block font-bold">*</span>
                    @if(isset($tvshow->image))
                    <img src="{{ asset('images/tvshows/' . $tvshow->image) }}" alt="" class="w-full rounded-lg md:w-80">
                    @endif
                    <input class="block w-full mt-1" id="image" type="file" name="image" />
                    <x-inputs.error :messages="$errors->get('image')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-inputs.label for="genre" :value="__('Genre')" class="!inline-block" required /><span class="inline-block font-bold">*</span>
                    <select id="genre_id" name="genre_id"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                        required>

                        @foreach (\App\Models\Genre::all()->sortBy('name') as $genre)
                        <option value="{{ $genre->id }}" {{ old('genre_id', $tvshow->genre_id) == $genre->id ?
                            'selected' : '' }}
                            >{{ ucwords($genre->name) }}</option>
                        @endforeach
                    </select>
                    <p>
                        <x-links.secondary :href="route('addgenre')" class="mt-3" target="_blank">
                            {{ __('Add a new genre') }}
                        </x-links.secondary>
                    </p>
                    <x-inputs.error :messages="$errors->get('genre', $tvshow->genre)" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-inputs.label for="releaseyear" :value="__('Release Year')" class="!inline-block" />
                    <x-inputs.text id="releaseyear" class="block w-auto mt-1" type="number" name="releaseyear"
                        :value="old('releaseyear', $tvshow->releaseyear)"/>
                    <x-inputs.error :messages="$errors->get('releaseyear')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-inputs.label for="seasons" :value="__('Seasons')" class="!inline-block" />
                    <x-inputs.text id="seasons" class="block w-auto mt-1" type="number" name="seasons"
                        :value="old('seasons', $tvshow->seasons)" min="0" />
                    <x-inputs.error :messages="$errors->get('seasons')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-inputs.label for="episodes" :value="__('Episodes')" class="!inline-block" />
                    <x-inputs.text id="episodes" class="block w-auto mt-1" type="number" name="episodes"
                        :value="old('episodes', $tvshow->episodes)" min="0" />
                    <x-inputs.error :messages="$errors->get('episodes')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-inputs.label for="effort" :value="__('Effort')" class="!inline-block" required /><span class="inline-block font-bold">*</span>
                    <select id="effort"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                        type="text" name="effort" required>
                        <option value="Easy" @if (old('effort', $tvshow->effort) == "Easy") {{ 'selected' }} @endif>Easy</option>
                        <option value="Medium" @if (old('effort', $tvshow->effort) == "Medium") {{ 'selected' }} @endif>Medium</option>
                        <option value="Hard" @if (old('effort', $tvshow->effort) == "Hard") {{ 'selected' }} @endif>Hard</option>
                    </select>
                    <x-inputs.error :messages="$errors->get('effort')" class="mt-2" />
                </div>
                <div class="flex items-center mb-4">
                    <input type="hidden" name="watched" value="0" />
                    <input type="checkbox" name="watched" value="1" @if (isset($tvshow)) @if ($tvshow->watched == 1) checked @endif @endif />
                    <x-inputs.label for="watched" :value="__('Watched')"
                        class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" />
                    <x-inputs.error :messages="$errors->get('watched')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-inputs.label for="rating" :value="__('Rating')" />
                    <x-inputs.text id="rating" class="block w-auto mt-1" type="number" name="rating"
                        :value="old('rating', $tvshow->rating)" />
                    <x-inputs.error :messages="$errors->get('rating')" class="mt-2" />
                </div>

                <div class="flex items-center mt-3">
                    <x-buttons.primary class="">
                        {{ __('Save') }}
                    </x-buttons.primary>
                </div>

            </form>

        </div>

    </section>

</x-app-layout>
