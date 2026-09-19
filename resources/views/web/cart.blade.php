@extends('layouts.website');
@section('title', 'Cart');
@section('content')
    <main id="wrapper">
        <!-- Page Title -->
        <section class="section-page-title text-center flat-spacing-2 pb-0">
            <div class="container">
                <div class="main-page-title">
                    <div class="breadcrumbs">
                        <a href="{{ route('web.home') }}" class="text-caption-01 cl-text-3 link">Home</a>
                        <i class="icon icon-CaretRightThin cl-text-3"></i>
                        <P class="text-caption-01">
                            Shopping Cart
                        </P>
                    </div>
                    <h3>
                        Shopping Cart
                    </h3>
                    <p class="text-body-1 cl-text-2">
                        Review your selected items, update quantities, and get ready for a smooth and
                        <br class="d-none d-lg-block">
                        easy checkout experience.
                    </p>
                </div>
            </div>
        </section>
        <!-- /Page Title -->
        <!-- Shopping Cart -->
        <section class="section-shoping-cart each-list-prd flat-spacing-2 pb-0">
            <div class="flat-spacing-2 pt-0">
                <div class="container">
                    <div class="tf-cart-notification">
                        <div class="count-text">
                            <div class="ic">
                                🔥
                            </div>
                            <div class="">
                                Your cart will expire in&nbsp;
                                <div class="js-countdown time-count cd-has-zero cd-no" data-timer="288"
                                    data-labels=":,:,:,">
                                </div>
                                &nbsp;minutes! Please checkout now before your items sell out!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <form class="form-shop-cart" action="{{ route('web.cart.update') }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="overflow-auto">
                                <table class="tf-table-page-cart">
                                    <thead>
                                        <tr>
                                            <th>
                                                <p class="h6 fw-medium">Products</p>
                                            </th>
                                            <th>
                                                <p class="h6 fw-medium">Price</p>
                                            </th>
                                            <th>
                                                <p class="h6 fw-medium">Quantity</p>
                                            </th>
                                            <th class="text-end">
                                                <p class="h6 fw-medium">Total Price</p>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $items = Cart::getContent();
                                            // dd($items); 
                                        @endphp

                                        @forelse ($items as $item)    
                                            <tr class="tf-cart_item each-prd file-delete">
                                                <td class="cart_product">
                                                    <a href="#" class="img-prd">
                                                        <img loading="lazy" width="100" height="133"
                                                            src="{{ asset('storage/uploads/' . $item->attributes->image) }}" alt="Image">
                                                    </a>
                                                    <div class="infor-prd">
                                                        <a href="{{ route('web.product.show', $item->attributes->slug) }}" class="prd_name fw-medium link lh-24">
                                                            {{ $item->name }}
                                                        </a>
                                                        <div class="prd_select text-caption-01">
                                                            <span class="type-text cl-text-3">
                                                                Color:&nbsp;
                                                            </span>
                                                            <div class="type-select">
                                                                <select class="bg-white">
                                                                    <option selected="selected">{{ $item->attributes->color }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="prd_select text-caption-01">
                                                            <span class="type-text cl-text-3">
                                                                Size:&nbsp;
                                                            </span>
                                                            <div class="type-select">
                                                                <select class="bg-white">
                                                                    <option selected="selected">{{ $item->attributes->size }}</option>
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                        {{-- Remove --}}
                                                        
                                                            <a href="{{ route('web.cart.remove', $item->id) }}" class=" tf-btn-line-3 type-primary ">
                                                            {{-- <a href="{{ route('web.cart.remove', $item->id) }}" class="cart_remove tf-btn-line-3 type-primary remove"> --}}
                                                                <span class="text-caption-01 fw-semibold">
                                                                    Remove
                                                                </span>
                                                            </a>
                                                        
                                                    </div>
                                                </td>
                                                <td class="cart_price each-price fw-semibold text-primary"
                                                    data-cart-title="Price">
                                                    {{ number_format($item->price, 2) }}
                                                </td>
                                                <td class="cart_quantity" data-cart-title="Quantity">
                                                    <div class="wg-quantity">
                                                        <button type="button" class="btn-quantity minus-quantity">
                                                            <i class="icon icon-minus"></i>
                                                        </button>
                                                        <input class="quantity-product" type="text" name="quantity[{{ $item->id }}]" value="{{ $item->quantity }}">
                                                        <button type="button" class="btn-quantity plus-quantity">
                                                            <i class="icon icon-plus"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="cart_total fw-semibold text-primary each-subtotal-price">
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">
                                                    <p class="h6 fw-medium">Your cart is empty.</p>
                                                </td>
                                            </tr>
                                        @endforelse      
                                        
                                    </tbody>
                                    
                                </table>
                                <button type="submit" class="btn btn-dark mt-2 rounded-5 fw-bold p-3 pl-2 pr-2">
                                    Update Cart
                                </button>
                            </div>
                            <div class="ip-discount-code">
                                <input type="text" placeholder="Add voucher discount" >
                                <button class="tf-btn animate-btn" type="submit">
                                    Apply Code
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="fl-sidebar-cart mt-lg-0 sticky-top">
                            <div class="box-order-summary ">
                                {{-- <div class="notification-progress">
                                    <p>
                                        Buy
                                        <span class="text-primary fw-bold">$70.00</span>
                                        more to get freeship
                                    </p>
                                    <div class="progress-cart">
                                        <div class="value" style="width: 50%;" data-progress="50">
                                            <span class="round"></span>
                                        </div>
                                    </div>
                                </div> --}}
                                <h5 class="title mb-20">Order Summary</h5>
                                <div class="subtotal d-flex justify-content-between align-items-center">
                                    <p class="fw-medium lh-24">Subtotal</p>
                                    <span class="total fw-medium lh-24">{{ Cart::getSubTotal() }}</span>
                                </div>
                                {{-- <div class="discount d-flex justify-content-between align-items-center">
                                    <p class="fw-medium lh-24">Discounts</p>
                                    <span class="total fw-medium lh-24">-$80.00</span>
                                </div> --}}
                                <div class="ship">
                                    <p class="fw-medium lh-24">Shipping</p>
                                    <div class="box-check-payment flex-grow-1">
                                        <fieldset class="ship-item">
                                            {{-- <input type="radio" name="ship-check" class="tf-check-rounded" id="free"
                                                checked=""> --}}
                                            <label for="free">
                                                <span>Shipping Charges</span>
                                                <span class="price">Rs.300.00</span>
                                            </label>
                                        </fieldset>
                                        {{-- <fieldset class="ship-item">
                                            <input type="radio" name="ship-check" class="tf-check-rounded" id="local">
                                            <label for="local">
                                                <span>Local:</span>
                                                <span class="price">$35.00</span>
                                            </label>
                                        </fieldset>
                                        <fieldset class="ship-item">
                                            <input type="radio" name="ship-check" class="tf-check-rounded" id="rate">
                                            <label for="rate">
                                                <span>Flat Rate:</span>
                                                <span class="price">$35.00</span>
                                            </label>
                                        </fieldset> --}}
                                    </div>
                                </div>
                                <h5 class="total-order d-flex justify-content-between align-items-center">
                                    <span>Total</span>
                                    <span class="total ">{{ number_format(Cart::getSubTotal() + 300, 2) }}</span>
                                    {{-- <span class="total each-total-price">{{}}</span> --}}
                                </h5>
                                <fieldset class="checkbox-wrap check-agree">
                                    <input type="checkbox" name="agree" class="tf-check-rounded" id="checkOutAgree">
                                    <label for="checkOutAgree">
                                        I agree with the
                                        <a href="#" class="fw-medium text-decoration-underline link">
                                            terms and conditions
                                        </a>
                                    </label>
                                </fieldset>
                                <div class="list-ver text-center">
                                    <a href="{{ route('web.checkout') }}" type="submit" id="checkout-btn"
                                        class="action-checkout tf-btn w-100 animate-btn">
                                        <span class="fw-semibold">
                                            Process To Checkout
                                        </span>
                                    </a>
                                    <a href="{{ route('web.home') }}" class="link-underline link">
                                        <span class="fw-semibold ">Or Continue Shopping</span>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Shopping Cart -->
        <!-- May Be -->
        {{-- <section class="flat-spacing">
            <div class="container">
                <div class="sect-heading">
                    <h4>You may be interested in…</h4>
                </div>
                <div dir="ltr" class="swiper tf-swiper wrap-sw-over" data-preview="4" data-tablet="3" data-mobile-sm="2"
                    data-mobile="2" data-space-lg="30" data-space-md="20" data-space="10" data-pagination="2"
                    data-pagination-sm="2" data-pagination-md="3" data-pagination-lg="4">
                    <div class="swiper-wrapper">
                        <!-- slide 1 -->
                        <div class="swiper-slide">
                            <div class="card-product">
                                <div class="card-product_wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="img-product" loading="lazy" width="330" height="440"
                                            src="assets/images/product/product-1.jpg" alt="Product">
                                        <img class="img-hover" loading="lazy" width="330" height="440"
                                            src="assets/images/product/product-1_2.jpg" alt="Product">
                                    </a>
                                    <ul class="product-action_list">
                                        <li class="wishlist">
                                            <a href="#;" class="hover-tooltip tooltip-left box-icon">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                            </a>
                                        </li>
                                        <li class="compare">
                                            <a href="#compare" data-bs-toggle="offcanvas"
                                                class="hover-tooltip tooltip-left box-icon">
                                                <span class="icon icon-ArrowsLeftRight"></span>
                                                <span class="tooltip">Compare</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#quickView" data-bs-toggle="offcanvas"
                                                class="hover-tooltip tooltip-left box-icon">
                                                <span class="icon icon-Eye"></span>
                                                <span class="tooltip">Quick view</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="product-badge_list">
                                        <li class="product-badge_item text-caption-01 new">NEW</li>
                                    </ul>
                                    <div class="product-action_bot">
                                        <a href="#quickAdd" data-bs-toggle="modal"
                                            class="tf-btn btn-white small  w-100">
                                            Quick Add

                                        </a>
                                    </div>
                                    <div class="product-marquee_sale">
                                        <div class="marquee-wrapper">
                                            <div class="initial-child-container">
                                                <!-- 1 -->
                                                <div class="marquee-child-item">
                                                    HOT SALE 25% OFF
                                                </div>
                                                <i class="icon icon-Star2"></i>
                                                <!-- 2 -->
                                                <div class="marquee-child-item">
                                                    HOT SALE 25% OFF
                                                </div>
                                                <i class="icon icon-Star2"></i>
                                                <!-- 3 -->
                                                <div class="marquee-child-item">
                                                    HOT SALE 25% OFF
                                                </div>
                                                <i class="icon icon-Star2"></i>
                                                <!-- 4 -->
                                                <div class="marquee-child-item">
                                                    HOT SALE 25% OFF
                                                </div>
                                                <i class="icon icon-Star2"></i>
                                                <!-- 5 -->
                                                <div class="marquee-child-item">
                                                    HOT SALE 25% OFF
                                                </div>
                                                <i class="icon icon-Star2"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-product_info">
                                    <a href="product-detail.html"
                                        class="name-product lh-24 fw-medium link-underline-text">
                                        Lyocell wrap top
                                    </a>
                                    <div class="star-wrap d-flex align-items-center">
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                    </div>
                                    <div class="price-wrap">
                                        <span class="price-new text-primary fw-semibold">$69,99</span>
                                        <span class="price-old text-caption-01 cl-text-3">$99,99</span>
                                    </div>
                                    <ul class="product-color_list">
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot active">
                                            <span class="tooltip color-filter">Brown</span>
                                            <span class="swatch-value bg-warm-beige"></span>
                                            <img src="assets/images/product/product-1.jpg"
                                                data-src="assets/images/product/product-1.jpg" alt="Image">
                                        </li>
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot">
                                            <span class="tooltip color-filter">Dark Blue</span>
                                            <span class="swatch-value bg-midnight-blue"></span>
                                            <img src="assets/images/product/product-1_3.jpg"
                                                data-src="assets/images/product/product-1_3.jpg" alt="Image">
                                        </li>
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot">
                                            <span class="tooltip color-filter">White</span>
                                            <span class="swatch-value bg-white"></span>
                                            <img src="assets/images/product/product-1_4.jpg"
                                                data-src="assets/images/product/product-1_4.jpg" alt="Image">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- slide 2 -->
                        <div class="swiper-slide">
                            <div class="card-product">
                                <div class="card-product_wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="img-product" loading="lazy" width="330" height="440"
                                            src="assets/images/product/product-2.jpg" alt="Product">
                                        <img class="img-hover" loading="lazy" width="330" height="440"
                                            src="assets/images/product/product-2_2.jpg" alt="Product">
                                    </a>
                                    <ul class="product-action_list">
                                        <li class="wishlist">
                                            <a href="#;" class="hover-tooltip tooltip-left box-icon">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                            </a>
                                        </li>
                                        <li class="compare">
                                            <a href="#compare" data-bs-toggle="offcanvas"
                                                class="hover-tooltip tooltip-left box-icon">
                                                <span class="icon icon-ArrowsLeftRight"></span>
                                                <span class="tooltip">Compare</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#quickView" data-bs-toggle="offcanvas"
                                                class="hover-tooltip tooltip-left box-icon">
                                                <span class="icon icon-Eye"></span>
                                                <span class="tooltip">Quick view</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="product-badge_list">
                                        <li class="product-badge_item text-caption-01 sale">-25%</li>
                                    </ul>
                                    <div class="product-action_bot">
                                        <a href="#quickAdd" data-bs-toggle="modal"
                                            class="tf-btn btn-white small  w-100">
                                            Quick Add

                                        </a>
                                    </div>
                                </div>
                                <div class="card-product_info">
                                    <a href="product-detail.html"
                                        class="name-product lh-24 fw-medium link-underline-text">
                                        Buttons cotton top
                                    </a>
                                    <div class="star-wrap d-flex align-items-center">
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                    </div>
                                    <div class="price-wrap">
                                        <span class="price-new text-primary fw-semibold">$29,99</span>
                                        <span class="price-old text-caption-01 cl-text-3">$49,99</span>
                                    </div>
                                    <ul class="product-color_list">
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot active">
                                            <span class="tooltip color-filter">Brown</span>
                                            <span class="swatch-value bg-warm-brown"></span>
                                            <img src="assets/images/product/product-2.jpg"
                                                data-src="assets/images/product/product-2.jpg" alt="Image">
                                        </li>
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot">
                                            <span class="tooltip color-filter">Beige</span>
                                            <span class="swatch-value bg-beige"></span>
                                            <img src="assets/images/product/product-2_3.jpg"
                                                data-src="assets/images/product/product-2_3.jpg" alt="Image">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- slide 3 -->
                        <div class="swiper-slide">
                            <div class="card-product has-size">
                                <div class="card-product_wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="img-product" loading="lazy" width="330" height="440"
                                            src="assets/images/product/product-3.jpg" alt="Product">
                                        <img class="img-hover" loading="lazy" width="330" height="440"
                                            src="assets/images/product/product-3_2.jpg" alt="Product">
                                    </a>
                                    <ul class="product-action_list">
                                        <li class="wishlist">
                                            <a href="#;" class="hover-tooltip tooltip-left box-icon">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                            </a>
                                        </li>
                                        <li class="compare">
                                            <a href="#compare" data-bs-toggle="offcanvas"
                                                class="hover-tooltip tooltip-left box-icon">
                                                <span class="icon icon-ArrowsLeftRight"></span>
                                                <span class="tooltip">Compare</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#quickView" data-bs-toggle="offcanvas"
                                                class="hover-tooltip tooltip-left box-icon">
                                                <span class="icon icon-Eye"></span>
                                                <span class="tooltip">Quick view</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="product-badge_list">
                                        <li class="product-badge_item text-caption-01 sale">-25%</li>
                                    </ul>
                                    <div class="product-action_bot">
                                        <a href="#quickAdd" data-bs-toggle="modal"
                                            class="tf-btn btn-white small  w-100">
                                            Quick Add

                                        </a>
                                    </div>
                                    <div class="variant-box">
                                        <ul class="product-size_list">
                                            <li class="size-item text-caption-01">XS</li>
                                            <li class="size-item text-caption-01">S</li>
                                            <li class="size-item text-caption-01">M</li>
                                            <li class="size-item text-caption-01">L</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-product_info">
                                    <a href="product-detail.html"
                                        class="name-product lh-24 fw-medium link-underline-text">
                                        Wool Midi Coat
                                    </a>
                                    <div class="star-wrap d-flex align-items-center">
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                    </div>
                                    <div class="price-wrap">
                                        <span class="price-new text-primary fw-semibold">$15,99</span>
                                        <span class="price-old text-caption-01 cl-text-3">$25,99</span>
                                    </div>
                                    <ul class="product-color_list">
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot active">
                                            <span class="tooltip color-filter">Brown</span>
                                            <span class="swatch-value bg-olive-brown"></span>
                                            <img src="assets/images/product/product-3.jpg"
                                                data-src="assets/images/product/product-3.jpg" alt="Image">
                                        </li>
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot">
                                            <span class="tooltip color-filter">Blue</span>
                                            <span class="swatch-value bg-dark-blue"></span>
                                            <img src="assets/images/product/product-3_3.jpg"
                                                data-src="assets/images/product/product-3_3.jpg" alt="Image">
                                        </li>
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot">
                                            <span class="tooltip color-filter">Light</span>
                                            <span class="swatch-value bg-warm-beige"></span>
                                            <img src="assets/images/product/product-3_4.jpg"
                                                data-src="assets/images/product/product-3_4.jpg" alt="Image">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- slide 4 -->
                        <div class="swiper-slide">
                            <div class="card-product">
                                <div class="card-product_wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="img-product" loading="lazy" width="330" height="440"
                                            src="assets/images/product/product-4.jpg" alt="Product">
                                        <img class="img-hover" loading="lazy" width="330" height="440"
                                            src="assets/images/product/product-4_2.jpg" alt="Product">
                                    </a>
                                    <ul class="product-action_list">
                                        <li class="wishlist">
                                            <a href="#;" class="hover-tooltip tooltip-left box-icon">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                            </a>
                                        </li>
                                        <li class="compare">
                                            <a href="#compare" data-bs-toggle="offcanvas"
                                                class="hover-tooltip tooltip-left box-icon">
                                                <span class="icon icon-ArrowsLeftRight"></span>
                                                <span class="tooltip">Compare</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#quickView" data-bs-toggle="offcanvas"
                                                class="hover-tooltip tooltip-left box-icon">
                                                <span class="icon icon-Eye"></span>
                                                <span class="tooltip">Quick view</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="product-action_bot">
                                        <a href="#quickAdd" data-bs-toggle="modal"
                                            class="tf-btn btn-white small  w-100">
                                            Quick Add

                                        </a>
                                    </div>
                                    <div class="product-countdown">
                                        <div class="js-countdown cd-has-zero" data-timer="1093120"
                                            data-labels="D : ,H : ,M : ,S">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-product_info">
                                    <a href="product-detail.html"
                                        class="name-product lh-24 fw-medium link-underline-text">
                                        linen slim-fit shirt
                                    </a>
                                    <div class="star-wrap d-flex align-items-center">
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                    </div>
                                    <div class="price-wrap">
                                        <span class="price-new text-primary fw-semibold">$45,99</span>
                                        <span class="price-old text-caption-01 cl-text-3">$79,99</span>
                                    </div>
                                    <ul class="product-color_list">
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot active">
                                            <span class="tooltip color-filter">Blue</span>
                                            <span class="swatch-value bg-dark-blue-2"></span>
                                            <img src="assets/images/product/product-4.jpg"
                                                data-src="assets/images/product/product-4.jpg" alt="Image">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sw-line-default style-2 tf-sw-pagination"></div>
                </div>
            </div>
        </section> --}}
        <!-- /May Be -->
    </main>
@endsection