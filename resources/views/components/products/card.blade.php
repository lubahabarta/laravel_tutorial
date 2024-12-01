@props(['product', 'type' => 'default'])

<article class="flex flex-col gap-2 bg-gray-300 dark:bg-gray-900 border border-slate-500 rounded-xl p-4">

    @if ($type === 'default')
        <aside class="flex flex-row items-center gap-2">
            <figure class="w-10 h-10 border border-slate-500 rounded-full"></figure>
            <a href="{{ route('users.show', $product->user->username) }}"
                class="flex-1 text-slate-500">&#64;{{ $product->user->username }}</a>
        </aside>
    @endif

    <section class="flex-1">
        {{-- <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full aspect-square object-cover rounded"> --}}
        <a href="{{route('products.show', $product->slug)}}"
            class="w-full aspect-square flex justify-center items-center bg-gray-300 dark:bg-gray-950 border border-slate-500 rounded">
            <p>IMG_PLACEHOLDER</p>
        </a>
        <h3 class="font-bold text-lg mt-4">{{ $product->name }}</h3>
        <p class="mt-2">{{ Str::words($product->description, 20) }}</p>
    </section>

    <section class="flex flex-col">
        <p class="self-end font-bold mt-4">{{ Number::currency($product->price / 100, 'CZK', 'cs') }}</p>
        <p class="self-end text-slate-500">{{ Number::format($product->count, locale: 'cs') }} ks</p>

        @if ($type === 'default')
            @auth
                @if (auth()->user()->id !== $product->user_id)
                    <button class="bg-green-500 rounded-lg px-4 py-2 mt-2">
                        Add to cart
                    </button>
                @else
                    <p class="inline-flex justify-center px-5 py-4 text-slate-500">This is your product</p>
                @endif
            @endauth
        @endif

    </section>

</article>
</a>
