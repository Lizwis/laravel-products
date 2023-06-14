<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminProductsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testShow()
    {
        // Create a user
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        // Create a dummy product
        $product = Product::factory()->create();

        // Send a GET request to the show endpoint with the product ID
        $response = $this->get("/admin/product/show/{$product->id}");

        // Assert that the response has a successful status code
        $response->assertStatus(201);

        // Assert that the response contains the product
        $response->assertJson($product->toArray());
    }

    public function testStore()
    {
        // Create a user
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        // Dummy product data
        $productData = [
            'name' => 'Test Product',
            'price' => 10.99,
            'sku' => 'TP001'
        ];

        // Send a POST request to the store endpoint with the product data
        $response = $this->post('/admin/products/store', $productData);

        // Assert that the response has a successful status code
        $response->assertStatus(201);

        // Assert that the product is created in the database
        $this->assertDatabaseHas('products', $productData);
    }

    public function testUpdate()
    {
        // Create a user
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        // Create a dummy product
        $product = Product::factory()->create();

        // Dummy updated product data
        $updatedProductData = [
            'name' => 'Updated Product',
            'price' => 19.99,
            'sku' => 'UP001'
        ];

        // Send a POST request to the update endpoint with the product ID and updated data
        $response = $this->post("/admin/product/update/{$product->id}", $updatedProductData);

        // Assert that the response has a successful status code
        $response->assertStatus(200);

        // Assert that the product is updated in the database
        $this->assertDatabaseHas('products', $updatedProductData);
    }

    public function testDelete()
    {
        // Create a user
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        // Create a dummy product
        $product = Product::factory()->create();

        // Send a DELETE request to the delete endpoint with the product ID
        $response = $this->delete("/admin/product/delete/{$product->id}");

        // Assert that the response has a successful status code
        $response->assertStatus(204);

        // Assert that the product is deleted from the database
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
