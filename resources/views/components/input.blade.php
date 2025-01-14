@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'dark:bg-slate-600 dark:text-white border-slate-700 focus:border-blue-500 focus:ring-indigo-500 rounded-lg shadow-sm p-3 text-md']) !!}>
