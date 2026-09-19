@extends('layouts.website')
@section('title', 'CheckOut')
@section('content')
    <!-- Page Title -->
    <section class="section-page-title text-center flat-spacing-2 pb-0">
        <div class="container">
            <div class="main-page-title">
                <div class="breadcrumbs">
                    <a href="{{ route('web.home') }}" class="text-caption-01 cl-text-3 link">Home</a>
                    <i class="icon icon-CaretRightThin cl-text-3"></i>
                    <P class="text-caption-01">
                        Check Out
                    </P>
                </div>
                <h3>
                    Check Out
                </h3>
                <p class="text-body-1 cl-text-2">
                    Review your order details carefully and complete your purchase securely and
                    <br class="d-none d-lg-block">
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
                        <div class="ic">
                            🔥
                        </div>
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
                <div class="col-lg-7 ">
                    <div class="tf-page-checkout mb-lg-0">
                        <div class="wrap-quick-login">
                            <p class="title cl-text-2">Already have an account?
                                <a href="#sign" data-bs-toggle="modal" class="tf-btn-line-2 style-primary fw-semibold ">
                                    Login Here
                                </a>
                            </p>
                            <form class="form-quick-login">
                                <div class="tf-grid-layout sm-col-2">
                                    <input type="text" placeholder="Your name/Email" required="">
                                    <input type="password" placeholder="Password" required="">
                                </div>
                                <button class="action tf-btn animate-btn small fw-semibold" type="submit">
                                    Login
                                </button>
                            </form>
                        </div>
                        {{-- @if ($errors->any())
                            <div style="background: #ffe6e6; padding: 15px; margin-bottom: 20px;">
                                <h4>Errors:</h4>

                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                        <form action="{{ route('web.checkout.store') }}" method="POST" class="tf-checkout-cart-main">
                            @csrf
                            <div class="box-ip-checkout estimate-shipping">
                                <div class="h5 title">Information</div>
                                <div class="form-content">
                                    <div class="tf-grid-layout sm-col-2">
                                        <input type="text" name="first_name" placeholder="First Name*" value="{{ old('first_name') }}" class="@error('first_name') is-invalid @enderror">
                                        @error('first_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="text" name="last_name" placeholder="Last Name*" value="{{ old('last_name') }}" class="@error('last_name') is-invalid @enderror">
                                        @error('last_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="tf-grid-layout sm-col-2">
                                        <input type="email" name="email" placeholder="Email Address*" value="{{ old('email') }}" class="@error('email') is-invalid @enderror">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="number" name="phone" placeholder="Phone Number*" value="{{ old('phone') }}" class="@error('phone') is-invalid @enderror">
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <fieldset>
                                        <div class="tf-select">
                                            <select class="w-100" id="shipping-country-form" name="country" data-default="">
                                                @error('country')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <option selected disabled value=""> Choose Country / Region</option>
                                                <option value="Australia"
                                                    data-provinces='[["Australian Capital Territory","Australian Capital Territory"],["New South Wales","New South Wales"],["Northern Territory","Northern Territory"],["Queensland","Queensland"],["South Australia","South Australia"],["Tasmania","Tasmania"],["Victoria","Victoria"],["Western Australia","Western Australia"]]'>
                                                    Australia</option>
                                                <option value="Austria" data-provinces='[]'>Austria</option>
                                                <option value="Belgium" data-provinces='[]'>Belgium</option>
                                                <option value="Canada"
                                                    data-provinces='[["Ontario","Ontario"],["Quebec","Quebec"]]'>
                                                    Canada
                                                </option>
                                                <option value="Czech Republic" data-provinces='[]'>Czechia</option>
                                                <option value="Denmark" data-provinces='[]'>Denmark</option>
                                                <option value="Finland" data-provinces='[]'>Finland</option>
                                                <option value="France" data-provinces='[]'>France</option>
                                                <option value="Germany" data-provinces='[]'>Germany</option>
                                                <option value="United States"
                                                    data-provinces='[["Alabama","Alabama"],["California","California"],["Florida","Florida"]]'>
                                                    United States</option>
                                                <option value="United Kingdom"
                                                    data-provinces='[["England","England"],["Scotland","Scotland"],["Wales","Wales"],["Northern Ireland","Northern Ireland"]]'>
                                                    United Kingdom</option>
                                                <option value="India" data-provinces='[]'>India</option>
                                                <option value="Japan" data-provinces='[]'>Japan</option>
                                                <option value="Mexico" data-provinces='[]'>Mexico</option>
                                                <option value="South Korea" data-provinces='[]'>South Korea</option>
                                                <option value="Spain" data-provinces='[]'>Spain</option>
                                                <option value="Italy" data-provinces='[]'>Italy</option>
                                                <option value="Pakistan"
                                                    data-provinces='[["Punjab","Punjab"],["Sindh","Sindh"],["Balochistan","Balochistan"]]'>
                                                    Pakistan</option>
                                                <option value="Vietnam"
                                                    data-provinces='[["Ha Noi","Ha Noi"],["Da Nang","Da Nang"],["Ho Chi Minh","Ho Chi Minh"]]'>
                                                    Vietnam</option>
                                            </select>
                                        </div>
                                    </fieldset>
                                    <div class="tf-grid-layout sm-col-2">
                                        <input type="text" name="city" placeholder="Town/City*" value="{{ old('city') }}" class="@error('city') is-invalid @enderror">
                                        @error('city')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="text" name="street" placeholder="Street,... (Optional)" value="{{ old('street') }}" class="@error('street') is-invalid @enderror">
                                        @error('street')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="tf-grid-layout sm-col-2">
                                        <div class="tf-select">
                                            <select id="shipping-province-form" name="state" data-default="" value="{{ old('state') }}" class="@error('state') is-invalid @enderror">
                                                <option selected disabled value="">Choose State</option>
                                            </select>
                                        </div>
                                        <input type="number" name="postal_code" placeholder="Postal Code*" value="{{ old('postal_code') }}" class="@error('postal_code') is-invalid @enderror">
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
                                    <div class="payment_accordion type-2">
                                        <label for="credit-card" class="payment_check checkbox-wrap collapsed"
                                            data-bs-toggle="collapse" data-bs-target="#credit-card-payment">
                                            <input type="radio" name="payment-method" class="tf-check-rounded style-2"
                                                id="credit-card" checked>
                                            <span class="pay-title fw-medium lh-24">Credit card</span>
                                        </label>
                                        <div id="credit-card-payment" class="collapse"
                                            data-bs-parent="#payment-method-box">
                                            <div class="payment_body form-content">
                                                <p class="text-payment cl-text-2">
                                                    Make your payment directly into our bank account. Your order
                                                    will not be shipped until the funds have cleared in our account.
                                                </p>
                                                <fieldset>
                                                    <input type="text" placeholder="Name On Card*">
                                                </fieldset>
                                                <fieldset class="ip-card">
                                                    <input type="number" placeholder="Card Numbers*">
                                                    <div class="card-logo d-none d-sm-flex">
                                                        <img width="38" height="24"
                                                            src="assets/images/payment/visa.svg" alt="Payment Logo">
                                                        <img width="38" height="24"
                                                            src="assets/images/payment/master-card.svg"
                                                            alt="Payment Logo">
                                                        <img width="38" height="24"
                                                            src="assets/images/payment/amex.svg" alt="Payment Logo">
                                                        <img width="38" height="24"
                                                            src="assets/images/payment/paypal.svg" alt="Payment Logo">
                                                        <img width="38" height="24"
                                                            src="assets/images/payment/water.svg" alt="Payment Logo">
                                                        <img width="38" height="24"
                                                            src="assets/images/payment/discover.svg" alt="Payment Logo">
                                                    </div>
                                                </fieldset>
                                                <div class="tf-grid-layout sm-col-2">
                                                    <input type="date">
                                                    <input type="number" placeholder="CVV*">
                                                </div>
                                                <div class="checkbox-wrap">
                                                    <input id="save" type="checkbox" class="tf-check style-2">
                                                    <label for="save" class="fw-medium lh-24">
                                                        Save Card Details
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="payment_accordion">
                                        <label for="cash-on" class="payment_check checkbox-wrap collapsed"
                                            data-bs-toggle="collapse" data-bs-target="#cash-on-payment">
                                            <input type="radio" name="payment-method" class="tf-check-rounded style-2"
                                                id="cash-on">
                                            <span class="pay-title fw-medium">Cash On Delivery</span>
                                        </label>
                                        <div id="cash-on-payment" class="collapse" data-bs-parent="#payment-method-box">
                                        </div>
                                    </div>
                                    <div class="payment_accordion">
                                        <label for="apple" class="payment_check checkbox-wrap"
                                            data-bs-toggle="collapse" data-bs-target="apple-payment">
                                            <input type="radio" name="payment-method" class="tf-check-rounded style-2"
                                                id="apple">
                                            <svg width="13" height="17" viewBox="0 0 13 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M6.40781 3.71076C7.30791 3.78688 8.20801 3.25405 8.77057 2.5785C9.32376 1.88392 9.68943 0.951477 9.59567 0C8.7987 0.0380591 7.81422 0.532827 7.25165 1.2274C6.73597 1.82684 6.29529 2.79734 6.40781 3.71076ZM7.48524 4.36638C8.06968 4.13349 8.79323 3.84517 9.5862 3.89149C10.0925 3.92955 11.5552 4.08178 12.4928 5.48997C12.4885 5.49324 12.479 5.49952 12.4648 5.50884C12.2329 5.66192 10.7593 6.63438 10.777 8.55372C10.7946 10.8404 12.6301 11.6931 12.8703 11.8047C12.8859 11.812 12.8948 11.8161 12.896 11.8173C12.8949 11.8204 12.8931 11.8265 12.8903 11.8355C12.8424 11.9928 12.5267 13.0293 11.8083 14.0913C11.1426 15.0808 10.4582 16.0513 9.37055 16.0704C8.85873 16.0797 8.51395 15.9284 8.15493 15.771C7.77735 15.6054 7.38401 15.4329 6.76401 15.4329C6.12175 15.4329 5.71042 15.61 5.31447 15.7805C4.97054 15.9286 4.63821 16.0717 4.17622 16.0894C3.1261 16.1275 2.32914 15.0428 1.66344 14.0532C0.30391 12.0552 -0.736832 8.42051 0.669576 5.9657C1.35403 4.7383 2.60104 3.9676 3.94182 3.94858C4.52677 3.93778 5.08457 4.16266 5.57247 4.35935C5.94482 4.50946 6.27645 4.64315 6.54836 4.64315C6.79066 4.64315 7.10915 4.51624 7.48524 4.36638Z"
                                                    fill="#101010" />
                                            </svg>
                                            <span class="pay-title fw-medium">
                                                Apple Pay
                                            </span>
                                        </label>
                                        <div id="apple-payment" class="collapse" data-bs-parent="#payment-method-box">
                                        </div>
                                    </div>
                                    <div class="payment_accordion">
                                        <label for="paypal" class="payment_check checkbox-wrap collapsed"
                                            data-bs-toggle="collapse" data-bs-target="#paypal-payment">
                                            <input type="radio" name="payment-method" class="tf-check-rounded style-2"
                                                id="paypal">
                                            <span class="pay-title fw-medium">
                                                <img loading="lazy" width="60" height="15"
                                                    src="assets/images/payment/paypal-2.svg" alt="Image">
                                            </span>
                                        </label>
                                        <div id="paypal-payment" class="collapse" data-bs-parent="#payment-method-box">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="tf-btn animate-btn w-100">
                                Pay Now
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 ">
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
                                                alt="Image">
                                        </a>
                                        <div class="infor-prd">
                                            <a href="{{ route('web.product.show', $item->attributes->slug) }}"
                                                class="prd_name fw-medium lh-24 link link-underline">
                                                {{ $item->name }}
                                            </a>
                                            <div class="text-caption-01">
                                                <span class="cl-text-2">
                                                    Color:
                                                </span>
                                                {{ $item->attributes->color }}
                                            </div>
                                            <div class="text-caption-01">
                                                <span class="cl-text-2">
                                                    Size:
                                                </span>
                                                {{ $item->attributes->size }}
                                            </div>
                                        </div>
                                        <div class="">
                                            Quantity: {{ $item->quantity }}
                                        </div>
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
                            <form class="ip-discount-code">
                                <input type="text" placeholder="Add voucher discount" required="">
                                <button class="action tf-btn animate-btn" type="submit">
                                    Apply Code
                                </button>
                            </form>
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
