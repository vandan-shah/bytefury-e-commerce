<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use App\Models\User;
use App\Models\Category;

class CategoryTest extends TestCase
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
    public function all_categories_to_be_paginated()
    {
        $this->withoutExceptionHandling();

        Category::factory()->create();

        $this->json('get', 'api/categories')->assertOk();
    }

    /** @test */
    public function a_user_can_store_the_category()
    {
        $this->withoutExceptionHandling();

        $category = Category::factory()->make()->toArray();

        $this->json('post', 'api/categories', $category);

        $this->assertDatabaseHas('categories', array_slice($category, 0, 2));
    }

    /** @test */
    public function a_user_can_see_categories()
    {
        $this->withoutExceptionHandling();

        $category = Category::factory()->create();

        $this->json('get', "api/categories/{$category->id}")->assertOk();
    }

    /** @test */
    public function a_user_can_update_category()
    {
        $this->withoutExceptionHandling();

        $category = Category::factory()->create();

        $new_category = Category::factory()->make()->toArray();

        $this->json('put',"api/categories/{$category->id}",$new_category);

        $this->assertDatabaseHas('categories', array_slice($new_category, 0, 2));
    }

    /** @test */
    public function a_user_can_delete_category()
    {
        $this->withoutExceptionHandling();

        $category = Category::factory()->create();

        $this->json('delete', "api/categories/{$category->id}")->assertOk();

        $this->assertDeleted($category);
    }
}
