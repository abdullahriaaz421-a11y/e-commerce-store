@extends('layouts.website')

@section('title', 'Payment Failed')
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

        .failed-icon {
            background: #fff0f0;
            color: #ef4444;
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
            margin: 0 auto 25px;
        }

        .payment-error {
            background: #fff4f4;
            border: 1px solid #ffd7d7;
            color: #dc2626;
            border-radius: 10px;
            padding: 12px 15px;
            margin-bottom: 25px;
            font-size: 14px;
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
        }
    </style>
@endsection

@section('content')

    <div class="flat-spacing">
        <div class="container">
            <div class="payment-result-wrapper">

                <div class="payment-result-card failed-card">

                    <div class="payment-icon failed-icon">
                        <i class="fa fa-times"></i>
                    </div>

                    <h2>Payment Failed</h2>

                    <p class="payment-message">
                        Unfortunately, we couldn't process your payment.
                        Please try again or choose another payment method.
                    </p>

                    @if (session('error'))
                        <div class="payment-error">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="payment-actions">

                        <a href="{{ route('web.home') }}" class="payment-btn primary-btn">
                            Back to Home
                        </a>

                        <a href="{{ url()->previous() }}" class="payment-btn secondary-btn">
                            <i class="fa fa-refresh"></i>
                            Try Again
                        </a>

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection


