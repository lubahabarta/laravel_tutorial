<header class="fixed top-0 left-0 w-full">
    <nav class="flex justify-center bg-black bg-opacity-10 backdrop-blur-md border-b border-white border-opacity-5 px-4">
        <div class="h-14 w-full max-w-screen-lg flex items-center justify-between">

            <ul class="flex items-center gap-4">
                <li><a href="{{ route('products.index') }}">products</a></li>
            </ul>

            <ul class="flex items-center gap-4">

                @guest
                    <li><a href="{{ route('login') }}">login</a></li>
                    <li><a href="{{ route('register') }}">register</a></li>
                @endguest

                @auth
                    <li><a href="{{ route('dashboard') }}">{{ auth()->user()->first_name }}
                            {{ auth()->user()->last_name }}</a>
                    <li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit">logout</button>
                        </form>
                    </li>
                @endauth

            </ul>
        </div>

    </nav>
</header>
