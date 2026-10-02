<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Status Updated</title>
</head>

<body>
    <h2>Order Status Updated</h2>
    <p>Hello {{ $order->fname }},</p>
    <p>
        Your order status has been updated.
    </p>
    <p>
        <strong>Order Number:</strong>
        {{ $order->order_number }}
    </p>
    <p>
        <strong>Order Date:</strong>
        {{ $order->created_at->format('d M, Y') }}
    </p>
    <p>
        <strong>Current Status:</strong>
        {{ ucwords(str_replace('_', ' ', $status)) }}
    </p>
    <p>
        You can view your order invoice by clicking the button below:
    </p>
    <a href="{{ route('admin.invoice', $order->order_number) }}"
        style="
       display: inline-block;
       padding: 10px 20px;
       background-color: #007bff;
       color: white;
       text-decoration: none;
       border-radius: 5px;
   ">
        View Invoice
    </a>
    <p>
        Thank you for shopping with us.
    </p>
</body>
</html>
