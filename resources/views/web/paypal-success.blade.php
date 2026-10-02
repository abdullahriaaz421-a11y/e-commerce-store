@extends('layouts.website')
@section('title', 'Payment Successful')
@section('head')
    <style>
        .payment-result-wrapper {
            min-height: 550px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .payment-result-card {
            width: 100%;
            max-width: 620px;
            background: #fff;
            border-radius: 24px;
            padding: 55px 45px;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            border: 1px solid #eeeeee;
        }

        .payment-icon {
            width: 90px;
            height: 90px;
            margin: 0 auto 25px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 42px;
        }

        .success-icon {
            background: #e9f9ef;
            color: #22a447;
        }

        .payment-result-card h2 {
            font-size: 30px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .payment-message {
            color: #777;
            font-size: 16px;
            line-height: 1.7;
            max-width: 450px;
            margin: 0 auto 30px;
        }

        .payment-info {
            background: #f8f8f8;
            border-radius: 14px;
            padding: 18px 22px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .payment-info div {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .payment-info span {
            font-size: 13px;
            color: #888;
        }

        .payment-info strong {
            font-size: 15px;
        }

        .success-text {
            color: #22a447;
        }

        .payment-actions {
            display: flex;
            gap: 12px;
            justify-content: center;
        }

        .payment-btn {
            min-height: 52px;
            padding: 0 25px;
            border-radius: 30px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .primary-btn {
            background: #111;
            color: #fff;
        }

        .primary-btn:hover {
            background: #333;
            color: #fff;
        }

        .secondary-btn {
            border: 1px solid #ddd;
            color: #222;
            background: #fff;
        }

        .secondary-btn:hover {
            background: #f7f7f7;
            color: #222;
        }

        @media (max-width: 576px) {
            .payment-result-card {
                padding: 40px 22px;
            }

            .payment-actions {
                flex-direction: column;
            }

            .payment-btn {
                width: 100%;
            }

            .payment-info {
                flex-direction: column;
            }
        }
    </style>
@endsection
@section('content')
    <div class="flat-spacing">
        <div class="container">
            <div class="payment-result-wrapper">
                <div class="payment-result-card success-card">
                    <div class="payment-icon success-icon">
                        <i class="fa fa-check"></i>
                    </div>
                    <h2>Payment Successful!</h2>
                    <p class="payment-message">
                        Your payment has been successfully processed.
                        Thank you for your order!
                    </p>
                    @if (isset($order))
                        <div class="payment-info">
                            <div>
                                <span>Order Number</span>
                                <strong>#{{ $order->order_number }}</strong>
                            </div>
                            <div>
                                <span>Payment Status</span>
                                <strong class="success-text">Paid</strong>
                            </div>
                        </div>
                    @endif
                    <div class="payment-actions">
                        <a href="{{ route('web.home') }}" class="payment-btn primary-btn">
                            Continue Shopping
                        </a>
                        @if (isset($order))
                            <a href="{{ route('invoice', $order->order_number) }}" target="_blank"
                                class="payment-btn secondary-btn">
                                <i class="fa fa-file-invoice"></i>
                                View Invoice
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


