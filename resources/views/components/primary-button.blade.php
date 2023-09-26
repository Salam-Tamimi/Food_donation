<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'btn my-4', 'style' => 'background-color: #5bc1ac; color: white']) }}>
    {{ $slot }}
</button>
