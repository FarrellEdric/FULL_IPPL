<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display all category list
     * 
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::with('category')->get();

        return view('products.index', compact('products'));
    }

    /**
     * Store a newly created category
     * 
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string|max:255',
            'price' => 'required|integer|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
        ]);

        if ($photo = $request->file('photo')) {
            $destinationPath = $photo->store('products', 'public');
            $input['photo'] = $destinationPath;
        }

        Product::firstOrCreate($input);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully');
    }

    /**
     * Update specified table resource from storage
     * 
     * 
     * @param \Illuminate\Http\Request $request
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $product =  Product::find($id);

        $input = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string|max:255',
            'price' => 'required|integer|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'  
        ]);     
        
        if($photo = $request->file('photo')) {
            
            if($product->photo) {
                Storage::disk('public')->delete($product->photo);
            }

            $destinationPath = $photo->store('products', 'public');
            $input['photo'] = $destinationPath;
        }
        
        $product->update($input);

        return redirect()->route('products.index')
            ->with('success', 'Product update successfully');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if($product->photo) {
            Storage::disk('public')->delete($product->photo);
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }

    public function create() 
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function show($id)
    {
        $product = Product::with('category')->find($id);

        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }
}
