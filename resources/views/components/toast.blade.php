@if (session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="fixed px-4 py-2 text-sm text-white bg-blue-500 rounded-xl bottom-3 right-3"
    >
        <p>{{ session('success') }}</p>
    </div>
@endif

@if (session()->has('danger'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="fixed px-4 py-2 text-sm text-white bg-red-500 rounded-xl bottom-3 right-3"
    >
        <p>{{ session('danger') }}</p>
    </div>
@endif
