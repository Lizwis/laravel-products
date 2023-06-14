<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        // Create some sample products
        Product::factory()->count(3)->create();

        // Send a GET request to the index route
        $response = $this->get('/');

        // Assert that the response has a successful status code
        $response->assertStatus(200);

        // Assert that the view is rendered correctly
        $response->assertViewIs('products.index');

        // Assert that the 'products' variable is passed to the view and contains the expected data
        $products = $response->viewData('products');
        $this->assertCount(3, $products);
    }
}
