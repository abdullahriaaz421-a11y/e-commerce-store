<?php

namespace App\Repositories\Interfaces;

interface EditOrderStatusInterface
{
    public function updateOrderStatus(array $data, string $orderNumber);
}
