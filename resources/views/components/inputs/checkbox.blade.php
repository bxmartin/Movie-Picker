@props(['disabled' => false])

<input type="checkbox" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-4 h-4 text-blue-600 bg-slate-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2']) !!}>
