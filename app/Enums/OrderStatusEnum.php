<?php

namespace App\Enums;

enum OrderStatusEnum: string
{
    case CONFIRMED       = 'confirmed';
    case IN_PROCESS      = 'in_process';
    case ORDER_PROCESSED = 'order_processed';
    case ON_THE_WAY      = 'on_the_way';
    case HOLD            = 'hold';
    case DELIVERED       = 'delivered';
    case REFUND          = 'refund';
    case CANCELLED       = 'cancelled';
}
