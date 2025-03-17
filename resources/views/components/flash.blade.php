@props(['type' => 'success', 'message' => ''])

<aside
    class="relative -z-10 flash opacity-0 rounded-lg px-4 py-2 animate-flash
        @switch($type)
            @case('error')
                bg-red-500 text-white
                @break
            @case('warning')
                bg-yellow-500 text-slate-500
                @break
            @case('info')
                bg-blue-500 text-white
                @break
            @default
                bg-green-500 text-white
        @endswitch">
    <p>{{ $message }}</p>
</aside>
