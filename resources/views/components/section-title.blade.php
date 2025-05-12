<div {{ $attributes->merge(['class' => 'text-center mb-12']) }}>
    <h2 class="text-3xl font-bold text-gray-800 playfair">{{ $slot }}</h2>
    <div class="h-1 w-24 bg-amber-600 mx-auto mt-4"></div>
    @isset($subtitle)
        <p class="mt-4 text-gray-600 max-w-2xl mx-auto">{{ $subtitle }}</p>
    @endisset
</div>
