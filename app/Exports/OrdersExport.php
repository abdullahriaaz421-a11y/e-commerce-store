<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings
{
    public function collection(): Collection
    {
        return Order::select(
            'order_number',
            'fname',
            'lname',
            'email',
            'phone',
            'total_price',
            'status',
            'created_at'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Order Number',
            'First Name',
            'Last Name',
            'Email',
            'Phone',
            'Total Price',
            'Status',
            'Created At',
        ];
    }
}
