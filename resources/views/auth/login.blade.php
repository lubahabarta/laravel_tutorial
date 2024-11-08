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
    <main class="min-h-screen flex justify-center items-center bg-slate-700 px-4">
        <form action="{{ route('login') }}" method="post" class="flex-1 max-w-md bg-white rounded-xl p-4">
            @csrf

            <h2 class="text-2xl font-bold">Login</h2>

            <div class="flex flex-col mt-2">
                <label for="username">username</label>
                <input type="text" name="username" value="{{ old('username') }}"
                    class="border 
                        @if ($errors->has('username') || $errors->has('login_failed'))
                            border-red-500
                        @else
                            border-slate-700
                        @endif
                    ">
                @error('username')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mt-2">
                <label for="password">password</label>
                <input type="password" name="password" value="{{ old('password') }}"
                    class="border 
                        @if ($errors->has('password') || $errors->has('login_failed'))
                            border-red-500
                        @else
                            border-slate-700
                        @endif
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

            <button type="submit" class="w-full text-center font-semibold bg-slate-700 text-white p-1 px-2 mt-4">Log
                in</button>

        </form>
    </main>

    <footer>footer</footer>

</body>

</html>
