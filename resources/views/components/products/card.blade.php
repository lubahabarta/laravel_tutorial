@props(['product', 'type' => 'default'])

<article class="flex flex-col gap-4 bg-gray-300 dark:bg-gray-900 border border-slate-500 rounded-xl p-4">

    @if ($type === 'default')
        <section class="flex flex-row items-center gap-2">
            <figure class="w-10 h-10 border border-slate-500 rounded-full"></figure>
            <a href="{{ route('users.show', $product->user->username) }}"
                class="flex-1 text-slate-500">&#64;{{ $product->user->username }}</a>
        </section>
    @endif

    @if ($type === 'dashboard')
        <section class="flex items-center justify-end gap-2">
            <a href="{{ route('products.edit', $product->slug) }}"
                class="w-6 h-6 flex items-center justify-center bg-blue-500 rounded">
                <svg viewBox="0 0 16 16" fill="none" class="w-4 h-4">
                    <path d="M13 0L16 3L9 10H6V7L13 0Z" fill="#fff"></path>
                    <path d="M1 1V15H15V9H13V13H3V3H7V1H1Z" fill="#fff"></path>
                </svg>
            </a>

            <form action="{{ route('products.destroy', $product) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-6 h-6 flex items-center justify-center bg-red-500 rounded">
                    <svg viewBox="0 0 25 25" class="w-3 h-3">
                        <path
                            d="M487.148,1053.48 L492.813,1047.82 C494.376,1046.26 494.376,1043.72 492.813,1042.16 C491.248,1040.59 488.712,1040.59 487.148,1042.16 L481.484,1047.82 L475.82,1042.16 C474.257,1040.59 471.721,1040.59 470.156,1042.16 C468.593,1043.72 468.593,1046.26 470.156,1047.82 L475.82,1053.48 L470.156,1059.15 C468.593,1060.71 468.593,1063.25 470.156,1064.81 C471.721,1066.38 474.257,1066.38 475.82,1064.81 L481.484,1059.15 L487.148,1064.81 C488.712,1066.38 491.248,1066.38 492.813,1064.81 C494.376,1063.25 494.376,1060.71 492.813,1059.15 L487.148,1053.48"
                            fill="#fff" transform="translate(-469.000000, -1041.000000)"></path>
                    </svg>
                </button>
            </form>
        </section>
    @endif

    <section class="flex-1">
        <a href="{{ route('products.show', $product->slug) }}"
            class="w-full aspect-square flex justify-center items-center bg-gray-300 dark:bg-gray-950 border border-slate-500 overflow-hidden rounded">
            @if ($product->image)
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                    class="w-full h-full object-cover">
            @else
                <p>IMG_PLACEHOLDER</p>
            @endif
        </a>
        <a href="{{ route('products.show', $product->slug) }}" class="hover:underline">
            <h3 class="font-bold text-lg mt-4">{{ $product->name }}</h3>
        </a>

        <p class="mt-2">{{ Str::words($product->description, 20) }}</p>
    </section>

    <section class="flex flex-col">
        <p class="self-end font-bold">{{ Number::currency($product->price / 100, 'CZK', 'cs') }}</p>
        <p class="self-end text-slate-500">{{ Number::format($product->count, locale: 'cs') }} ks</p>

        @if ($type === 'default')
            @auth
                @if (auth()->user()->id !== $product->user_id)
                    <button class="bg-green-500 text-slate-500 rounded-lg px-4 py-2 mt-2">
                        Add to cart
                    </button>
                @else
                    <p class="inline-flex justify-center text-slate-500 px-4 py-2 mt-2">This is your product</p>
                @endif
            @endauth
        @endif
    </section>

</article>
</a>
