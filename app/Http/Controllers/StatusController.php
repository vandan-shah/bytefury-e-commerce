<?php

namespace App\Http\Controllers;

use App\Models\Order;

class StatusController extends Controller
{
    public function approve($id)
    {
        $order = Order::find($id);
        $order->status = 'Approved';
        $order->save();
        return $this->respondJson('order approved', true, ['order' => $order]);
    }

    public function reject($id)
    {
        $order = Order::find($id);
        $order->status = 'Rejected';
        $order->save();
        return $this->respondJson('order rejected', true, ['order' => $order]);
    }
}
