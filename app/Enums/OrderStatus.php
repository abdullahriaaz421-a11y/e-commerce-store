<?php

namespace App\Enums;

enum OrderStatus: string
{
    case Confirmed = 'confirmed';
    case Pending = 'pending';
    case Order_Processed = 'Order Processed';
    case On_The_Way = 'On The Way';
    case Hold = 'Hold';
    case Delivered = 'Delivered';
    case Refund = 'Refund';
    case Cancelld = 'Cancelld';
}
