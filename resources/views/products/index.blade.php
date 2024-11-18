<x-layout>

    <h2 class="font-bold text-3xl">Products page</h2>

    <div class="grid grid-cols-fluid gap-2 mt-4">
        @foreach ($products as $product)
            <div class="flex flex-col justify-between border rounded-lg p-4">

                <div>
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full aspect-square object-cover rounded">
                    <h3 class="font-bold text-lg mt-4">{{ $product->name }}</h3>
                    <p class="mt-2">{{ Str::words($product->description, 20) }}</p>
                </div>

                <div class="flex flex-col">
                    <p class="self-end font-bold mt-4">{{ Number::currency($product->price / 100, 'CZK', 'cs') }}</p>
                    <p class="self-end text-slate-700">{{ Number::format($product->count, locale: 'cs') }} ks</p>
                    @auth
                        <button
                            class="justify-self-end inline-flex items-center justify-center overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 p-1 mt-4">
                            <span
                                class="flex-1 px-5 py-3 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
                                Přidat do košíku
                            </span>
                        </button>
                    @endauth
                </div>

            </div>
        @endforeach
    </div>

    <div class="my-4">
        {{ $products->links() }}
    </div>

</x-layout>
