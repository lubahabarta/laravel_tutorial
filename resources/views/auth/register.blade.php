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
    <main class="min-h-screen flex justify-center items-center bg-slate-700 px-4">
        <form action="{{ route('register') }}" method="post" class="flex-1 max-w-96 bg-white rounded-xl p-4">
            @csrf

            <h2 class="text-2xl font-bold">Registration</h2>

           <div class="flex flex-col mt-2">
                <label for="email">e-mail</label>
                <input type="text" name="email" class="border border-slate-700">
            </div>
           
            <div class="flex flex-col mt-2">
                <label for="username">username</label>
                <input type="text" name="username" class="border border-slate-700">
            </div>

            <div class="flex flex-col mt-2">
                <label for="password">password</label>
                <input type="password" name="password" class="border border-slate-700">
            </div>

            <div class="flex flex-col mt-2">
                <label for="password_confirmation">confirm password</label>
                <input type="password" name="password_confirmation" class="border border-slate-700">
            </div>

            <button type="submit" class="w-full text-center font-semibold bg-slate-700 text-white p-1 px-2 mt-4">Register</button>

        </form>
    </main>

    <footer>footer</footer>
    
</body>

</html>