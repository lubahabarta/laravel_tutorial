<x-layout>

    <main>
        <section>
            <form action="{{ route('products.update', $product) }}" method="post">
                @csrf
                @method('PUT')

                <div class="flex flex-col">
                    <label for="name">product name</label>
                    <input type="text" name="name" value="{{ $product->name }}"
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
                    {{ $product->description }}
                    </textarea>
                    @error('description')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="price">price</label>
                    <input type="number" name="price" value="{{ $product->price }}"
                        class="border 
                            @if ($errors->has('price')) border-red-500
                            @else border-slate-700 @endif">
                    @error('price')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="count">count</label>
                    <input type="number" name="count" value="{{ $product->count }}"
                        class="border 
                            @if ($errors->has('count')) border-red-500
                            @else border-slate-700 @endif">
                    @error('count')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="image">image</label>
                    <input type="text" name="image" value="{{ $product->image }}"
                        class="border 
                            @if ($errors->has('image')) border-red-500
                            @else border-slate-700 @endif">
                    @error('image')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="slug">slug</label>
                    <input type="text" name="slug" value="{{ $product->slug }}"
                        class="border 
                            @if ($errors->has('slug')) border-red-500
                            @else border-slate-700 @endif">
                    @error('slug')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                @error('product_creation_failed')
                    <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                @enderror

                <button type="submit" class="">Update product</button>

            </form>
        </section>
    </main>

</x-layout>
