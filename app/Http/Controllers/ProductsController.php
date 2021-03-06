<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->limit == 'all') {
            $products = Product::with(['category', 'brand'])->get();
        } else {
            $products = Product::with(['category', 'brand'])->paginate(5);
        }

        return $this->respondJson('Product Retrieved Successfully', true, ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated());

        $product->with(['category', 'brand']);

        if ($request->hasFile('image')) {
            $product->addMediaFromRequest('image')->toMediaCollection('avatar');
        }
        
        return $this->respondJson('Product Create Successfully', true, ['product' => $product]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->load(['category', 'brand']);
    
        return $this->respondJson('Product displayed successfully.', true, ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        if ($request->hasFile('image')) {
            $product->addMediaFromRequest('image')->toMediaCollection('avatar');
        }

        return $this->respondJson('Product updated successfully.', true, ['product' => $product]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return $this->respondJson('Customer deleted successfully.', true);
    }
}
