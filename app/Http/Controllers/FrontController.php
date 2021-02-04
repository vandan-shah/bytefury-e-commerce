<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    public function update(Request $request)
    {

        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $data->address = $request->address;
        $data->number = $request->number;
        $data->password = Hash::make($request->input('password'));
        $data->save();
        return redirect('home');
    }


    public function userprofile()
    {
        $username = Auth::user();
        return view('customer.list', ['user'=>$username]);
    }

    public function allProduct()
    {
        $product = Product::all();
        return view('front.display-all-products.index', ['products'=>$product]);
    }
    /* public function login()
    {
        return view('front.login.login');
    } */

    // public function image($filename)
    // {
    //     $path = storage_path('app/public'.$filename);
    //     $file = File::get($path);
    // }
}
