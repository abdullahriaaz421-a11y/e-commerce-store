<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Invoice TB-260920-G3HBJ — Tenebrousa</title>
    <style>
        :root {
            --brand: #18181b;
            --brand-dark: #3f3f46;
            --ink: #1a1a1a;
            --muted: #6b7280;
            --line: #e4e4e7;
            --panel: #f4f4f5;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f4f4f5;
            color: var(--ink);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif;
            font-size: 14px;
            line-height: 1.5;
        }

        .inv_page {
            max-width: 860px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .inv_card {
            background: #ffffff;
            border: 1px solid var(--line);
            border-radius: 16px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06);
            padding: 44px 48px;
        }

        .inv_head {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            border-bottom: 3px solid var(--brand);
            padding-bottom: 24px;
            margin-bottom: 28px;
        }

        .inv_logo img {
            max-height: 140px;
            max-width: 400px;
            object-fit: contain;
            object-position: left center;
            display: block;
        }

        .inv_head_right {
            text-align: right;
        }

        .inv_title {
            font-size: 30px;
            font-weight: 800;
            letter-spacing: 0.06em;
            color: var(--brand);
            margin: 0 0 8px;
        }

        .inv_meta p {
            margin: 2px 0;
            color: var(--muted);
            font-size: 13px;
        }

        .inv_meta b {
            color: var(--ink);
            font-weight: 700;
        }

        .inv_status {
            display: inline-block;
            margin-top: 8px;
            padding: 5px 14px;
            border-radius: 999px;
            background: #f4f4f5;
            color: var(--brand-dark);
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .inv_parties {
            display: flex;
            gap: 24px;
            margin-bottom: 28px;
        }

        .inv_party {
            flex: 1;
            background: var(--panel);
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 18px 20px;
        }

        .inv_party h4 {
            margin: 0 0 8px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--brand);
        }

        .inv_party p {
            margin: 0;
            color: var(--ink);
        }

        .inv_table_wrap {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            margin-bottom: 24px;
        }

        .inv_table {
            width: 100%;
            min-width: 560px;
            border-collapse: collapse;
        }

        .inv_table thead th {
            background: var(--ink);
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            padding: 12px 14px;
            text-align: left;
        }

        .inv_table thead th:first-child {
            border-radius: 8px 0 0 8px;
        }

        .inv_table thead th:last-child {
            border-radius: 0 8px 8px 0;
            text-align: right;
        }

        .inv_table tbody td {
            padding: 13px 14px;
            border-bottom: 1px solid var(--line);
            vertical-align: top;
        }

        .inv_table tbody tr:last-child td {
            border-bottom: none;
        }

        .inv_table td.col_desc {
            color: var(--muted);
            font-size: 13px;
        }

        .inv_table .col_num {
            text-align: right;
            white-space: nowrap;
        }

        .inv_footer {
            display: flex;
            justify-content: space-between;
            gap: 24px;
            margin-bottom: 24px;
        }

        .inv_payment {
            flex: 1;
        }

        .inv_payment h4 {
            margin: 0 0 6px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--brand);
        }

        .inv_payment p {
            margin: 0;
            color: var(--muted);
        }

        .inv_totals {
            width: 280px;
        }

        .inv_totals table {
            width: 100%;
            border-collapse: collapse;
        }

        .inv_totals td {
            padding: 6px 0;
            font-size: 14px;
        }

        .inv_totals td:last-child {
            text-align: right;
            font-weight: 600;
        }

        .inv_totals .muted {
            color: var(--muted);
            font-weight: 400;
        }

        .inv_grand td {
            border-top: 2px solid var(--ink);
            padding-top: 12px;
            font-size: 18px;
            font-weight: 800;
            color: var(--brand);
        }

        .inv_note {
            background: var(--panel);
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 16px 20px;
            margin-bottom: 16px;
        }

        .inv_note h4 {
            margin: 0 0 8px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--brand);
        }

        .inv_note ul {
            margin: 0;
            padding-left: 18px;
            color: var(--muted);
            font-size: 13px;
        }

        .inv_note ul li+li {
            margin-top: 4px;
        }

        .inv_thanks {
            text-align: center;
            color: var(--muted);
            font-size: 13px;
            margin-top: 28px;
        }

        .inv_actions {
            display: flex;
            justify-content: center;
            gap: 14px;
            margin: 24px 0 8px;
        }

        .inv_btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 26px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }

        .inv_btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.12);
        }

        .inv_btn svg {
            width: 18px;
            height: 18px;
        }

        .inv_btn_outline {
            background: #fff;
            color: var(--ink);
            border: 1.5px solid var(--line);
        }

        .inv_btn_solid {
            background: var(--brand);
            color: #fff;
        }

        @media (max-width: 640px) {
            .inv_card {
                padding: 28px 20px;
            }

            .inv_head {
                flex-direction: column;
                gap: 18px;
            }

            .inv_head_right {
                text-align: left;
            }

            .inv_parties {
                flex-direction: column;
            }

            .inv_footer {
                flex-direction: column;
            }

            .inv_totals {
                width: 100%;
            }

            /* Fit the table inside the card instead of scrolling sideways:
               drop the description column and tighten the rest. */
            .inv_table {
                min-width: 0;
                table-layout: auto;
            }

            .inv_table .col_desc {
                display: none;
            }

            .inv_table thead th {
                padding: 10px 8px;
                font-size: 11px;
            }

            .inv_table tbody td {
                padding: 11px 8px;
                font-size: 13px;
                overflow-wrap: anywhere;
            }

            .inv_table thead th:first-child,
            .inv_table tbody td:first-child {
                padding-left: 12px;
            }

            .inv_table thead th:last-child,
            .inv_table tbody td:last-child {
                padding-right: 12px;
            }
        }

        @media print {
            body {
                background: #fff;
            }

            .inv_page {
                margin: 0;
                max-width: 100%;
            }

            .inv_card {
                box-shadow: none;
                border: none;
                border-radius: 0;
                padding: 0;
            }

            .inv_actions {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="inv_page">
        <div class="inv_card" id="tm_download_section">
            <div class="inv_head">
                <div class="inv_logo">
                    <img src="{{ asset('website/assets/images/avatar/avatar-1.jpg') }}" alt="Amerce" />
                </div>
                <div class="inv_head_right">
                    <p class="inv_title">Invoice</p>
                    <div class="inv_meta">
                        <p>Invoice No: <b>#{{ $order->order_number }}</b></p>
                        <p>Date: <b>{{ $order->created_at->format('d M Y') }}</b></p>
                    </div>
                    <span class="inv_status">{{ $order->status }}</span>
                </div>
            </div>

            <div class="inv_parties">
                <div class="inv_party">
                    <h4>Invoice To</h4>
                    <p>
                        {{ $order->fname }} {{ $order->lname }} <br />
                        {{ $order->city }}, {{ $order->country }}
                        <br />
                        {{ $order->email }} <br />
                        {{ $order->phone }}
                    </p>
                </div>
                <div class="inv_party">
                    <h4>Pay To</h4>
                    <p>
                        Tenebrousa <br />
                        16 Lahore – Kasur Rd، opposite Model Town Morr, Block L Gulberg III, Lahore, Pakistan <br />
                        info@example.com
                    </p>
                </div>
            </div>

            <div class="inv_table_wrap">
                <table class="inv_table">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th class="col_desc">Description</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->details as $detail)
                            <tr>
                                <td>
                                    {{ $detail->product->name ?? 'Product Deleted' }}
                                </td>
                                <td class="col_desc">
                                    {{ $detail->product->description ?? '-' }}
                                </td>
                                <td>
                                    Rs. {{ number_format($detail->product->price ?? 0, 2) }}
                                </td>
                                <td>
                                    {{ $detail->qty }}
                                </td>
                                <td class="col_num">
                                    Rs. {{ number_format($detail->total_price, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="inv_footer">
                <div class="inv_payment">
                    <h4>Payment Info</h4>
                    <p>
                        Cash On delivery
                        <br />
                        Amount: {{ number_format($order->total_price, 2) }}
                    </p>
                </div>
                <div class="inv_totals">
                    <table>
                        <tbody>
                            <tr>
                                <td class="muted">Subtotal</td>
                                <td>{{ number_format($order->total_price, 2) }}</td>
                            </tr>
                            <tr>
                                <td class="muted">Shipping</td>
                                <td>
                                    Rs.300.00
                                </td>
                            </tr>
                            <tr class="inv_grand">
                                <td>Grand Total</td>
                                <td>{{ number_format($order->total_price, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="inv_note">
                <h4>Order Status</h4>
                <ul>
                    <li>
                        {{ $order->status }} — thank you for shopping with Tenebrousa.
                    </li>
                </ul>
            </div>

            <div class="inv_note">
                <h4>Terms &amp; Conditions</h4>
                <ul>
                    <li>
                        All claims relating to quantity or shipping errors shall be waived by the buyer unless made in
                        writing within 9 days of delivery.
                    </li>
                    <li>
                        Delivery dates are not guaranteed and Tenebrousa is not liable for
                        delays in shipment. Returns and refunds are subject to our published return policy.
                    </li>
                </ul>
            </div>

            <p class="inv_thanks">Thank you for shopping with Tenebrousa ❤</p>
        </div>

        <div class="inv_actions">
            <a href="javascript:window.print()" class="inv_btn inv_btn_outline">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                        d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24"
                        fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                    <rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none"
                        stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                    <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none"
                        stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                    <circle cx="392" cy="184" r="24" fill="currentColor" />
                </svg>
                Print
            </a>
            <button id="tm_download_btn" class="inv_btn inv_btn_solid">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                        d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03"
                        fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="32" />
                </svg>
                Download
            </button>
        </div>
    </div>
    <script src="{{ asset('website/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/jspdf.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/html2canvas.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/invoice-main.js') }}"></script>
</body>

</html>
