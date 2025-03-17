<div x-data="{ open: false }" class="relative z-10">

    <button type="menu" @click="open = !open" class="flex items-center gap-3">
        <div class="flex flex-col items-end">
            @auth
                <span>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
                <span class="inline-flex text-sm">
                    {{ Number::format(auth()->user()->credit ? auth()->user()->credit / 100 : 0, precision: 0, locale: 'cs') }}
                </span>
            @endauth

            @guest
                <span>guest</span>
            @endguest
        </div>
        <figure class="w-8 h-8 border border-slate-500 rounded-full overflow-hidden">
            @auth
                @if (auth()->user()->avatar)
                    <img src="{{ asset('images/' . auth()->user()->avatar) }}" alt="avatar"
                        class="w-full h-full object-cover object-center" />
                @endif
            @endauth
        </figure>
    </button>

    <ul x-show="open" @click.outside="open = false"
        class="absolute top-12 right-0 min-w-32 flex flex-col gap-2 bg-gray-300 dark:bg-gray-900 border border-slate-500 rounded-lg animate-show p-2">
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
