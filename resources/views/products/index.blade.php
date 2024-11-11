<x-layout>

    <h2>products page</h2>

    @foreach ($products as $product)
        <h3>{{ $product->name }}</h3>
    @endforeach
    
</x-layout>