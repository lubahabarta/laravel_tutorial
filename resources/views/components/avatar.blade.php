<div x-data="{ open: false }" class="relative">

    <button type="menu" @click="open = !open" class="flex items-center gap-2">
        <span>
            @auth
                {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
            @endauth

            @guest
                guest
            @endguest
        </span>
        <figure class="w-8 h-8 border border-slate-500 rounded-full"></figure>
    </button>

    <ul x-show="open"
        class="absolute top-12 right-0 flex flex-col gap-2 bg-gray-300 dark:bg-gray-900 border border-slate-500 rounded-lg animate-show p-2">
        @guest
            <li><a href="{{ route('login') }}">login</a></li>
            <li><a href="{{ route('register') }}">register</a></li>
        @endguest

        @auth
            <li>
                <a href="{{ route('dashboard') }}">{{ auth()->user()->first_name }}
                    {{ auth()->user()->last_name }}</a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit">logout</button>
                </form>
            </li>
        @endauth

        <li>
            <button type="button" id="toggle-theme">dark</button>
        </li>
    </ul>

</div>
