<x-layout>

    {{-- TODO: style this page --}}

    <section>
        <h1>{{ $product->name }}</hproduct1>
        <p>{{ $product->description }}</p>
        <p>{{ $product->price }}</p>
        <p>{{ $product->created_at }}</p>
    </section>
    
</x-layout>