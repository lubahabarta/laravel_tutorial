<x-layout>

    <section>
        <form action="{{ route('deposit.add') }}" method="post" class="flex flex-col items-stretch gap-2">
            @csrf

            <div class="flex flex-col">
                <label for="amount">amount</label>
                <input type="number" name="amount" min="1" value="{{ old('amount') }}"
                    class="border 
                            @if ($errors->has('amount')) border-red-500
                            @else border-slate-700 @endif">
                @error('amount')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            @error('deposit_error')
                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
            @enderror

            <button type="submit" class="self-start bg-green-500 rounded-lg px-4 py-2 mt-4">Add credit</button>

        </form>
    </section>

</x-layout>
