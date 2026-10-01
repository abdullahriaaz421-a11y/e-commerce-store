@extends('layouts.website')
@section('title', 'CheckOut')
@section('head')
    <style>
        /* Container for the custom input look */
        .stripe-input-wrapper {
            position: relative;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            background-color: #fff;
            padding: 12px 15px;
            transition: border-color 0.2s;
            display: flex;
            align-items: center;
        }

        .stripe-input-wrapper:focus-within {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        /* The actual Stripe element mounted inside */
        .stripe-element {
            width: 100%;
        }

        /* Simulated Icons (Lock and Question Mark) */
        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #adb5bd;
            pointer-events: none;
            font-size: 1.1rem;
        }

        /* Simulated Autofill Badge */
        .autofill-badge {
            position: absolute;
            right: 40px;
            top: 50%;
            transform: translateY(-50%);
            background-color: #1a1f16;
            color: #4ade80;
            padding: 2px 10px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 5px;
        }
    </style>
@endsection
@section('content')
    <!-- Page Title -->
    <section class="section-page-title flat-spacing-2 pb-0 text-center">
        <div class="container">
            <div class="main-page-title">
                <div class="breadcrumbs">
                    <a href="{{ route('web.home') }}" class="text-caption-01 cl-text-3 link">Home</a>
                    <i class="icon icon-CaretRightThin cl-text-3"></i>
                    <p class="text-caption-01">Check Out</p>
                </div>
                <h3>Check Out</h3>
                <p class="text-body-1 cl-text-2">
                    Review your order details carefully and complete your purchase securely and
                    <br class="d-none d-lg-block" />
                    easily for a smooth shopping experience.
                </p>
            </div>
        </div>
    </section>
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- /Page Title -->
    <!-- Checkout -->
    <section class="section-checkout flat-spacing-2">
        <div class="flat-spacing-2 pt-0">
            <div class="container">
                <div class="tf-cart-notification">
                    <div class="count-text">
                        <div class="ic">🔥</div>
                        <div class="">
                            Your cart will expire in
                            <div class="js-countdown time-count cd-has-zero cd-no" data-timer="288" data-labels=":,:,:,">
                            </div>
                            minutes! Please checkout now before your items sell out!
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="tf-page-checkout mb-lg-0">
                        <div class="wrap-quick-login">
                            <p class="title cl-text-2">
                                Already have an account?
                                <a href="#sign" data-bs-toggle="modal" class="tf-btn-line-2 style-primary fw-semibold">
                                    Login Here
                                </a>
                            </p>
                            <form class="form-quick-login">
                                <div class="tf-grid-layout sm-col-2">
                                    <input type="text" placeholder="Your name/Email" required="" />
                                    <input type="password" placeholder="Password" required="" />
                                </div>
                                <button class="action tf-btn animate-btn small fw-semibold" type="submit">Login</button>
                            </form>
                        </div>
                        @if ($errors->any())
                            <div style="background: #ffe6e6; padding: 15px; margin-bottom: 20px">
                                <h4>Errors:</h4>

                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('web.checkout.store') }}" method="POST" class="tf-checkout-cart-main"
                            id="checkout-form">
                            @csrf
                            <div class="box-ip-checkout estimate-shipping">
                                <div class="h5 title">Information</div>
                                <div class="form-content">
                                    <div class="tf-grid-layout sm-col-2">
                                        <input type="text" name="first_name" placeholder="First Name*"
                                            value="{{ old('first_name') }}"
                                            class="@error('first_name') is-invalid @enderror" />
                                        @error('first_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="text" name="last_name" placeholder="Last Name*"
                                            value="{{ old('last_name') }}"
                                            class="@error('last_name') is-invalid @enderror" />
                                        @error('last_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="tf-grid-layout sm-col-2">
                                        <input type="email" name="email" placeholder="Email Address*"
                                            value="{{ old('email') }}" class="@error('email') is-invalid @enderror" />
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="number" name="phone" placeholder="Phone Number*"
                                            value="{{ old('phone') }}" class="@error('phone') is-invalid @enderror" />
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <fieldset>
                                        <div class="tf-select">
                                            <select class="w-100" id="shipping-country-form" name="country"
                                                data-default="">
                                                @error('country')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <option selected disabled value="">Choose Country / Region</option>
                                                <option value="Australia"
                                                    data-provinces='[["Australian Capital Territory","Australian Capital Territory"],["New South Wales","New South Wales"],["Northern Territory","Northern Territory"],["Queensland","Queensland"],["South Australia","South Australia"],["Tasmania","Tasmania"],["Victoria","Victoria"],["Western Australia","Western Australia"]]'>
                                                    Australia
                                                </option>
                                                <option value="Austria" data-provinces="[]">Austria</option>
                                                <option value="Belgium" data-provinces="[]">Belgium</option>
                                                <option value="Canada"
                                                    data-provinces='[["Ontario","Ontario"],["Quebec","Quebec"]]'>
                                                    Canada
                                                </option>
                                                <option value="Czech Republic" data-provinces="[]">Czechia</option>
                                                <option value="Denmark" data-provinces="[]">Denmark</option>
                                                <option value="Finland" data-provinces="[]">Finland</option>
                                                <option value="France" data-provinces="[]">France</option>
                                                <option value="Germany" data-provinces="[]">Germany</option>
                                                <option value="United States"
                                                    data-provinces='[["Alabama","Alabama"],["California","California"],["Florida","Florida"]]'>
                                                    United States
                                                </option>
                                                <option value="United Kingdom"
                                                    data-provinces='[["England","England"],["Scotland","Scotland"],["Wales","Wales"],["Northern Ireland","Northern Ireland"]]'>
                                                    United Kingdom
                                                </option>
                                                <option value="India" data-provinces="[]">India</option>
                                                <option value="Japan" data-provinces="[]">Japan</option>
                                                <option value="Mexico" data-provinces="[]">Mexico</option>
                                                <option value="South Korea" data-provinces="[]">South Korea</option>
                                                <option value="Spain" data-provinces="[]">Spain</option>
                                                <option value="Italy" data-provinces="[]">Italy</option>
                                                <option value="Pakistan"
                                                    data-provinces='[["Punjab","Punjab"],["Sindh","Sindh"],["Balochistan","Balochistan"]]'>
                                                    Pakistan
                                                </option>
                                                <option value="Vietnam"
                                                    data-provinces='[["Ha Noi","Ha Noi"],["Da Nang","Da Nang"],["Ho Chi Minh","Ho Chi Minh"]]'>
                                                    Vietnam
                                                </option>
                                            </select>
                                        </div>
                                    </fieldset>
                                    <div class="tf-grid-layout sm-col-2">
                                        <input type="text" name="city" placeholder="Town/City*"
                                            value="{{ old('city') }}" class="@error('city') is-invalid @enderror" />
                                        @error('city')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="text" name="street" placeholder="Street,... (Optional)"
                                            value="{{ old('street') }}" class="@error('street') is-invalid @enderror" />
                                        @error('street')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="tf-grid-layout sm-col-2">
                                        <div class="tf-select">
                                            <select id="shipping-province-form" name="state" data-default=""
                                                value="{{ old('state') }}" class="@error('state') is-invalid @enderror">
                                                <option selected disabled value="">Choose State</option>
                                            </select>
                                        </div>
                                        <input type="number" name="postal_code" placeholder="Postal Code*"
                                            value="{{ old('postal_code') }}"
                                            class="@error('postal_code') is-invalid @enderror" />
                                        @error('postal_code')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <fieldset class="d-grid">
                                        <textarea name="note" placeholder="Write note..." class="@error('note') is-invalid @enderror"></textarea>
                                        @error('note')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </fieldset>
                                </div>
                            </div>
                            <div class="box-ip-payment">
                                <h5 class="title">Choose Payment Option:</h5>
                                <div class="payment-method-box" id="payment-method-box">
                                    <!-- Cash On Delivery -->
                                    <div class="payment_accordion type-2">
                                        <label for="cash-on" class="payment_check checkbox-wrap">
                                            <input type="radio" name="payment_method" value="cod" id="cash-on"
                                                class="tf-check-rounded style-2 payment_method" checked>
                                            <span class="pay-title fw-medium">
                                                <i class="fa-solid fa-hand-holding-dollar" style="color: #3c6a9b; font-size: 20px;"></i>
                                                Cash On Delivery
                                            </span>
                                        </label>
                                    </div>
                                    {{-- Stripe Payment --}}
                                    <div class="payment_accordion type-2">
                                        <label for="stripe-payment" class="payment_check checkbox-wrap">
                                            <input type="radio" name="payment_method" value="stripe"
                                                class="tf-check-rounded style-2 payment_method" id="stripe-payment">

                                            <span class="pay-title fw-medium">
                                                <i class="fa-brands fa-cc-stripe h5" style="color: #3c6a9b"></i>
                                                Pay By Stripe
                                            </span>
                                        </label>
                                        <!-- Stripe Fields -->
                                        <div id="stripe-payment-fields" style="display: none;">
                                            <input type="hidden" name="stripe_token" id="stripe-token-id">
                                            <!-- Card Number -->
                                            <div class="mb-3">
                                                <div class="stripe-input-wrapper">
                                                    <div id="card-number-element" class="stripe-element"></div>
                                                </div>
                                            </div>
                                            <!-- Expiry + CVC -->
                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <div class="stripe-input-wrapper">
                                                        <div id="card-expiry-element" class="stripe-element"></div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="stripe-input-wrapper">
                                                        <div id="card-cvc-element" class="stripe-element"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Name on Card -->
                                            <div class="mb-4">
                                                <div class="stripe-input-wrapper">
                                                    <input type="text" name="name_on_card" class="border-0 w-100"
                                                        style="outline: none; font-size: 16px;"
                                                        placeholder="Name on card">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- PayPal -->
                                    {{-- <div class="payment_accordion type-2">
                                        <label for="paypal-payment" class="payment_check checkbox-wrap">
                                            <input type="radio" name="payment_method" value="paypal"
                                                id="paypal-payment" class="tf-check-rounded style-2 payment_method">
                                            <span class="pay-title fw-medium">
                                                Pay By PayPal
                                            </span>
                                        </label>
                                        <div id="paypal-payment-fields" style="display: none;">
                                            <div class="stripe-input-wrapper mb-3">
                                                <div class="w-100">
                                                    <div id="paypal-button-container">
                                                        <button class="btn btn-warning w-100">
                                                            <i class="fa-brands fa-paypal h3" style="color: rgb(61, 120, 165);"></i>
                                                            <em class="h4 fw-bolder" style="font-style: italic;">Pay<em style="color: rgb(116, 192, 252);">Pal</em></em>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <!-- Cash On Delivery -->
                                    <div class="payment_accordion type-2">
                                        <label for="cash-on" class="payment_check checkbox-wrap">
                                            <input type="radio" name="payment_method" value="paypal" id="cash-on"
                                                class="tf-check-rounded style-2 payment_method">
                                            <span class="pay-title fw-medium">
                                                <i class="fa-brands fa-paypal h5" style="color: #3c6a9b"></i>
                                                PayPal
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="pay-btn" class="tf-btn animate-btn w-100">Pay Now</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="fl-sidebar-cart type-2 mt-lg-0 sticky-top">
                        <div class="box-your-order">
                            <h5 class="title">Shopping Cart</h5>
                            <ul class="list-order-product">
                                @forelse ($items = Cart::getContent() as $item)
                                    <li class="order-item fw-medium">
                                        <a href="{{ route('web.product.show', $item->attributes->slug) }}"
                                            class="img-prd">
                                            <img loading="lazy" width="100" height="133"
                                                src="{{ asset('storage/uploads/' . $item->attributes->image) }}"
                                                alt="Image" />
                                        </a>
                                        <div class="infor-prd">
                                            <a href="{{ route('web.product.show', $item->attributes->slug) }}"
                                                class="prd_name fw-medium lh-24 link link-underline">
                                                {{ $item->name }}
                                            </a>
                                            <div class="text-caption-01">
                                                <span class="cl-text-2"> Color: </span>
                                                {{ $item->attributes->color }}
                                            </div>
                                            <div class="text-caption-01">
                                                <span class="cl-text-2"> Size: </span>
                                                {{ $item->attributes->size }}
                                            </div>
                                        </div>
                                        <div class="">Quantity: {{ $item->quantity }}</div>
                                        <div class="quantity-price text-primary">
                                            Rs.{{ Cart::get($item->id)->getPriceSum() }}
                                        </div>
                                    </li>

                                @empty
                                    <li class="text-center">
                                        <p class="h6 fw-medium">Your cart is empty.</p>
                                    </li>
                                @endforelse
                                {{-- <li class="order-item fw-medium">
                                        <a href="#" class="img-prd">
                                            <img loading="lazy" width="100" height="133"
                                                src="assets/images/product/product-3.jpg" alt="Image">
                                        </a>
                                        <div class="infor-prd">
                                            <a href="#" class="prd_name fw-medium lh-24 link link-underline">
                                                V-neck cotton T-shirt
                                            </a>
                                            <div class="text-caption-01">
                                                <span class="cl-text-2">
                                                    Color:
                                                </span>
                                                Light Gray
                                            </div>
                                            <div class="text-caption-01">
                                                <span class="cl-text-2">
                                                    Size:
                                                </span>
                                                Small
                                            </div>
                                        </div>
                                        <div class="quantity-price text-primary">
                                            $29.99
                                        </div>
                                    </li> --}}
                            </ul>
                            {{-- <form class="ip-discount-code">
                                <input type="text" placeholder="Add voucher discount" required="" />
                                <button class="action tf-btn animate-btn" type="submit">Apply Code</button>
                            </form> --}}
                            <ul class="list-total">
                                <li class="total-item lh-24 fw-medium">
                                    <span>Shipping</span>
                                    <span>Rs.300.00</span>
                                </li>
                                <li class="total-item lh-24 fw-medium">
                                    <span>Discounts</span>
                                    <span>-00.00</span>
                                </li>
                            </ul>
                            <div class="last-total h5 fw-medium">
                                <span>Total</span>
                                <span>Rs.{{ Cart::getTotal() + 300 }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Checkout -->
@endsection
@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.payment_method').change(function() {
                var paymentMethod = $(this).val();
                // Hide all payment fields first
                $('#stripe-payment-fields').slideUp();
                $('#paypal-payment-fields').slideUp();

                // Stripe selected
                if (paymentMethod === 'stripe') {
                    $('#stripe-payment-fields').slideDown();
                    $('#pay-btn').removeClass('d-none');
                }

                // PayPal selected
                // else if (paymentMethod === 'paypal') {
                //     $('#paypal-payment-fields').slideDown();
                //     $('#pay-btn').addClass('d-none');
                // }

                // Cash on Delivery selected
                else if (paymentMethod === 'cod') {
                    $('#stripe-token-id').val('');
                    $('#pay-btn').removeClass('d-none');
                }
            });
        });

        var stripe = Stripe('{{ config('services.stripe.key') }}');
        var elements = stripe.elements();

        var style = {
            base: {
                fontSize: '16px',
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                '::placeholder': {
                    color: '#aab7c4',
                },
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a',
            },
        };

        // Create individual elements
        var cardNumber = elements.create('cardNumber', {
            style: style,
            placeholder: '1234 1234 1234 1234'
        });
        var cardExpiry = elements.create('cardExpiry', {
            style: style,
            placeholder: 'MM / YY'
        });
        var cardCvc = elements.create('cardCvc', {
            style: style,
            placeholder: 'CVC'
        });

        // Mount them to the DOM
        cardNumber.mount('#card-number-element');
        cardExpiry.mount('#card-expiry-element');
        cardCvc.mount('#card-cvc-element');

        // Handle real-time validation errors from the card Element.
        cardNumber.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                // You can inject an error div here if you want to show errors below the input
                console.log(event.error.message);
            } else {
                // Clear errors
            }
        });

        /*------------------------------------------
        Create Token Code
        --------------------------------------------*/
        function createToken() {
            document.getElementById("pay-btn").disabled = true;

            // Pass the individual elements to createToken
            stripe.createToken(cardNumber, {
                name: document.querySelector('input[name="name_on_card"]').value,
                // You can also add address details here if needed
            }).then(function(result) {

                if (typeof result.error != 'undefined') {
                    document.getElementById("pay-btn").disabled = false;
                    alert(result.error.message);
                }

                /* creating token success */
                if (typeof result.token != 'undefined') {
                    document.getElementById("stripe-token-id").value = result.token.id;
                    // console.log(result.token.id);

                    document.getElementById('checkout-form').submit();
                }
            });
        }
    </script>
@endsection
