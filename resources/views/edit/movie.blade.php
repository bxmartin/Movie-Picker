<x-app-layout>

    <section>
        <div class="container px-2 my-8">

            <h2 class="text-2xl font-semibold leading-tight text-center text-gray-800">
                {{ __('Edit a movie') }}
            </h2>

            @if (session('status'))
                <div class="px-5">
                    <div class="p-4 text-green-700 bg-green-100 border-l-4 border-green-500">
                        {{ session('status') }}
                    </div>
                </div>
            @endif

            <form method="POST" action="/movie/{{ $movie->id }}/update" class="w-full pb-6"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <x-inputs.label for="name" :value="__('Name')" class="!inline-block" required /><span
                        class="inline-block font-bold">*</span>
                    <x-inputs.text id="name" class="block w-full mt-1" type="text" name="name"
                        :value="old('name', $movie->name)" required />
                    <x-inputs.error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-inputs.label for="image" :value="__('Image')" />
                    @if (isset($movie->image))
                        <img src="{{ asset('images/movies/' . $movie->image) }}" alt=""
                            class="w-full rounded-lg md:w-80">
                    @else
                        <img src="{{ asset('images/movie-no-photo-available.png' . $movie->image) }}" alt=""
                            class="w-full rounded-lg md:w-80">
                    @endif
                    <input class="block w-full mt-1" id="image" type="file" name="image" />
                    <x-inputs.error :messages="$errors->get('image')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-inputs.label for="genre" :value="__('Genre')" class="!inline-block" /><span
                        class="inline-block font-bold">*</span>
                    <select id="genre_id" name="genre_id"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        required>

                        @foreach (\App\Models\Genre::all()->sortBy('name') as $genre)
                            <option value="{{ $genre->id }}"
                                {{ old('genre_id', $movie->genre_id) == $genre->id ? 'selected' : '' }}>
                                {{ ucwords($genre->name) }}</option>
                        @endforeach
                    </select>
                    <p>
                        <x-links.secondary :href="route('addgenre')" class="mt-3" target="_blank">
                            {{ __('Add a new genre') }}
                        </x-links.secondary>
                    </p>
                    <x-inputs.error :messages="$errors->get('genre', $movie->genre)" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-inputs.label for="releaseyear" :value="__('Release Year')" class="!inline-block" />
                    <x-inputs.text id="releaseyear" class="block w-auto mt-1" type="number" name="releaseyear"
                        :value="old('releaseyear', $movie->releaseyear)" />
                    <x-inputs.error :messages="$errors->get('releaseyear')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-inputs.label for="runtime" :value="__('Runtime')" class="!inline-block" />
                    <x-inputs.text id="runtime" class="block w-auto mt-1" type="number" name="runtime"
                        :value="old('runtime', $movie->runtime)" />
                    <x-inputs.error :messages="$errors->get('runtime')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-inputs.label for="effort" :value="__('Effort')" class="!inline-block" required /><span
                        class="inline-block font-bold">*</span>
                    <select id="effort"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        type="text" name="effort" required>
                        <option value="Easy" @if (old('effort', $movie->effort) == 'Easy') {{ 'selected' }} @endif>Easy
                        </option>
                        <option value="Medium" @if (old('effort', $movie->effort) == 'Medium') {{ 'selected' }} @endif>Medium
                        </option>
                        <option value="Hard" @if (old('effort', $movie->effort) == 'Hard') {{ 'selected' }} @endif>Hard
                        </option>
                    </select>
                    <x-inputs.error :messages="$errors->get('effort')" class="mt-2" />
                </div>
                <div class="flex items-center mb-4">
                    <input type="hidden" name="watched" value="0" />
                    <input type="checkbox" name="watched" value="1"
                        @if (isset($movie)) @if ($movie->watched == 1) checked @endif @endif />
                    <x-inputs.label for="watched" :value="__('Watched')"
                        class="w-full py-4 ml-2 text-sm font-medium text-gray-900" />
                    <x-inputs.error :messages="$errors->get('watched')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-inputs.label for="rating" :value="__('Rating')" />
                    <x-inputs.text id="rating" class="block w-auto mt-1" type="number" name="rating"
                        :value="old('rating', $movie->rating)" />
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
