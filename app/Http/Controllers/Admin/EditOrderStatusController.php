<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\EditOrderStatusInterface;
use Illuminate\Http\Request;

class EditOrderStatusController extends Controller
{
    public function __construct(protected EditOrderStatusInterface $editOrderStatusService)
    {
    }
    public function update(Request $request, $orderNumber)
    {
        return $this->editOrderStatusService->updateOrderStatus($request->all(), $orderNumber);
    }
}
