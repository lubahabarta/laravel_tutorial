<x-layout>

    <section class="flex flex-col items-center sm:flex-row sm:items-start gap-4">
        <div
            class="w-1/2 sm:w-1/3 aspect-square flex justify-center items-center bg-gray-300 dark:bg-gray-950 border border-slate-500 rounded-full">
            <p>IMG_PLACEHOLDER</p>
        </div>

        <div class="flex-1">
            <h1 class="font-bold text-3xl">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h1>

            <p>&#64;{{ auth()->user()->username }}</p>
        </div>
    </section>

</x-layout>
