<x-layout>

    <aside>
        @if (session('user_not_found'))
            <x-flash type="error" :message="session('user_not_found')" />
        @elseif (session('product_not_found'))
            <x-flash type="error" :message="session('product_not_found')" />
        @endif
    </aside>

    <section>

        <h2 class="font-bold text-3xl">Products page</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 mt-8">
            @foreach ($products as $product)
                <x-products.card :product="$product" />
            @endforeach
        </div>

        <div class="my-4">
            {{ $products->links() }}
        </div>

    </section>

</x-layout>
