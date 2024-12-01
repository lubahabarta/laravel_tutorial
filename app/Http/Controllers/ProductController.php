<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
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
        if (!Auth::check()) {
            return redirect('/login');
        }

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

        return redirect('/dashboard')->with('product_creation_success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
