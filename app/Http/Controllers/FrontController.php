<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class FrontController extends Controller
{
    use InteractsWithMedia;
    public function index()
    {
        // $category = Category::all();
        //return view('front.home.home',['categories'=>$category]);
        
        $category = Category::all();
        return view('front.home.index', ['categories'=>$category]);
    }

    // public function product()
    // {
    //     $product = Product::all();
    //     return view('front.products.index', ['products'=>$product]);
    // }

    public function products(Category $category)
    {   
        $category = $category->load('product');
        return view('front.products.index', ['category'=>$category]);

    }
}
