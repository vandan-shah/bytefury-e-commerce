<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function list()
    {
        $data = Order::all()->where('status','Approved');
        return view('front.admin.status', ["data" => $data]);
    }

    public function update(Request $req, $id)
    {
        $data = Order::find($id);
        $data->status = $req->status;
        $data->save();
        return redirect()->back();
    }
}
