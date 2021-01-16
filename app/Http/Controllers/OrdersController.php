<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->limit == 'all') {
            $orders = Order::with(['orderItems.product', 'user'])->get();
        } else {
            $orders = Order::with(['orderItems.product', 'user'])->paginate(5);
        }

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
        $order = Order::create($request->only(['order_code', 'order_date', 'sub_total', 'tax', 'total', 'status', 'user_id']));

        foreach ($request->order_items as $item) {
            $item['order_id'] = $order->id;
            $item = OrderItem::create($item);
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
    public function update(OrderRequest $request, Order $order)
    {
        $order->update($request->only(['order_code', 'order_date', 'sub_total', 'tax', 'total', 'status', 'user_id']));

        $order->orderItems()->delete();
        foreach ($request->order_items as $item) {
            $item['order_id'] = $order->id;
            $item = OrderItem::create($item);
        }

        $order->load(['orderItems.product', 'user']);
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
