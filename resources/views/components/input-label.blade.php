@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-blue-4 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
