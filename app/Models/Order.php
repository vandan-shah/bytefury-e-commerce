<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function show(Order $order)
    {
        return $order;
    }
    // public function setDateOrder($date)
    // {
    //     if ($date) {
    //         //$date = Carbon::createFromFormat('Y-m-d');
    //         $this->order['order_date'] = Carbon::createFromFormat('Y-m-d', $date);
    //     }
    // }
}
