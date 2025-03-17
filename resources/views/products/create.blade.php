<x-layout>

    <section>
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data"
            class="flex flex-col gap-2">
            @csrf

            <div class="flex flex-col">
                <label for="name">product name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="border 
                            @if ($errors->has('name')) border-red-500
                            @else border-slate-700 @endif">
                @error('name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="description">description</label>
                <textarea name="description"
                    class="border 
                            @if ($errors->has('description')) border-red-500
                            @else border-slate-700 @endif">
                    {{ old('description') }}
                    </textarea>
                @error('description')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="price">price</label>
                <input type="number" name="price" min="1" value="{{ old('price') }}"
                    class="border 
                            @if ($errors->has('price')) border-red-500
                            @else border-slate-700 @endif">
                @error('price')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="count">count</label>
                <input type="number" name="count" value="{{ old('count') }}"
                    class="border 
                            @if ($errors->has('count')) border-red-500
                            @else border-slate-700 @endif">
                @error('count')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="slug">slug</label>
                <input type="text" name="slug" value="{{ old('slug') }}"
                    class="border 
                            @if ($errors->has('slug')) border-red-500
                            @else border-slate-700 @endif">
                @error('slug')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="image">image</label>
                <input type='file' name="image" accept="image/png, image/jpeg, image/webp" />
                @error('image')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            @error('product_creation_failed')
                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
            @enderror

            <button type="submit" class="self-start bg-blue-500 rounded-lg px-4 py-2 mt-4">Add product</button>

        </form>
    </section>

</x-layout>
