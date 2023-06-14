<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::orderby('id', 'Desc')->get();

        return view('products.index', compact('products'));
    }
}
