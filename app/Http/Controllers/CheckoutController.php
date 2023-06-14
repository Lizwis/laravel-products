<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class CheckoutController extends Controller
{
    public function validateCart()
    {
        $cartItems = request()->cart;

        $validatedTotal = 0;

        foreach ($cartItems as $cart) {
            $cartItemId = $cart['id'];
            $cartItemQty = $cart['quantity'];

            $product = Product::find($cartItemId);

            if (!$product || $cartItemQty <= 0) {

                $response['message'] = "The given data was invalid";
                $error['item'] = ["Invalid item or quantity"];
                $response['errors'] = $error;
                return response()->json($response, 422);
            } else {
                $validatedTotal += $product->price * $cartItemQty;
            }
            return response()->json($validatedTotal, 200);
        }
    }

    public function index()
    {
        return view('checkout.index');
    }
}
