@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm dark:text-violet-800']) }}>
    {{ $value ?? $slot }}
</label>
