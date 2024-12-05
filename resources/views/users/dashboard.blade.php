<x-layout>

    <section class="flex flex-col items-center sm:flex-row sm:items-start gap-8 pt-8">

        <div
            class="w-1/2 sm:w-1/4 aspect-square flex justify-center items-center bg-gray-300 dark:bg-gray-950 border border-slate-500 rounded-full">
            <p>IMG_PLACEHOLDER</p>
        </div>

        <div class="flex-1">
            <h1 class="font-bold text-5xl">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h1>

            <p class="text-lg text-slate-500 mt-2">&#64;{{ auth()->user()->username }}</p>
        </div>

    </section>

    <section class="pt-12">

        <h2 class="font-bold text-3xl">Your products</h2>

        @if (session('product_creation_success'))
            <x-flash type="success" :message="session('product_creation_success')" />
        @elseif(session('product_not_found'))
            <x-flash type="error" :message="session('product_not_found')" />
        @elseif(session('product_update_success'))
            <x-flash type="success" :message="session('product_update_success')" />
        @elseif (session('product_deleted'))
            <x-flash type="success" :message="session('product_deleted')" />
        @endif

        @if ($products->isEmpty())
            <p class="mt-8">User has no products.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 mt-8">
                <x-products.create-link />

                @foreach ($products as $product)
                    <x-products.card :product="$product" type="dashboard" />
                @endforeach
            </div>

            <div class="my-4">
                {{ $products->links() }}
            </div>
        @endif

    </section>

</x-layout>
