@extends('layouts.website');
@section('title', 'Thank you');
@section('content')
    <!-- Page Title -->
    <div class="flat-spacing pb-0">
        <div class="container">
            <div class="title-success-order text-center">
                <span class="icon icon-CheckCircle d-block"></span>
                <div class="box-title">
                    <h2 class="title letter-space-1">Thank you for your order!</h2>
                    <p class="cl-text-2">You are awesome, Amerce! Thank you so much for your purchase.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Title -->
    <!-- Cart Thank -->`
    <div class="flat-spacing">
        <div class="container">
            <div class="row gy-30">
                <div class="col-xl-8">
                    <div class="tf-main-success">
                        <div class="box-progress-order">
                            <div class="order-progress-item order-code text-center">
                                <div class="title text-caption-01 fw-semibold">Order number</div>
                                <div class="fw-medium code">#{{ $order->order_number }}</div>
                            </div>
                            <div class="order-progress-item order-date text-center">
                                <div class="title text-caption-01 fw-semibold">Order date</div>
                                <div class="fw-medium date">{{ $order->created_at->format('d F Y') }}</div>
                            </div>
                            <div class="order-progress-item order-total text-center">
                                <div class="title text-caption-01 fw-semibold">Order total</div>
                                <div class="fw-medium total">{{ number_format($order->total_price, 2) }}</div>
                            </div>
                            <div class="order-progress-item payment-method text-center">
                                <div class="title text-caption-01 fw-semibold">Payment method</div>
                                <div class="fw-medium metod">Direct bank transfer</div>
                            </div>
                        </div>
                        <div class="box-timeline-order">
                            <div class="timeline-item active text-center">
                                <div class="box-icon">
                                    <span class="icon icon-Confirm"></span>
                                </div>
                                <div class="content">
                                    <div class="title fw-medium">Confirmed</div>
                                    <span class="date fw-medium text-caption-01 cl-text-2">{{ $order->created_at->format('d F Y') }}</span>
                                </div>
                            </div>
                            <div class="line-time"></div>
                            <div class="timeline-item text-center">
                                <div class="box-icon">
                                    <span class="icon icon-Shipped"></span>
                                </div>
                                <div class="content">
                                    <div class="title fw-medium">Shipped</div>
                                    <span class="date fw-medium text-caption-01 cl-text-2">20 April 2026</span>
                                </div>
                            </div>
                            <div class="line-time"></div>
                            <div class="timeline-item text-center">
                                <div class="box-icon">
                                    <span class="icon icon-Location"></span>
                                </div>
                                <div class="content">
                                    <div class="title fw-medium">Delivered</div>
                                    <span class="date fw-medium text-caption-01 cl-text-2">22 April 2026</span>
                                </div>
                            </div>
                        </div>
                        <div class="map-order">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27294.62418958524!2d151.25730233429948!3d-33.82005608618041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12ab8bc95a137f%3A0x358f04a7f6f5f6a6!2sGrotto%20Point%20Lighthouse!5e0!3m2!1sen!2s!4v1733976867160!5m2!1sen!2s"
                                width="100%" height="499" style="border:none;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="box-ship-address">
                            <div class="row justify-content-between">
                                <div class="col-12 col-sm-5">
                                    <div class="ship-address-item">
                                        <div class="text-body-1 fw-medium title">Shipping address</div>
                                        <ul class="list-address">
                                        <li class="text-caption-01 cl-text-2">
                                            {{ $order->fname }} {{ $order->lname }}
                                        </li>

                                        <li class="text-caption-01 cl-text-2">
                                            {{ $order->street }}
                                        </li>

                                        <li class="text-caption-01 cl-text-2">
                                            {{ $order->city }}, {{ $order->state }}
                                        </li>

                                        <li class="text-caption-01 cl-text-2">
                                            {{ $order->country }}
                                        </li>

                                        <li class="text-caption-01 cl-text-2">
                                            {{ $order->postal_code }}
                                        </li>

                                        <li class="text-caption-01 cl-text-2">
                                            {{ $order->email }}
                                        </li>

                                        <li class="text-caption-01 cl-text-2">
                                            {{ $order->phone }}
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-5">
                                    <div class="ship-address-item billing mb-0">
                                        <div class="text-body-1 fw-medium title">Billing address</div>
                                        <ul class="list-address">
                                            <li class="text-caption-01 cl-text-2">Amerce Tran</li>
                                            <li class="text-caption-01 cl-text-2">1 Davic st</li>
                                            <li class="text-caption-01 cl-text-2">Alabama</li>
                                            <li class="text-caption-01 cl-text-2">United State</li>
                                            <li class="text-caption-01 cl-text-2">5000</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fl-order-testimonial">
                            <div dir="ltr" class="swiper tf-swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="box-order-tes text-center">
                                            <span class="icon icon-Quote"></span>
                                            <div class="content">
                                                <div class="title text-uppercase fw-semibold">HAPPY CUSTOMERS
                                                </div>
                                                <p class="note h6 cl-text-2">"I’ve never felt more confident in
                                                    my wardrobe! Every piece I’ve bought from here is high-quality,
                                                    trendy, and fits perfectly. The entire shopping experience has
                                                    been seamless from start to finish. Thank you for making fashion
                                                    so easy!"</p>
                                            </div>
                                            <span class="author font-2 fw-semibold">Amer P</span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="box-order-tes text-center">
                                            <span class="icon icon-Quote"></span>
                                            <div class="content">
                                                <div class="title text-uppercase fw-semibold">HAPPY CUSTOMERS
                                                </div>
                                                <p class="note h6 cl-text-2">
                                                    I’ve never been happier with my wardrobe! Every piece I’ve
                                                    bought is stylish, high-quality, and fits like a glove. The
                                                    shopping process is so smooth and stress-free from beginning to
                                                    end. Truly makes fashion effortless and fun!
                                                </p>
                                            </div>
                                            <span class="author font-2 fw-semibold">Mas P</span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="box-order-tes text-center">
                                            <span class="icon icon-Quote"></span>
                                            <div class="content">
                                                <div class="title text-uppercase fw-semibold">HAPPY CUSTOMERS
                                                </div>
                                                <p class="note h6 cl-text-2">
                                                    Shopping here has completely transformed my style! Every item
                                                    I’ve received is beautiful, well-made, and fits me perfectly.
                                                    From browsing to delivery, the entire process was quick and
                                                    easy. I finally enjoy getting dressed every day!
                                                </p>
                                            </div>
                                            <span class="author font-2 fw-semibold">Xiu P</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sw-dot-default tf-sw-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="tf-page-cart-sidebar sidebar-order-success">
                        <div class="cart-box order-box">
                            <div class="title text-body-1 fw-medium">Order Details</div>
                            <ul class="list-order-product">
                                @foreach ($orderDetails as $detail)
                                    <li class="order-item fw-medium">
                                        <a href="#" class="img-prd">
                                            @if ($detail->images)
                                                <img
                                                    loading="lazy"
                                                    width="100"
                                                    height="133"
                                                    src="{{ asset('storage/uploads/' . $detail->images->first()->image_name) }}"
                                                    alt="{{ $detail->product->name }}"
                                                >
                                            @endif
                                        </a>
                                        <div class="infor-prd">
                                            <a href="#"
                                            class="prd_name fw-medium lh-24 link link-underline">
                                                {{ $detail->product->name }}
                                            </a>
                                            <div class="text-caption-01">
                                                <span class="cl-text-2">
                                                    Quantity:
                                                </span>
                                                {{ $detail->qty }}
                                            </div>
                                            <div class="text-caption-01">
                                                <span class="cl-text-2">
                                                    Price:
                                                </span>
                                                Rs. {{ number_format($detail->product->price, 2) }}
                                            </div>
                                        </div>
                                        <div class="quantity-price text-primary">
                                            Rs. {{ number_format($detail->total_price, 2) }}
                                        </div>
                                    </li>
                                @endforeach
                                {{-- <li class="order-item fw-medium">
                                    <a href="#" class="img-prd">
                                        <img loading="lazy" width="100" height="133"
                                            src="assets/images/product/product-6.jpg" alt="Image">
                                    </a>
                                    <div class="infor-prd">
                                        <a href="#" class="prd_name fw-medium lh-24 link link-underline">
                                            Oval shoulder bag
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
                                        $69.99
                                    </div>
                                </li>
                                <li class="order-item fw-medium">
                                    <a href="#" class="img-prd">
                                        <img loading="lazy" width="100" height="133"
                                            src="assets/images/product/product-8.jpg" alt="Image">
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
                                        $49.99
                                    </div>
                                </li> --}}
                            </ul>
                            <ul class="list-total">
                                <li class="total-item lh-24 fw-medium d-flex justify-content-between">
                                    <span>Subtotal:</span>
                                    <span class="price-sub fw-medium">{{ $order->total_price }}</span>
                                </li>
                                <li class="total-item lh-24 fw-medium d-flex justify-content-between">
                                    <span>Discount:</span>
                                    <span class="price-discount fw-medium">-Rs.00.00 </span>
                                </li>
                                <li class="total-item lh-24 fw-medium d-flex justify-content-between">
                                    <span>Shipping:</span>
                                    <span class="price-ship fw-medium">Rs.300.00</span>
                                </li>
                                <li class="total-item lh-24 fw-medium d-flex justify-content-between">
                                    <span>Tax:</span>
                                    <span class="price-tax fw-medium">Rs.00.00</span>
                                </li>
                            </ul>
                            <div class="subtotal text-body-1 fw-medium d-flex justify-content-between">
                                <span>Subtotal:</span>
                                <span class="total-price-order">{{ $order->total_price }}</span>
                            </div>
                        </div>
                        <div class="cart-box">

                            <form class="feedback-box">
                                <h6 class="title">Give us a feedback</h6>
                                <p class="text cl-text-2 text-caption-01">
                                    Let us know what you think about the
                                    shopping experience, and get a gift coupon for the next shopping.
                                </p>
                                <div class="form-content gap-16 mb-16">
                                    <fieldset class="tf-field">
                                        <label for="fb_Name" class="tf-lable text-caption-01">Name <span
                                                class="text-primary">*</span></label>
                                        <input type="text" id="fb_Name" placeholder="Name" required="">
                                    </fieldset>
                                    <fieldset class="tf-field">
                                        <label for="fb_Email" class="tf-lable text-caption-01">Email <span
                                                class="text-primary">*</span></label>
                                        <input type="text" id="fb_Email" placeholder="Email" required="">
                                    </fieldset>
                                    <div class="box-exp">
                                        <p class="mb-6 cl-text-2 text-caption-01">How was your experience?</p>
                                        <div class="list-exp">
                                            <label for="exp1" class="check-exp">
                                                <input type="radio" id="exp1" checked
                                                    class="tf-check-rounded style-small" name="checkExperience">
                                                <span class="text-exp">1</span>
                                            </label>
                                            <label for="exp2" class="check-exp">
                                                <input type="radio" id="exp2" class="tf-check-rounded style-small"
                                                    name="checkExperience">
                                                <span class="text-exp">2</span>
                                            </label>
                                            <label for="exp3" class="check-exp">
                                                <input type="radio" id="exp3" class="tf-check-rounded style-small"
                                                    name="checkExperience">
                                                <span class="text-exp">3</span>
                                            </label>
                                            <label for="exp4" class="check-exp">
                                                <input type="radio" id="exp4" class="tf-check-rounded style-small"
                                                    name="checkExperience">
                                                <span class="text-exp">4</span>
                                            </label>
                                            <label for="exp5" class="check-exp">
                                                <input type="radio" id="exp5" class="tf-check-rounded style-small"
                                                    name="checkExperience">
                                                <span class="text-exp">5</span>
                                            </label>
                                        </div>
                                    </div>
                                    <fieldset class="tf-field">
                                        <label for="fb_Area" class="tf-lable text-caption-01">Share your exprience
                                            <span class="text-primary">*</span></label>
                                        <textarea name="" id="fb_Area" placeholder="Share your exprience"></textarea>
                                    </fieldset>
                                </div>
                                <button type="submit" class="tf-btn w-100 animate-btn">
                                    <span class="fw-semibold">
                                        SEND
                                    </span>
                                </button>
                            </form>
                            <div class="box-share-social">
                                <h6 class="title">Share the love</h6>
                                <ul class="tf-social-icon-2">
                                    <li>
                                        <a href="https://www.facebook.com/" target="_blank">
                                            <i class="icon icon-FacebookLogo"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://x.com/" target="_blank">
                                            <i class="icon icon-XLogo"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/" target="_blank">
                                            <i class="icon icon-InstagramLogo"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.tiktok.com/" target="_blank">
                                            <i class="icon icon-TiktokLogo"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.snapchat.com/" target="_blank">
                                            <i class="icon icon-SnapchatLogo"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Cart Thank -->
@endsection
