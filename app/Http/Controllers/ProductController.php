<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'subcategory')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'price' => 'required|numeric',
            'description' => 'nullable',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('public/products', $imageName);
            $imagePath = 'storage/products/' . $imageName;
        } 

        Product::create([
            'name' => $request->name,
            'image' => $imagePath,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect('/')->with('success', 'Product added successfully');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'price' => 'required|numeric',
            'description' => 'nullable',
        ]);

        $product = Product::findOrFail($id);

        $imagePath = null;
        if ($request->hasFile('image')) {

            if (Storage::disk('public')->exists(str_replace('storage/', '', $product->image))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $product->image));
            }

            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('public/products', $imageName);
            $imagePath = 'storage/products/' . $imageName;
        }

        $product->update([
            'name' => $request->name,
            'image' => $imagePath,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect('/')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/')->with('success', 'Product deleted successfully');
    }

    public function show($id)
    {
        $product = Product::with('category', 'subcategory')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function getSubCategory($id){
        $subCategory = SubCategory::where('category_id', $id)->get();      
        return response()->json($subCategory);
    }

}
