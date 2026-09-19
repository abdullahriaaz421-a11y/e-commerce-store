@extends('layouts.website');
@section('title', 'Track Order');
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
                                    class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            <fieldset>
                                <input type="text" name="order_number" placeholder="Order Number*"
                                    class="@error('order_number') is-invalid @enderror" value="{{ old('order_number') }}"
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
        <div class="mt-5">

            <div class="card border-0 shadow-sm text-center p-5">

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

        <div class="mt-5">

            <div class="card border-0 shadow-sm">

                {{-- Header --}}
                <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center p-4">
                    <div>
                        <h4 class="mb-1">Order Details</h4>
                        <p class="text-muted mb-0">
                            Order information and current status
                        </p>
                    </div>

                    <span class="badge bg-success px-3 py-2">
                        {{ ucfirst($order['status']) }}
                    </span>
                </div>

                {{-- Order Table --}}
                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle mb-0">

                            <tbody>

                                <tr>
                                    <th class="ps-4" style="width: 35%;">
                                        Order Number
                                    </th>

                                    <td>
                                        <span class="badge bg-dark">
                                            #{{ $order['order_number'] }}
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <th class="ps-4">
                                        Customer Name
                                    </th>

                                    <td>
                                        {{ $order['fname'] }} {{ $order['lname'] }}
                                    </td>
                                </tr>

                                <tr>
                                    <th class="ps-4">
                                        Email
                                    </th>

                                    <td>
                                        {{ $order['email'] }}
                                    </td>
                                </tr>

                                <tr>
                                    <th class="ps-4">
                                        Phone
                                    </th>

                                    <td>
                                        {{ $order['phone'] }}
                                    </td>
                                </tr>

                                <tr>
                                    <th class="ps-4">
                                        Order Date
                                    </th>

                                    <td>
                                        {{ $order['created_at'] }}
                                    </td>
                                </tr>

                                <tr>
                                    <th class="ps-4">
                                        Address
                                    </th>

                                    <td>
                                        {{ $order['street'] }},
                                        {{ $order['city'] }},
                                        {{ $order['state'] }},
                                        {{ $order['country'] }}
                                    </td>
                                </tr>

                                <tr>
                                    <th class="ps-4">
                                        Postal Code
                                    </th>

                                    <td>
                                        {{ $order['postal_code'] }}
                                    </td>
                                </tr>

                                <tr>
                                    <th class="ps-4">
                                        Total Amount
                                    </th>

                                    <td>
                                        <span class="badge bg-primary fs-6 px-3 py-2">
                                            Rs. {{ number_format($order['total_price'], 2) }}
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <th class="ps-4">
                                        Status
                                    </th>

                                    <td>
                                        @if ($order['status'] === 'pending')
                                            <span class="badge bg-warning text-dark px-3 py-2">
                                                Pending
                                            </span>
                                        @elseif($order['status'] === 'processing')
                                            <span class="badge bg-info text-dark px-3 py-2">
                                                Processing
                                            </span>
                                        @elseif($order['status'] === 'shipped')
                                            <span class="badge bg-primary px-3 py-2">
                                                Shipped
                                            </span>
                                        @elseif($order['status'] === 'completed')
                                            <span class="badge bg-success px-3 py-2">
                                                Completed
                                            </span>
                                        @elseif($order['status'] === 'cancelled')
                                            <span class="badge bg-danger px-3 py-2">
                                                Cancelled
                                            </span>
                                        @else
                                            <span class="badge bg-secondary px-3 py-2">
                                                {{ ucfirst($order['status']) }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    @endif
@endsection
