<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
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
        $request->validate([
            'productImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = $request->productImage->getClientOriginalName();
        $request->productImage->move(public_path('assets/images/uploaded-images'), $imageName);

        $product = new Products([
            'productImage' => $imageName,
            'productName' => $request->get('productName'),
            'category' => $request->get('category'),
            'quantity' => $request->get('quantity'),
            'price' => $request->get('price'),
            'status' => $request->get('status'),
        ]);
        $product->save();

        return response()->json(['message' => 'Product created successfully', 'product' => $product]);
    }

}