<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} | Registration</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main
        class="min-h-screen flex justify-center items-center bg-gray-300 dark:bg-gray-950 text-gray-950 dark:text-gray-300 px-4">
        <form action="{{ route('register') }}" method="post"
            class="flex-1 flex flex-col max-w-md bg-white dark:bg-gray-900 rounded-xl p-4">
            @csrf

            <h2 class="text-2xl font-bold">Registration</h2>

            <div class="w-full flex flex-col sm:flex-row gap-2 mt-2">
                <div class="flex-1">
                    <label for="first_name">first name</label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}"
                        class="w-full bg-gray-300 dark:bg-slate-950 text-lg rounded-lg border outline-none px-2 @error('first_name') border-red-500 @else border-slate-700 @enderror">
                    @error('first_name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="last_name">last name</label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}"
                        class="w-full bg-gray-300 dark:bg-slate-950 text-lg rounded-lg border outline-none px-2 @error('last_name') border-red-500 @else border-slate-700 @enderror">
                    @error('last_name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex flex-col mt-2">
                <label for="email">e-mail</label>
                <input type="text" name="email" value="{{ old('email') }}"
                    class="bg-gray-300 dark:bg-slate-950 text-lg rounded-lg border outline-none px-2 @error('email') border-red-500 @else border-slate-700 @enderror">
                @error('email')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mt-2">
                <label for="username">username</label>
                <input type="text" name="username" value="{{ old('username') }}"
                    class="bg-gray-300 dark:bg-slate-950 text-lg rounded-lg border outline-none px-2 @error('username') border-red-500 @else border-slate-700 @enderror">
                @error('username')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mt-2">
                <label for="password">password</label>
                <input type="password" name="password" value="{{ old('password') }}"
                    class="bg-gray-300 dark:bg-slate-950 text-lg rounded-lg border outline-none px-2 @error('password') border-red-500 @else border-slate-700 @enderror">
                @error('password')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mt-2">
                <label for="password_confirmation">confirm password</label>
                <input type="password" name="password_confirmation"
                    class="bg-gray-300 dark:bg-slate-950 text-lg rounded-lg border outline-none px-2 @error('password') border-red-500 @else border-slate-700 @enderror">
            </div>

            @error('registration_failed')
                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
            @enderror

            <button type="submit" class="w-full text-center font-semibold bg-blue-500 rounded-lg py-2 px-4 mt-4">Register</button>

            <a href="{{ route('login') }}" class="text-center text-sm text-slate-500 mt-2">Already have an account?
                Login here</a>

        </form>
    </main>

    <footer>footer</footer>

</body>

</html>
