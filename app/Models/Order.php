<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Order extends Model
{
    use Searchable;

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
        'status',
        'payment_method',
    ];

    protected function casts(): array
    {
        return [
            'status' => OrderStatusEnum::class,
        ];
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function toSearchableArray(): array
    {
        return [
            'order_number' => $this->order_number,
            'fname'        => $this->fname,
            'lname'        => $this->lname,
            'phone'        => $this->phone,
            'email'        => $this->email,
            'country'      => $this->country,
            'city'         => $this->city,
            'state'        => $this->state,
            'street'       => $this->street,
            'status'       => $this->status,
        ];
    }
}
