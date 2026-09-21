@extends('layouts.website');
@section('title', 'Track Order');
@section('head')
    <style>
        .order-tracking-card {
            max-width: 640px;
            margin: 0 auto;
            background: #fff;
            border: 1px solid #e8e8e8;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.05);
        }

        /* Header */

        .order-card-header {
            padding: 28px 32px;
            background: #f9f9f9;
            border-bottom: 1px solid #e8e8e8;

            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .order-number {
            margin: 0 0 5px;
            font-size: 18px;
            font-weight: 500;
            color: #181818;
        }

        .order-date {
            margin: 0;
            font-size: 14px;
            color: #888;
        }

        .order-status-badge {
            background: #fff0f0;
            color: #ef4444;
            padding: 8px 18px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }


        /* Body */

        .order-card-body {
            padding: 32px;
        }


        /* Progress */

        .order-progress {
            position: relative;
            margin-bottom: 35px;
        }

        .progress-line {
            position: absolute;
            top: 6px;
            left: 0;
            right: 0;
            height: 5px;
            background: #e5e5e5;
            border-radius: 10px;
        }

        .progress-line-active {
            height: 5px;
            background: #ef4444;
            border-radius: 10px;
            transition: width 0.3s ease;
        }

        .progress-steps {
            position: relative;
            display: flex;
            justify-content: space-between;
        }

        .progress-step {
            width: 20%;
            text-align: center;
            font-size: 12px;
            color: #888;
        }

        .step-dot {
            width: 13px;
            height: 13px;
            margin: 0 auto 12px;

            background: #e5e5e5;
            border-radius: 50%;

            display: flex;
            justify-content: center;
            align-items: center;

            font-size: 8px;
            color: #fff;
        }

        .step-dot.active {
            background: #ef4444;
        }

        .active-text {
            color: #ef4444;
            font-weight: 600;
        }


        /* Items */

        .order-items-section {
            border-top: 1px solid #eee;
            padding-top: 25px;
        }

        .items-heading {
            display: flex;
            align-items: center;
            gap: 8px;

            font-size: 16px;
            font-weight: 500;

            margin-bottom: 25px;
        }

        .items-icon {
            font-size: 18px;
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;

            padding-bottom: 25px;
            border-bottom: 1px solid #eee;
        }

        .item-name {
            font-size: 14px;
            color: #222;
        }

        .item-price {
            font-size: 14px;
            font-weight: 500;
            white-space: nowrap;
        }


        /* Total */

        .order-total {
            display: flex;
            justify-content: space-between;
            align-items: center;

            padding: 22px 0;

            font-size: 16px;
        }

        .order-total strong {
            font-weight: 500;
        }


        /* Buttons */

        .order-actions {
            display: flex;
            gap: 10px;
        }

        .order-btn {
            flex: 1;

            display: flex;
            justify-content: center;
            align-items: center;

            min-height: 58px;

            border-radius: 30px;

            font-size: 15px;
            font-weight: 600;

            text-decoration: none;

            transition: all 0.2s ease;
        }

        .order-btn-dark {
            background: #111;
            color: #fff;
        }

        .order-btn-dark:hover {
            background: #222;
            color: #fff;
        }

        .order-btn-light {
            background: #fff;
            color: #222;
            border: 1px solid #e5e5e5;
        }

        .order-btn-light:hover {
            background: #f8f8f8;
            color: #222;
        }


        /* Mobile */

        @media (max-width: 600px) {

            .order-card-header {
                padding: 22px 18px;
                align-items: flex-start;
                flex-direction: column;
            }

            .order-card-body {
                padding: 22px 18px;
            }

            .progress-step {
                font-size: 9px;
            }

            .order-actions {
                flex-direction: column;
            }

            .order-btn {
                width: 100%;
            }

        }
    </style>
@endsection
@section('content')
    <!-- Page Title -->
    <section class="section-page-title text-center flat-spacing-2">
        <div class="container">
            <div class="main-page-title">
                <div class="breadcrumbs">
                    <a href="index-2.html" class="text-caption-01 cl-text-3 link">Home</a>
                    <i class="icon icon-CaretRightThin cl-text-3"></i>
                    <P class="text-caption-01">
                        Order Tracking
                    </P>
                </div>
                <h3>
                    Order Tracking
                </h3>
                <p class="text-body-1 cl-text-2">
                    To track your order, please enter your order ID in the box below and press the "Track" button.
                    <br class="d-none d-lg-block">
                    The ID has been sent to you on your receipt and in the confirmation email you received.
                </p>
            </div>
        </div>
    </section>
    <!-- /Page Title -->
    <!-- Order Tracking -->
    <div class="flat-spacing pt-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-lg-8 col-xl-6 mx-auto">
                    <form class="form-tracking" action="{{ route('web.tracking-order') }}" method="POST">
                        @csrf
                        <div class="form-content">
                            <fieldset>
                                <input type="email" name="email" placeholder="Emaill Addess*"
                                    class="@error('email') is-invalid @enderror" value="{{ old('email', $order['email'] ?? '') }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            <fieldset>
                                <input type="text" name="order_number" placeholder="Order Number*"
                                    class="@error('order_number') is-invalid @enderror" value="{{ old('order_number', $order['order_number'] ?? '') }}"
                                    required>
                                @error('order_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <button type="submit" class="tf-btn animate-btn w-100">
                            Track
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Order Tracking -->
    @if (session('error'))
        <div class="mt-5" <div class="card border-0 shadow-sm text-center p-5">
            <div class="mb-3">
                <span class="badge bg-danger px-3 py-2">
                    Order Not Found
                </span>
            </div>
            <h4 class="mb-2">
                No Order Found
            </h4>
            <p class="text-muted mb-0">
                We couldn't find an order matching the provided
                email and order number.
            </p>
        </div>
        </div>
    @endif
    @if ($order)
        @php
            /*
        |--------------------------------------------------------------------------
        | Order Status Steps
        |--------------------------------------------------------------------------
        */
            $statusSteps = [
                'pending' => 'Pending',
                'processing' => 'In Process',
                'processed' => 'Order Processed',
                'shipped' => 'On The Way',
                'completed' => 'Delivered',
            ];
            $currentStatus = strtolower($order['status']);
            // Current status ki position
            $statusKeys = array_keys($statusSteps);
            if ($currentStatus === 'confirmed') {
                $currentStatus = 'pending';
            }
            $currentIndex = array_search($currentStatus, $statusKeys);
            if ($currentIndex === false) {
                $currentIndex = 0;
            }
        @endphp
        <div class="mb-5">
            <div class="order-tracking-card">
                {{-- ================= HEADER ================= --}}
                <div class="order-card-header">
                    <div>
                        <h4 class="order-number">
                            Order #{{ $order['order_number'] }}
                        </h4>
                        <p class="order-date">
                            Placed on
                            {{ \Carbon\Carbon::parse($order['created_at'])->format('d M Y') }}
                        </p>
                    </div>
                    <span class="order-status-badge">
                        {{ $statusSteps[$currentStatus] ?? ucfirst($order['status']) }}
                    </span>
                </div>
                {{-- ================= PROGRESS ================= --}}
                <div class="order-card-body">
                    <div class="order-progress">
                        <div class="progress-line">
                            <div class="progress-line-active"
                                style="width:
                            {{ count($statusKeys) > 1 ? ($currentIndex / (count($statusKeys) - 1)) * 100 : 0 }}%;">
                            </div>
                        </div>
                        <div class="progress-steps">
                            @foreach ($statusSteps as $key => $label)
                                @php
                                    $stepIndex = array_search($key, $statusKeys);
                                    $isActive = $stepIndex <= $currentIndex;
                                @endphp
                                <div class="progress-step">
                                    <div class="step-dot {{ $isActive ? 'active' : '' }}">
                                        @if ($isActive)
                                            ✓
                                        @endif
                                    </div>
                                    <span class="{{ $isActive ? 'active-text' : '' }}">
                                        {{ $label }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- ================= ITEMS ================= --}}
                    <div class="order-items-section">
                        <div class="items-heading">
                            <span class="items-icon icon icon-Handbag"></span>
                            <span>Items</span>
                        </div>
                        @foreach ($order['details'] as $detail)
                            <div class="order-item">

                                <div class="item-name">
                                    {{ $detail['product']['name'] ?? 'Product Not Found' }}

                                    <span class="item-quantity">
                                        × {{ $detail['qty'] }}
                                    </span>
                                </div>

                                <div class="item-price">
                                    Rs. {{ number_format($detail['total_price'], 2) }}
                                </div>

                            </div>
                        @endforeach
                    </div>
                    {{-- ================= TOTAL ================= --}}
                    <div class="order-total">
                        <span>Total</span>
                        <strong>
                            Rs. {{ number_format($order['total_price'], 2) }}
                        </strong>
                    </div>
                    {{-- ================= BUTTONS ================= --}}
                    <div class="order-actions">
                        {{-- Invoice --}}
                        <a href="{{ route('admin.invoice', ['orderId' => $order['order_number']]) }}"
                            class="order-btn order-btn-dark" target="_blank">
                            View Invoice
                        </a>
                        {{-- Continue Shopping --}}
                        <a href="{{ route('web.home') }}" class="order-btn order-btn-light">
                            Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
