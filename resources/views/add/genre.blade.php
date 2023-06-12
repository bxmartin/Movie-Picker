<x-app-layout>

    <section>
        <div class="my-8 container">

            <h2 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200 mb-4">
                {{ __('Add a genre') }}
            </h2>

            {{-- @if (session('status'))
                <div class="p-4 mb-4 text-green-700 bg-green-100 border-l-4 border-green-500">
                    {{ session('status') }}
                </div>
            @endif --}}

            <form method="POST" action="{{ route('creategenre') }}" class="w-full pb-6" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <x-input-label for="name" :value="__('Name')" class="!inline-block" required /><span
                        class="inline-block font-bold">*</span>
                    <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                        :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="flex items-center mt-3">
                    <x-primary-button class="">
                        {{ __('Add new genre') }}
                    </x-primary-button>
                </div>

            </form>

            <p>
                <x-secondary-link class="" :href="route('genres')">
                    {{ __('Go back to genre list') }}
                </x-secondary-link>
            </p>

        </div>

    </section>

    </x-layout>
