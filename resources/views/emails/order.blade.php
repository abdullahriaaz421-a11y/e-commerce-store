<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
</head>
<body>
    <h2>Thank You For Your Order!</h2>
    <p>
        Hello {{ $order->fname }} {{ $order->lname }},
    </p>
    <p>
        Your order has been received successfully.
    </p>
    <h3>Order Information</h3>
    <p>
        <strong>Order ID:</strong>
        #{{ $order->order_number }}
    </p>
    <p>
        <strong>Name:</strong>
        {{ $order->fname }} {{ $order->lname }}
    </p>
    <p>
        <strong>Email:</strong>
        {{ $order->email }}
    </p>
    <p>
        <strong>Phone:</strong>
        {{ $order->phone }}
    </p>
    <p>
        <strong>Address:</strong>
        {{ $order->street }},
        {{ $order->city }},
        {{ $order->state }},
        {{ $order->country }},
        {{ $order->postal_code }}
    </p>
    <h3>Order Details</h3>
    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->details as $detail)
                <tr>
                    <td>
                        {{ $detail->product->name }}
                    </td>
                    <td>
                        {{ $detail->qty }}
                    </td>
                    <td>
                        Rs.{{ $detail->total_price }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h3>
        Total:
        Rs.{{ $order->total_price }}
    </h3>
    {{-- <p>
        Payment Method:
        {{ $order->payment_method }}
    </p> --}}
    @if ($order->note)
        <p>
            <strong>Note:</strong>
            {{ $order->note }}
        </p>
    @endif
</body>
</html>
