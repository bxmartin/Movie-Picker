@props(['trigger'])

<div x-data="{ show: false }" @click.away="show = false">
    {{-- Trigger --}}
    <div @click="show = ! show">
        {{ $trigger }}
    </div>

    {{-- Links --}}
    <div x-show="show" class="py-2 absolute bg-slate-100 rounded-b-xl w-full z-50 overflow-auto max-h-52" style="display: none">
        {{ $slot }}
    </div>
</div>

<select
    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
    required>
    {{ $slot }}

</select>
