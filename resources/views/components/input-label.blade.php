@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-m  text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
