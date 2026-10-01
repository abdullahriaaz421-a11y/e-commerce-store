<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionHistories extends Model
{
    protected $fillable = [
        'order_id',
        'card_type',
        'card_last4',
        'txn_id',
        'amount',
        'status',
        'currency',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
