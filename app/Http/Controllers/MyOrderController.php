<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyOrderController extends Controller
{
    public function display()
    {
        $id = Auth::id();
        $data =  Order::with(['orderItems'])->where('user_id',$id)->where('status','Approved')->get();
        return view('front.order.index', compact('data'));
    }
}
