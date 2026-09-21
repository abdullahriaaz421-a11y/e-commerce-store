<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $fillable = [
        'order_number',
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'country',
        'city',
        'state',
        'street',
        'postal_code',
        'note',
        'total_price',
        // 'payment_method',
        'status',
    ];
    protected function casts(): array
    {
        return [
            'status' => OrderStatus::class,
        ];
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
