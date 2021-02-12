<?php

namespace App\Models;

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

    public function scopeWhereStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeApproved($query, $approved)
    {
        return $query->where('Approved', $approved);
    }

    public function scopePending($query, $pending)
    {
        return $query->where('pending', $pending);
    }

    public function scopeRejected($query, $rejected)
    {
        return $query->where('Rejected', $rejected);
    }
    
    public function scopeApplyFilters($query, array $filters)
    {
        $filters = collect($filters);

        if ($filters->get('status')) {
            $query->whereStatus($filters->get('status'));
        }

        if ($filters->get('pending')) {
            $query->Pending($filters->get('pending'));
        }

        if ($filters->get('approved')) {
            $query->Approved($filters->get('approved'));
        }

        if ($filters->get('rejected')) {
            $query->Rejected($filters->get('rejected'));
        }
    }


}
