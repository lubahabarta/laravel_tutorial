<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [
            new Middleware('auth', except: ['index', 'show']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(12);

        return view('products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $fields = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['max:65535'],
            'price' => ['required', 'numeric', 'min:1', 'max:4294967295'],
            'count' => ['required', 'numeric', 'min:1', 'max:65535'],
            'image' => ['required', 'url', 'max:65535'],
            'slug' => ['required', 'unique:products', 'max:255'],
        ]);

        $user = Auth::user();
        if (!$user instanceof User) {
            return redirect('/login')->with([
                'session_timed_out' => 'Your session has timed out. Please log in again.',
            ]);
        }

        $product = $user->products()->create($fields);
        if (!$product instanceof Product) {
            return back()->withErrors(['product_creation_failed' => 'Product creation failed.']);
        }

        return redirect('/dashboard')->with([
            'product_creation_success' => 'Product created successfully.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $slug)
    {
        $product = Product::where('slug', $slug)->first();
        if (!$product instanceof Product) {
            return redirect('/products')->with([
                'product_not_found' => 'Product not found.',
            ]);
        }

        return view('products.show', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $slug)
    {
        $product = Product::where('slug', $slug)->first();
        if (!$product instanceof Product) {
            return redirect('/dashboard')->with([
                'product_not_found' => 'Product not found.',
            ]);
        }

        Gate::authorize('update', $product);

        return view('products.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        Gate::authorize('update', $product);

        $fields = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['max:65535'],
            'price' => ['required', 'numeric', 'min:1', 'max:4294967295'],
            'count' => ['required', 'numeric', 'min:1', 'max:65535'],
            'image' => ['required', 'url', 'max:65535'],
            'slug' => ['required', 'unique:products,slug,' . $product->id, 'max:255'],
        ]);

        $product->update($fields);

        return redirect('/dashboard')->with([
            'product_update_success' => 'Product updated successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Gate::authorize('update', $product);

        $product->delete();

        return back()->with([
            'product_deleted' => 'Product deleted successfully.'
        ]);
    }
}
