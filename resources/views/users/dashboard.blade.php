<x-layout>

    <aside>
        @if (session('deposit_error'))
            <x-flash type="error" :message="session('deposit_error')" />
        @elseif (session('deposit_success'))
            <x-flash type="success" :message="session('deposit_success')" />
        @elseif (session('product_creation_success'))
            <x-flash type="success" :message="session('product_creation_success')" />
        @elseif(session('product_not_found'))
            <x-flash type="error" :message="session('product_not_found')" />
        @elseif(session('product_update_success'))
            <x-flash type="success" :message="session('product_update_success')" />
        @elseif (session('product_deleted'))
            <x-flash type="success" :message="session('product_deleted')" />
        @elseif (session('avatar_upload_success'))
            <x-flash type="success" :message="session('avatar_upload_success')" />
        @endif
    </aside>

    <section class="flex flex-col items-center sm:flex-row sm:items-start gap-8 pt-8">

        <div
            class="relative w-1/2 sm:w-1/4 aspect-square flex justify-center items-center bg-gray-300 dark:bg-gray-950 border border-slate-500 rounded-full overflow-hidden">
            @if (auth()->user()->avatar)
                <img src="{{ asset('images/' . auth()->user()->avatar) }}" alt="avatar"
                    class="w-full h-full object-cover object-center" />
            @else
                <p>IMG_PLACEHOLDER</p>
            @endif

            <a href="{{ route('avatar') }}" class="text-xl text-slate-950 duration-200">
                <div role="presentation" aria-hidden="true"
                    class="group absolute inset-0 flex justify-center items-center bg-slate-500 bg-opacity-0 hover:bg-opacity-50 duration-200">
                    <p class="opacity-0 group-hover:opacity-100 duration-200">Change avatar</p>
                </div>
            </a>
        </div>

        <div class="w-full sm:flex-1">
            <h1 class="font-bold text-5xl">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h1>

            <p class="text-lg text-slate-500 mt-2">&#64;{{ auth()->user()->username }}</p>

            <a href="{{ route('deposit') }}" class="inline-block bg-green-500 rounded-lg px-4 py-2 mt-2">Add credit</a>
        </div>

    </section>

    <section class="pt-12">

        <h2 class="font-bold text-3xl">Your products</h2>

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
