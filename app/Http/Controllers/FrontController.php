<?php

namespace App\Http\Controllers;

use App\Http\Requests\FrontRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\User;

class FrontController extends Controller
{
    use InteractsWithMedia;
    public function index()
    {
        $category = Category::all();
        return view('front.home.index', compact('category'));
    }

    public function products(Category $category)
    {
        $category = $category->load('product');
        return view('front.display-products.index', compact('category'));
    }

    public function product(Product $product)
    {
        return view('front.display-single-product.index', compact('product'));
    }

    public function update(FrontRequest $request)
    {
        $data = $request->validated();
        User::find(Auth::user()->id)->update($data);
        return redirect('home');
        // $data = new User;
        // $data->name = $request->name;
        // $data->email = $request->email;
        // $data->gender = $request->gender;
        // $data->address = $request->address;
        // $data->number = $request->number;
        // $data->password = Hash::make($request->input('password'));
        // $data->save();
    }


    public function userprofile()
    {
        $user = User::find(Auth::user()->id);
        return view('customer.list', ['user' => $user]);
    }

    public function allProduct()
    {
        $product = Product::all();
        return view('front.display-all-products.index', ['products'=>$product]);
    }
    
}
