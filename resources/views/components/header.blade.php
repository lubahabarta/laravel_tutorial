<header class="fixed top-0 left-0 w-full">
    <nav class="h-14 flex items-center justify-between bg-black bg-opacity-10 px-4">
        <ul class="flex items-center gap-4">
            <li><a href="{{ route('home') }}">home</a></li>
            <li><a href="{{ route('products.index') }}">products</a></li>
        </ul>
        <ul class="flex items-center gap-4">

            @guest
                <li><a href="{{ route('login') }}">login</a></li>
                <li><a href="{{ route('register') }}">register</a></li>
            @endguest

            @auth
                <li>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                <li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit">logout</button>
                    </form>
                </li>
            @endauth

        </ul>
    </nav>
</header>
