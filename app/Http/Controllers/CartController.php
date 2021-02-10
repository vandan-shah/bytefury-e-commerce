<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartitems = \ShoppingCart::all();
        //dd($cartitems);
        return view('front.cart.index', compact('cartitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $user_id = Auth::user()->id;
        $cartitems = \ShoppingCart::all();
        $total_price = \ShoppingCart::totalPrice();

        $order = new Order;
        //$order->order_code ='#' . str_pad( $this->id, 20, "0", STR_PAD_LEFT);
        $order->order_code ='#' .rand();
        $order->order_date = date('Y-m-d');
        $order->total = $total_price;
        $order->user_id = $user_id;
        $order->save();

        $order_items = Order::all();
        foreach ($order_items as $data) {
            $order_id = $data->id;
        }

        foreach ($cartitems as $item) {
            $OrderItems = new OrderItem;
            $OrderItems->name = $item->name;
            $OrderItems->quantity = $item->qty;
            $OrderItems->price = $item->price;
            $OrderItems->total = $item->total;
            $OrderItems->product_id = $item->id;
            $OrderItems->order_id = $order_id;
            $OrderItems->save();

        }
        \ShoppingCart::destroy();
        return redirect('/order_success');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('brand')->find($id);
        $url = $product->url;
        $brand = $product->brand->name;
        $row = \ShoppingCart::add($id, $product->name,1, $product->price,[['brand' => $brand,'url'=>$url]]);
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $quantity = $request->input('qty');
        \ShoppingCart::update($id, $quantity);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \ShoppingCart::remove($id);
        return redirect()->back();
    }


}
