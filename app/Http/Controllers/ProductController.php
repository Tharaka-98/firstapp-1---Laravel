<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        // show stored data
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        // dd($request->name);

        // validation
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable',
        ]);

        // save data into database
        $newProduct = Product::create($data);

        return redirect(route('product.index'));

    }

    public function edit(Product $product) {
        // products.edit mean edit file in products folder
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable',
        ]);

        $product->update($data);

        // after update redirect to the index page
        return redirect(route('product.index'))->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product) {
        $product->delete();

        // after destroy redirect to the index page
        return redirect(route('product.index'))->with('success', 'Product deleted successfully');
    }

}
