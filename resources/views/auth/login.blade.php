<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} | Log in</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main
        class="min-h-screen flex justify-center items-center bg-gray-300 dark:bg-gray-950 text-gray-950 dark:text-gray-300 px-4">
        <form action="{{ route('login') }}" method="post"
            class="flex-1 flex flex-col max-w-md bg-white dark:bg-gray-900 rounded-xl p-4">
            @csrf

            <h2 class="text-2xl font-bold">Login</h2>

            @if (session('session_timed_out'))
                <x-flash type="info" :message="session('session_timed_out')" />
            @endif

            <div class="flex flex-col mt-2">
                <label for="username">username</label>
                <input type="text" name="username" value="{{ old('username') }}"
                    class="bg-gray-300 dark:bg-slate-950 text-lg rounded-lg border outline-none px-2
                        @if ($errors->has('username') || $errors->has('login_failed')) border-red-500
                        @else
                            border-slate-500 @endif
                    ">
                @error('username')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mt-2">
                <label for="password">password</label>
                <input type="password" name="password" value="{{ old('password') }}"
                    class="bg-gray-300 dark:bg-slate-950 text-lg rounded-lg border outline-none px-2
                        @if ($errors->has('password') || $errors->has('login_failed')) border-red-500
                        @else
                            border-slate-500 @endif
                    ">
                @error('password')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center gap-2 mt-2">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">remember me</label>
            </div>

            @error('login_failed')
                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
            @enderror

            <button type="submit" class="w-full text-center font-semibold bg-blue-500 rounded-lg py-2 px-4 mt-4">Log
                in</button>

            <a href="{{ route('register') }}" class="text-center text-sm text-slate-500 mt-2">Don't have an account?
                Register here</a>

        </form>

    </main>

    <footer>footer</footer>

</body>

</html>
