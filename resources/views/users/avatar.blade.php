<x-layout>

    @auth
        <section>
            <form action="{{ route('avatar.update') }}" method="post" enctype="multipart/form-data"
                class="flex flex-col gap-2">
                @csrf

                <div class="flex flex-col">
                    <label for="avatar">avatar</label>
                    <input type='file' name="avatar" accept="image/png, image/jpeg, image/webp" />
                    @error('avatar')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                @error('avatar_upload_error')
                    <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                @enderror

                <button type="submit" class="self-start  bg-blue-500 rounded-lg px-4 py-2 mt-4">Change avatar</button>

            </form>
        </section>
    @endauth

</x-layout>
