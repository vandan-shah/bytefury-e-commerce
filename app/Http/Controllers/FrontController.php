<?php

namespace App\Http\Controllers;

use App\Http\Requests\FrontRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $username = Auth::user();
        return view('front.display-single-product.index', compact('product', 'username'));
    }

    public function user()
    {
        $username = Auth::user();
        return view('front.partials.header', ['user' => $username]);
        return view('front.display-single-product.index', compact('product'));
    }

    public function update(FrontRequest $request)
    {
        $data = $request->validated();
        
        
        // $data['password'] = bcrypt($data['password']);
        
        // dd($data['password']);
        User::find(Auth::user()->id)->update($data);
        
        //$data = User::find(Auth::user()->id);
        //$user->update($request->validated());
        // return view('/home',compact('data'));
        // $data->name = $request->name;
        // $data->email = $request->email;
        // $data->gender = $request->gender;
        // $data->address = $request->address;
        // $data->number = $request->number;
        //$data->password = Hash::make($request->input('password'));
        //$data->save();
        return redirect('/home');
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
