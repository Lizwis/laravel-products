<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckoutControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testValidCartItems()
    {
        // Create a sample product
        $product = Product::factory()->create([
            'price' => 10.00,
        ]);

        // Prepare the cart items
        $cartItems = [
            [
                'id' => $product->id,
                'quantity' => 2,
            ],
        ];

        // Send a POST request to the validateCart route with valid cart items
        $response = $this->post('/validateCart', ['cart' => $cartItems]);

        // Assert that the response has a successful status code
        $response->assertStatus(200);

        // Assert that the response contains the expected validated total
        $response->assertExactJson([
            $product->price * 2,
        ]);
    }

    public function testInvalidCartItems()
    {
        // Prepare the cart items with an invalid item
        $cartItems = [
            [
                'id' => 999, // Invalid product ID
                'quantity' => 1,
            ],
        ];

        // Send a POST request to the validateCart route with invalid cart items
        $response = $this->post('/validateCart', ['cart' => $cartItems]);

        // Assert that the response has a status code of 422 (Unprocessable Entity)
        $response->assertStatus(422);

        // Assert that the response contains the expected error message and format
        $response->assertJson([
            'message' => 'The given data was invalid',
            'errors' => [
                'item' => ['Invalid item or quantity'],
            ],
        ]);
    }
}
