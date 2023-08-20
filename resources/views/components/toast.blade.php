@if (session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="w-full fixed px-4 py-2 text-white bg-green-500 bottom-3"
         x-transition
    >
        <p class="text-center font-bold">{{ session('success') }}</p>
    </div>
@endif

@if (session()->has('danger'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="w-full fixed px-4 py-2 text-white bg-red-500 bottom-3"
    >
        <p class="text-center font-bold">{{ session('danger') }}</p>
    </div>
@endif
