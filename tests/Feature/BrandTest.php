<?php

namespace Tests\Feature;

use App\Models\Brand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use App\Models\User;

class BrandTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );
    }

    /** @test */
    public function all_brands_to_be_paginated()
    {
        $this->withoutExceptionHandling();

        Brand::factory()->create();

        $this->json('get', 'api/brand')->assertOk();
    }

    /** @test */
    public function a_user_can_store_the_category()
    {
        $this->withoutExceptionHandling();

        $brand = Brand::factory()->make()->toArray();

        $this->json('post', 'api/brand', $brand);

        $this->assertDatabaseHas('brands', array_slice($brand, 0, 1));
    }

    /** @test */
    public function a_user_can_see_brand()
    {
        $this->withoutExceptionHandling();

        $brand = Brand::factory()->create();

        $this->json('get', "api/brand/{$brand->id}")->assertOk();
    }

    /** @test */
    public function a_user_can_update_brand()
    {
        $this->withoutExceptionHandling();

        $brand = Brand::factory()->create();

        $new_brand = Brand::factory()->make()->toArray();

        $this->json('put', "api/brand/{$brand->id}", $new_brand);

        $this->assertDatabaseHas('brands', array_slice($new_brand, 0, 1));
    }

    /** @test */
    public function a_user_can_delete_brand()
    {
        $this->withoutExceptionHandling();

        $brand = Brand::factory()->create();

        $this->json('delete', "api/brand/{$brand->id}")->assertOk();

        $this->assertDeleted($brand);
    }
}
