@props(['type' => 'success', 'message' => ''])

<aside
    class="
        rounded-lg px-4 py-2 mt-2
        @switch($type)
            @case('error')
                bg-red-500
                @break
            @case('warning')
                bg-yellow-500
                @break
            @case('info')
                bg-blue-500
                @break
            @default
                bg-green-500
        @endswitch">
    <p>{{ $message }}</p>
</aside>
