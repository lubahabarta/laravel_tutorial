<x-layout>

    <section class="flex flex-col items-center sm:flex-row sm:items-start gap-8 pt-8">

        <div
            class="relative w-1/2 sm:w-1/4 aspect-square flex justify-center items-center bg-gray-300 dark:bg-gray-950 border border-slate-500 rounded-full overflow-hidden">
            @if ($user->avatar)
                <img src="{{ asset('images/' . $user->avatar) }}" alt="avatar" class="w-full h-full object-cover object-center" />
            @else
                <p>IMG_PLACEHOLDER</p>
            @endif
        </div>

        <div class="flex-1">
            <h1 class="font-bold text-5xl">{{ $user->first_name }} {{ $user->last_name }}</h1>

            <p class="text-lg text-slate-500 mt-2">&#64;{{ $user->username }}</p>
        </div>

    </section>

    <section class="pt-12">

        <h2 class="font-bold text-3xl">User's products</h2>

        @if ($userProducts->isEmpty())
            <p class="mt-8">User has no products.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 mt-8">
                @foreach ($userProducts as $product)
                    <x-products.card :product="$product" />
                @endforeach
            </div>

            <div class="my-4">
                {{ $userProducts->links() }}
            </div>
        @endif

    </section>

</x-layout>
