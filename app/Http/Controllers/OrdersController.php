<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['orderItems.product', 'user'])->paginate(5);

        return $this->respondJson('Order Retrieved Successfully', true, ['orders' => $orders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $order = new Order;
        $order->order_code = $request->order_code;
        $order->order_date = $request->order_date;
        $order->sub_total = $request->sub_total;
        $order->tax = $request->tax;
        $order->total = $request->total;
        $order->status = $request->status;
        $order->user_id = $request->user_id;
        $order->save();

        foreach ($request->order_items as $item) {
            $orderItem = new OrderItem;
            $orderItem->name = $item['name'];
            $orderItem->description = $item['description'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $item['price'];
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['product_id'];
            $orderItem->save();
        }

        $order->load(['orderItems.product', 'user']);
        return $this->respondJson('Order Create Successfully', true, ['order' => $order]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order->load(['orderItems.product', 'user']);
        return $this->respondJson('Order show successfully.', true, ['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        $order = Order::find($id);
        $order->order_code = $request->order_code;
        $order->order_date = $request->order_date;
        $order->sub_total = $request->sub_total;
        $order->tax = $request->tax;
        $order->total = $request->total;
        $order->status = $request->status;
        $order->user_id = $request->user_id;
        $order->save();



        // foreach ($request->order_items as $id) {
        //     DB::table('order_items')->whereIn('id', $id)->get()->delete();
        // }
        //$request->order_items->delete();
        foreach ($request->order_items as $item) {
            $orderItem = new OrderItem;
            $orderItem->name = $item['name'];
            $orderItem->description = $item['description'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $item['price'];
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['product_id'];
            $orderItem->save();
        }
        $order->load(['orderItems']);
        return $this->respondJson('Order update successfully.', true, ['order' => $order]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return $this->respondJson('Order show successfully.', true);
    }
}
