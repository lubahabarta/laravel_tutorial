<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-300 dark:bg-gray-950 text-gray-950 dark:text-gray-300">

    <x-header />

    <div class="min-h-dvh flex flex-col items-center p-4 pt-14">

        <main class="flex-1 w-full max-w-screen-lg py-8">{{ $slot }}</main>

        <footer class="w-full max-w-screen-lg bg-gray-300 dark:bg-gray-900 border border-slate-500 rounded-lg px-4 py-2">footer
        </footer>

    </div>

</body>

</html>
