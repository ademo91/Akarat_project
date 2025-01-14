@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-semibold text-md dark:text-white']) }}>
    {{ $value ?? $slot }}
</label>
