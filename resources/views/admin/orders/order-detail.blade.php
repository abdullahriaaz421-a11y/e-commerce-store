@extends('admin.layouts.master')
@section('title', 'Order Detail')
@section('content')
    <div class="wrapper" style="min-height: 100%; display:flex; flex-direction:column">
        <div class="content-wrapper" style="flex:1">
            {{-- Header --}}
            <div class="content-header">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ route('admin.orders.show') }}"
                               class="text-muted text-decoration-none">
                                <i class="fa fa-arrow-left"></i>
                                Back to Orders
                            </a>
                            <h1 class="mt-3 mb-1">
                                Order #{{ $order->order_number }}
                                <span class="bg-info text-lg p-1 pr-3 pl-3" style="border-radius: 10px">
                                    {{ $order->status }}
                                </span>
                            </h1>
                            <p class="text-muted mb-0">
                                Placed on {{ $order->created_at->format('d M Y, h:i A') }}
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('admin.invoice', $order->order_number) }}"
                               class="btn btn-secondary">
                                <i class="fa fa-file-invoice"></i>
                                View Invoice
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Main Content --}}
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        {{-- LEFT SIDE --}}
                        <div class="col-lg-8">
                            {{-- Order Items Card --}}
                            <div class="card shadow-sm" style="border-radius: 20px">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fa fa-box text-warning me-2"></i>
                                        Order Items
                                    </h3>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead style="background:#eef4fb">
                                                <tr>
                                                    <th>PRODUCT</th>
                                                    <th>PRICE</th>
                                                    <th>QTY</th>
                                                    <th>SUBTOTAL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($order->details as $detail)
                                                    @php
                                                        $price = $detail->qty > 0 ? $detail->total_price / $detail->qty : $detail->total_price;
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            {{ $detail->product->name ?? 'Product Deleted' }}
                                                        </td>
                                                        <td>
                                                            Rs. {{ number_format($price, 2) }}
                                                        </td>
                                                        <td>
                                                            {{ $detail->qty }}
                                                        </td>
                                                        <td>
                                                            Rs. {{ number_format($detail->total_price, 2) }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- Order Total --}}
                                    <div class="p-4">
                                        <div class="row justify-content-end">
                                            <div class="col-md-5">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <span>Subtotal</span>
                                                    <strong>
                                                        Rs. {{ number_format($order->total_price, 2) }}
                                                    </strong>
                                                </div>
                                                <div class="d-flex justify-content-between mb-2">
                                                    <span>Shipping</span>
                                                    <span>
                                                        Rs.300.00
                                                    </span>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between">
                                                    <strong>Total</strong>
                                                    <strong>
                                                        Rs. {{ number_format($order->total_price, 2) }}
                                                    </strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Payment Transactions --}}
                            <div class="card shadow-sm mt-4" style="border-radius: 20px">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fa fa-credit-card text-warning me-2"></i>
                                        Payment Transactions
                                    </h3>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead style="background:#eef4fb">
                                                <tr>
                                                    <th>GATEWAY</th>
                                                    <th>TRANSACTION ID</th>
                                                    <th>STATUS</th>
                                                    <th>REASON</th>
                                                    <th>AMOUNT</th>
                                                    <th>DATE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($transactions as $transaction)
                                                    <tr>
                                                        <td>
                                                            <span class=" p-1 pl-3 pr-3 bg-primary" style="border-radius: 10px">
                                                                {{ ucfirst($order->payment_method ?? '') }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="text-danger">
                                                                {{ $transaction->txn_id }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-success">
                                                                {{ ucfirst($transaction->status ?? 'Completed') }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            {{ $transaction->reason ?? '—' }}
                                                        </td>
                                                        <td>
                                                            Rs.{{ number_format($transaction->amount) }}
                                                        </td>
                                                        <td>
                                                            {{ $transaction->created_at->format('d M Y, h:i A') }}
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6"
                                                            class="text-center text-muted py-4">
                                                            No payment transaction found.
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- RIGHT SIDE --}}
                        <div class="col-lg-4">
                            {{-- Customer Card --}}
                            <div class="card shadow-sm" style="border-radius: 20px">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fa fa-user text-warning me-2"></i>
                                        Customer
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <h5 class="fw-bold">
                                        <i class="fa fa-user"></i>
                                        {{ $order->fname }} {{ $order->lname }}
                                    </h5>
                                    <p class="mb-2">
                                        <i class="fa fa-envelope me-2"></i>
                                        {{ $order->email }}
                                    </p>
                                    <p class="mb-2">
                                        <i class="fa fa-phone me-2"></i>
                                        {{ $order->phone }}
                                    </p>
                                    <p class="text-muted mb-0">
                                        <i class="fa fa-map-marker-alt me-2"></i>
                                        {{ $order->city }},
                                        {{ $order->state }},
                                        {{ $order->country }}
                                    </p>
                                </div>
                            </div>
                            {{-- Order Status Card --}}
                            <div class="card shadow-sm mt-4" style="border-radius: 20px">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fa fa-truck text-warning me-2"></i>
                                        Order Status
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <span>
                                            Payment Method
                                        </span>
                                        <span class=" p-2 pl-3 pr-3 bg-primary" style="border-radius: 10px">
                                            {{ ucfirst($order->payment_method ?? '') }}
                                        </span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-4">
                                        <span>
                                            Payment Status
                                        </span>
                                        <span class="p-1 pl-3 pr-3 bg-success" style="border-radius: 10px">
                                            Paid
                                        </span>
                                    </div>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <label class="form-label fw-bold">
                                            Update Status
                                        </label>
                                        <select name="status" class="form-control mb-3">
                                            <option value="pending"
                                                {{ $order->status == 'pending' ? 'selected' : '' }}>
                                                Pending
                                            </option>
                                            <option value="confirmed"
                                                {{ $order->status == 'confirmed' ? 'selected' : '' }}>
                                                Confirmed
                                            </option>
                                            <option value="processing"
                                                {{ $order->status == 'processing' ? 'selected' : '' }}>
                                                Processing
                                            </option>
                                            <option value="shipped"
                                                {{ $order->status == 'shipped' ? 'selected' : '' }}>
                                                Shipped
                                            </option>
                                            <option value="delivered"
                                                {{ $order->status == 'delivered' ? 'selected' : '' }}>
                                                Delivered
                                            </option>
                                            <option value="cancelled"
                                                {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                                Cancelled
                                            </option>
                                        </select>
                                        <button type="submit" class="btn w-100" style="background:#ff641f;color:white">
                                            Save Status
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection