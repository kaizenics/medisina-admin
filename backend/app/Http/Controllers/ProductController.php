<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    public function index()
    {
        $product = Products::select('id as productId', 'productImage', 'productName', 'category', 'quantity', 'price', 'status')->get();
        return response()->json($product);
    }
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        Products::create($request->all());
        return response()->json($request);
    }

    public function show($id)
    {
        $product = Products::findOrFail($id);
        return response()->json($product);
    }

    public function edit($id)
    {
        $product = Products::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);
        $product->update($request->all());
        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();
        return response()->json(null, 204);
    }
}