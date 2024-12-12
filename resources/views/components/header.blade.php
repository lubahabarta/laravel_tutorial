<header class="fixed top-0 left-0 w-full">
    <nav class="flex justify-center bg-black bg-opacity-10 backdrop-blur-md border-b border-white border-opacity-5 px-4">
        <div class="h-14 w-full max-w-screen-lg flex items-center justify-between">

            <ul class="flex items-center gap-4">
                <li><a href="{{ route('products.index') }}">products</a></li>
            </ul>

            <ul class="flex items-center gap-4">

                <li>
                    <x-avatar />
                </li>

            </ul>
        </div>

    </nav>
</header>
