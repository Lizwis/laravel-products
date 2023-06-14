<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\ProductResource;


use App\Models\Product;

class AdminProductsController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(5);

        return response()->json(new ProductResource($products), 200);
    }

    public function show(Product $product)
    {

        return response()->json($product, 201);
    }


    public function update($product_id)
    {
        $validated = $this->validateData();

        Product::where('id', $product_id)->update($validated);
    }


    public function store()
    {
        $validated = $this->validateData();
        Product::create($validated);

        return response()->json([], 201);
    }


    public function delete(Product $product)
    {
        $product->delete();

        return response()->json([], 204);
    }

    private function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'sku' =>   'required'
        ]);
    }
}
