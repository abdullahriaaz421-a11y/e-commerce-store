@extends('layouts.website')
@section('title', 'Product Details')
@section('content')
    <main id="wrapper">
        <!-- Page Tile Single -->
        <div class="section-page-title-single flat-spacing-3">
            <div class="container">
                <div class="main-page-title">
                    <div class="breadcrumbs">
                        <a href="{{ route('dashboard') }}" class="text-caption-01 cl-text-3 link">Home</a>
                        <i class="icon icon-CaretRightThin cl-text-3"></i>
                        <a href="shop-default.html" class="text-caption-01 cl-text-3 link">Shop</a>
                        <i class="icon icon-CaretRightThin cl-text-3"></i>
                        <p class="text-caption-01">{{ $product->name }}</p>
                    </div>
                    <div class="nav-post-list">
                        <a href="product-detail.html" class="link nav-post-item nav-post-prev">
                            <i class="icon icon-CaretLeft"></i>
                        </a>
                        <a href="shop-default.html" class="link nav-all-post nav-post-link">
                            <i class="icon icon-SquaresFour"></i>
                        </a>
                        <a href="product-detail.html" class="link nav-post-item nav-post-next">
                            <i class="icon icon-CaretRightThin"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Tile Single -->
        <section class="section-product-single tf-main-product section-image-zoom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="tf-product-media-wrap sticky-top">
                            <div class="product-thumbs-slider style-row row_left">
                                <div class="flat-wrap-media-product">
                                    <div
                                        dir="ltr"
                                        class="swiper tf-product-media-main"
                                        id="gallery-swiper-started"
                                        data-spacing="0"
                                    >
                                        <div class="swiper-wrapper">
                                            <!-- item 1 -->
                                            <div class="swiper-slide" data-color="green" data-size="L">
                                                <a
                                                    href="{{ asset('website/assets/images/product/single/detail-1.jpg') }}"
                                                    target="_blank"
                                                    class="item"
                                                    data-pswp-width="576px"
                                                    data-pswp-height="768px"
                                                >
                                                    <img
                                                        loading="lazy"
                                                        width="576"
                                                        height="768"
                                                        class="tf-image-zoom"
                                                        data-zoom="{{ asset('website/assets/images/product/single/detail-1.jpg') }}"
                                                        src="{{ asset('website/assets/images/product/single/detail-1.jpg') }}"
                                                        alt="img-product"
                                                    />
                                                </a>
                                            </div>
                                            <!-- item 2 -->
                                            <div class="swiper-slide" data-color="green" data-size="S">
                                                <a
                                                    href="{{ asset('website/assets/images/product/single/detail-1_2.jpg') }}"
                                                    target="_blank"
                                                    class="item"
                                                    data-pswp-width="576px"
                                                    data-pswp-height="768px"
                                                >
                                                    <img
                                                        loading="lazy"
                                                        width="576"
                                                        height="768"
                                                        class="tf-image-zoom"
                                                        data-zoom="{{ asset('website/assets/images/product/single/detail-1_2.jpg') }}"
                                                        src="{{ asset('website/assets/images/product/single/detail-1_2.jpg') }}"
                                                        alt="img-product"
                                                    />
                                                </a>
                                            </div>
                                            <!-- item 3 -->
                                            <div class="swiper-slide" data-color="green" data-size="M">
                                                <a
                                                    href="{{ asset('website/assets/images/product/single/detail-1_3.jpg') }}"
                                                    target="_blank"
                                                    class="item"
                                                    data-pswp-width="576px"
                                                    data-pswp-height="768px"
                                                >
                                                    <img
                                                        loading="lazy"
                                                        width="576"
                                                        height="768"
                                                        class="tf-image-zoom"
                                                        data-zoom="{{ asset('website/assets/images/product/single/detail-1_3.jpg') }}"
                                                        src="{{ asset('website/assets/images/product/single/detail-1_3.jpg') }}"
                                                        alt="img-product"
                                                    />
                                                </a>
                                            </div>
                                            <!-- item 4 -->
                                            <div class="swiper-slide" data-color="green" data-size="XL">
                                                <a
                                                    href="{{ asset('website/assets/images/product/single/detail-1_4.jpg') }}"
                                                    target="_blank"
                                                    class="item"
                                                    data-pswp-width="576px"
                                                    data-pswp-height="768px"
                                                >
                                                    <img
                                                        loading="lazy"
                                                        width="576"
                                                        height="768"
                                                        class="tf-image-zoom"
                                                        data-zoom="{{ asset('website/assets/images/product/single/detail-1_4.jpg') }}"
                                                        src="{{ asset('website/assets/images/product/single/detail-1_4.jpg') }}"
                                                        alt="img-product"
                                                    />
                                                </a>
                                            </div>
                                            <!-- item 5 -->
                                            <div class="swiper-slide" data-color="gray" data-size="M">
                                                <a
                                                    href="{{ asset('website/assets/images/product/single/detail-1_5.jpg') }}"
                                                    target="_blank"
                                                    class="item"
                                                    data-pswp-width="576px"
                                                    data-pswp-height="768px"
                                                >
                                                    <img
                                                        loading="lazy"
                                                        width="576"
                                                        height="768"
                                                        class="tf-image-zoom"
                                                        data-zoom="{{ asset('website/assets/images/product/single/detail-1_5.jpg') }}"
                                                        src="{{ asset('website/assets/images/product/single/detail-1_5.jpg') }}"
                                                        alt="img-product"
                                                    />
                                                </a>
                                            </div>
                                            <!-- item 6 -->
                                            <div class="swiper-slide" data-color="gray" data-size="M">
                                                <a
                                                    href="{{ asset('website/assets/images/product/single/detail-1_6.jpg') }}"
                                                    target="_blank"
                                                    class="item"
                                                    data-pswp-width="576px"
                                                    data-pswp-height="768px"
                                                >
                                                    <img
                                                        loading="lazy"
                                                        width="576"
                                                        height="768"
                                                        class="tf-image-zoom"
                                                        data-zoom="{{ asset('website/assets/images/product/single/detail-1_6.jpg') }}"
                                                        src="{{ asset('website/assets/images/product/single/detail-1_6.jpg') }}"
                                                        alt="img-product"
                                                    />
                                                </a>
                                            </div>
                                            <!-- item 7 -->
                                            <div class="swiper-slide" data-color="black" data-size="L">
                                                <a
                                                    href="{{ asset('website/assets/images/product/single/detail-1_7.jpg') }}"
                                                    target="_blank"
                                                    class="item"
                                                    data-pswp-width="576px"
                                                    data-pswp-height="768px"
                                                >
                                                    <img
                                                        loading="lazy"
                                                        width="576"
                                                        height="768"
                                                        class="tf-image-zoom"
                                                        data-zoom="{{ asset('website/assets/images/product/single/detail-1_7.jpg') }}"
                                                        src="{{ asset('website/assets/images/product/single/detail-1_7.jpg') }}"
                                                        alt="img-product"
                                                    />
                                                </a>
                                            </div>
                                            <!-- item 8 -->
                                            <div class="swiper-slide" data-color="black" data-size="L">
                                                <a
                                                    href="{{ asset('website/assets/images/product/single/detail-1_8.jpg') }}"
                                                    target="_blank"
                                                    class="item"
                                                    data-pswp-width="576px"
                                                    data-pswp-height="768px"
                                                >
                                                    <img
                                                        loading="lazy"
                                                        width="576"
                                                        height="768"
                                                        class="tf-image-zoom"
                                                        data-zoom="{{ asset('website/assets/images/product/single/detail-1_8.jpg') }}"
                                                        src="{{ asset('website/assets/images/product/single/detail-1_8.jpg') }}"
                                                        alt="img-product"
                                                    />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    dir="ltr"
                                    class="swiper tf-product-media-thumbs other-image-zoom"
                                    data-direction="vertical"
                                    data-preview="7"
                                >
                                    <div class="swiper-wrapper stagger-wrap">
                                        <!-- item 1 -->
                                        <div class="swiper-slide stagger-item">
                                            <div class="item">
                                                <img
                                                    loading="lazy"
                                                    width="82"
                                                    height="110"
                                                    src="{{ asset('website/assets/images/product/single/detail-1.jpg') }}"
                                                    alt="Image"
                                                />
                                            </div>
                                        </div>
                                        <!-- item 2 -->
                                        <div class="swiper-slide stagger-item">
                                            <div class="item">
                                                <img
                                                    loading="lazy"
                                                    width="82"
                                                    height="110"
                                                    src="{{ asset('website/assets/images/product/single/detail-1_2.jpg') }}"
                                                    alt="Image"
                                                />
                                            </div>
                                        </div>
                                        <!-- item 3 -->
                                        <div class="swiper-slide stagger-item">
                                            <div class="item">
                                                <img
                                                    loading="lazy"
                                                    width="82"
                                                    height="110"
                                                    src="{{ asset('website/assets/images/product/single/detail-1_3.jpg') }}"
                                                    alt="Image"
                                                />
                                            </div>
                                        </div>
                                        <!-- item 4 -->
                                        <div class="swiper-slide stagger-item">
                                            <div class="item">
                                                <img
                                                    loading="lazy"
                                                    width="82"
                                                    height="110"
                                                    src="{{ asset('website/assets/images/product/single/detail-1_4.jpg') }}"
                                                    alt="Image"
                                                />
                                            </div>
                                        </div>
                                        <!-- item 5 -->
                                        <div class="swiper-slide stagger-item">
                                            <div class="item">
                                                <img
                                                    loading="lazy"
                                                    width="82"
                                                    height="110"
                                                    src="{{ asset('website/assets/images/product/single/detail-1_5.jpg') }}"
                                                    alt="Image"
                                                />
                                            </div>
                                        </div>
                                        <!-- item 6 -->
                                        <div class="swiper-slide stagger-item">
                                            <div class="item">
                                                <img
                                                    loading="lazy"
                                                    width="82"
                                                    height="110"
                                                    src="{{ asset('website/assets/images/product/single/detail-1_6.jpg') }}"
                                                    alt="Image"
                                                />
                                            </div>
                                        </div>
                                        <!-- item 7 -->
                                        <div class="swiper-slide stagger-item">
                                            <div class="item">
                                                <img
                                                    loading="lazy"
                                                    width="82"
                                                    height="110"
                                                    src="{{ asset('website/assets/images/product/single/detail-1_7.jpg') }}"
                                                    alt="Image"
                                                />
                                            </div>
                                        </div>
                                        <!-- item 8 -->
                                        <div class="swiper-slide stagger-item">
                                            <div class="item">
                                                <img
                                                    loading="lazy"
                                                    width="82"
                                                    height="110"
                                                    src="{{ asset('website/assets/images/product/single/detail-1_8.jpg') }}"
                                                    alt="Image"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tf-product-info-wrap position-relative mt-md-0">
                            <div class="tf-zoom-main sticky-top"></div>
                            <div class="tf-product-info-list other-image-zoom">
                                <div class="tf-product-info-heading">
                                    <p class="product-infor-cate text-caption-01 mb-4">Clothing</p>
                                    <h3 class="product-infor-name mb-12">Lyocell Wrap Top</h3>
                                    <div class="product-infor-meta mb-20">
                                        <div class="meta_rate">
                                            <div class="star-wrap normal d-flex align-items-center">
                                                <i class="icon icon-Star"></i>
                                                <i class="icon icon-Star"></i>
                                                <i class="icon icon-Star"></i>
                                                <i class="icon icon-Star"></i>
                                                <i class="icon icon-Star"></i>
                                            </div>
                                            <span class="text-caption-01 cl-text-2"> (134 reviews) </span>
                                        </div>
                                        <div class="br-line type-vertical"></div>
                                        <div class="meta_sold">
                                            <i class="icon icon-Lightning text-primary"></i>
                                            <span class="text-caption-01 cl-text-2">18 sold in last 32 hours</span>
                                        </div>
                                        <div class="br-line type-vertical"></div>
                                        <div class="meta_prd_code text-caption-01">
                                            <span class="cl-text-2">SKU:</span>
                                            <span>53453412</span>
                                        </div>
                                    </div>
                                    <div class="product-infor-price mb-12">
                                        <h4 class="price-on-sale">$79.99</h4>
                                        <div class="br-line type-vertical"></div>
                                        <p class="cl-text-3 text-decoration-line-through">$98.99</p>
                                        <span class="badge-sale fw-semibold text-caption-02 text-white"> -25% </span>
                                    </div>
                                    <p class="product-infor-desc cl-text-2 mb-12">
                                        The garments labelled as Committed are products that have been produced using
                                        sustainable fibres or processes, reducing their environmental impact.
                                    </p>
                                    <div class="product-infor-reality lh-24">
                                        <div class="ic d-flex">
                                            <svg
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <rect width="24" height="24" rx="4" fill="#101010" />
                                                <path
                                                    d="M19.4569 11.7975C19.435 11.7481 18.9056 10.5738 17.7287 9.39687C16.1606 7.82875 14.18 7 12 7C9.81999 7 7.83937 7.82875 6.27124 9.39687C5.09437 10.5738 4.56249 11.75 4.54312 11.7975C4.51469 11.8614 4.5 11.9306 4.5 12.0006C4.5 12.0706 4.51469 12.1398 4.54312 12.2037C4.56499 12.2531 5.09437 13.4269 6.27124 14.6038C7.83937 16.1713 9.81999 17 12 17C14.18 17 16.1606 16.1713 17.7287 14.6038C18.9056 13.4269 19.435 12.2531 19.4569 12.2037C19.4853 12.1398 19.5 12.0706 19.5 12.0006C19.5 11.9306 19.4853 11.8614 19.4569 11.7975ZM12 14.5C11.5055 14.5 11.0222 14.3534 10.6111 14.0787C10.1999 13.804 9.87951 13.4135 9.69029 12.9567C9.50107 12.4999 9.45157 11.9972 9.54803 11.5123C9.64449 11.0273 9.88259 10.5819 10.2322 10.2322C10.5819 9.8826 11.0273 9.6445 11.5123 9.54804C11.9972 9.45157 12.4999 9.50108 12.9567 9.6903C13.4135 9.87952 13.804 10.2 14.0787 10.6111C14.3534 11.0222 14.5 11.5055 14.5 12C14.5 12.663 14.2366 13.2989 13.7678 13.7678C13.2989 14.2366 12.663 14.5 12 14.5Z"
                                                    fill="white"
                                                />
                                            </svg>
                                        </div>
                                        <span class="text-caption-01"> 28 people are viewing this right now </span>
                                    </div>
                                </div>
                                <div class="br-line"></div>
                                <div class="tf-product-variant">
                                    <div class="variant-picker-item variant-color">
                                        <div class="variant-picker-label">
                                            <div>
                                                Colors:
                                                <span class="variant-picker-label-value value-currentColor text-capitalize fw-medium">Gray</span>
                                            </div>
                                        </div>
                                        <div class="variant-picker-values">
                                            <div
                                                class="hover-tooltip tooltip-bot color-btn style-image active"
                                                data-color="green"
                                            >
                                                <div class="img">
                                                    <img
                                                        loading="lazy"
                                                        width="60"
                                                        height="60"
                                                        src="{{ asset('website/assets/images/product/single/img_square/detail-1_2.jpg') }}"
                                                        data-src="{{ asset('website/assets/images/product/single/img_square/detail-1_2.jpg') }}"
                                                        alt="img"
                                                    />
                                                </div>
                                                <span class="tooltip">Green</span>
                                            </div>
                                            <div
                                                class="hover-tooltip tooltip-bot color-btn style-image"
                                                data-color="gray"
                                            >
                                                <div class="img">
                                                    <img
                                                        loading="lazy"
                                                        width="60"
                                                        height="60"
                                                        src="{{ asset('website/assets/images/product/single/img_square/detail-1_5.jpg') }}"
                                                        data-src="{{ asset('website/assets/images/product/single/img_square/detail-1_5.jpg') }}"
                                                        alt="img"
                                                    />
                                                </div>
                                                <span class="tooltip">Gray</span>
                                            </div>
                                            <div
                                                class="hover-tooltip tooltip-bot color-btn style-image"
                                                data-color="black"
                                            >
                                                <div class="img">
                                                    <img
                                                        loading="lazy"
                                                        width="60"
                                                        height="60"
                                                        src="{{ asset('website/assets/images/product/single/img_square/detail-1_7.jpg') }}"
                                                        data-src="{{ asset('website/assets/images/product/single/img_square/detail-1_7.jpg') }}"
                                                        alt="img"
                                                    />
                                                </div>
                                                <span class="tooltip">Black</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="variant-picker-item variant-size">
                                        <div class="variant-picker-label">
                                            <div>
                                                Size:
                                                <span class="variant-picker-label-value value-currentSize text-capitalize fw-medium">M</span>
                                            </div>
                                            <a
                                                href="#findSize"
                                                data-bs-toggle="modal"
                                                class="tf-btn-line-2 style-primary text-caption-01 fw-semibold"
                                            >
                                                Size Guide
                                            </a>
                                        </div>
                                        <div class="variant-picker-values">
                                            <span class="size-btn" data-size="S" data-price="39.99">S</span>
                                            <span class="size-btn active" data-size="M" data-price="59.99">M</span>
                                            <span class="size-btn" data-size="L" data-price="79.99">L</span>
                                            <span class="size-btn" data-size="XL" data-price="89.99">XL</span>
                                            <span class="size-btn disabled" data-size="XX" data-price="99.99">XXL</span>
                                        </div>
                                    </div>
                                    <div class="tf-product-total-quantity">
                                        <p class="">Quantity:</p>
                                        <div class="group-action">
                                            <div class="wg-quantity">
                                                <button class="btn-quantity btn-decrease">
                                                    <i class="icon icon-minus"></i>
                                                </button>
                                                <input class="quantity-product" type="text" name="number" value="1" />
                                                <button class="btn-quantity btn-increase">
                                                    <i class="icon icon-plus"></i>
                                                </button>
                                            </div>
                                            <a
                                                href="#shoppingCart"
                                                data-bs-toggle="offcanvas"
                                                class="btn-action-price tf-btn type-xl animate-btn w-100"
                                            >
                                                Add To Cart
                                                <span class="d-none d-sm-block d-md-none d-lg-block">&nbsp;-&nbsp;</span>
                                                <span class="price-add d-none d-sm-block d-md-none d-lg-block">$79.99</span>
                                            </a>
                                        </div>
                                        <a href="checkout.html" class="tf-btn type-xl btn-primary animate-btn w-100">
                                            Buy It Now
                                        </a>
                                    </div>
                                </div>
                                <div class="tf-product-extra-link">
                                    <a href="#compare" data-bs-toggle="offcanvas" class="product-extra-icon link">
                                        <i class="icon icon-ArrowsLeftRight"></i>
                                        Compare
                                    </a>
                                    <a href="#ask" data-bs-toggle="modal" class="product-extra-icon link">
                                        <i class="icon icon-Question"></i>
                                        Ask A Question
                                    </a>
                                    <a href="#findSize" data-bs-toggle="modal" class="product-extra-icon link">
                                        <i class="icon icon-Ruler"></i>
                                        Size Guide
                                    </a>
                                    <a href="#share" data-bs-toggle="modal" class="product-extra-icon link">
                                        <i class="icon icon-ShareNetwork"></i>
                                        Share
                                    </a>
                                </div>
                                <div class="br-line"></div>
                                <div class="tf-product-delivery-return">
                                    <div class="product-delivery">
                                        <i class="icon icon-Timer"></i>
                                        <p>
                                            Estimated Delivery:
                                            <span class="fw-semibold"> 12-26 Days </span>
                                            (International),
                                            <span class="fw-semibold"> 3-6 Days </span>
                                            (United States)
                                        </p>
                                    </div>
                                    <div class="product-delivery return">
                                        <i class="icon icon-ArrowClockwise"></i>
                                        <p>
                                            Return within
                                            <span class="fw-semibold"> 45 Days </span>
                                            of purchase. Duties & taxes are non-refundable.
                                        </p>
                                    </div>
                                </div>
                                {{-- <div class="tf-product-trust-seal">
                                        <p class="h6 text-seal">Guranteed Safe Checkout:</p>
                                        <ul class="list-card">
                                            <li class="card-item">
                                                <img width="50" height="32" src="assets/images/payment/visa.svg" alt="card">
                                            </li>
                                            <li class="card-item">
                                                <img width="50" height="32" src="assets/images/payment/master-card.svg"
                                                    alt="card">
                                            </li>
                                            <li class="card-item">
                                                <img width="50" height="32" src="assets/images/payment/amex.svg" alt="card">
                                            </li>
                                            <li class="card-item">
                                                <img width="50" height="32" src="assets/images/payment/paypal.svg"
                                                    alt="card">
                                            </li>
                                            <li class="card-item">
                                                <img width="50" height="32" src="assets/images/payment/water.svg"
                                                    alt="card">
                                            </li>
                                            <li class="card-item">
                                                <img width="50" height="32" src="assets/images/payment/discover.svg"
                                                    alt="card">
                                            </li>
                                        </ul>
                                    </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Product Single -->
        <!-- Relate Product -->
        <div class="flat-spacing flat-animate-tab mt-5 pt-0">
            <div class="container">
                <ul class="tab-btn-wrap-v1 style-2 justify-content-sm-center" role="tablist">
                    <li class="nav-tab-item" role="presentation">
                        <a href="#related" data-bs-toggle="tab" class="tf-btn-tab active" role="tab">
                            <span class="h4 fw-medium">Related Products</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active show" id="related" role="tabpanel">
                        <div
                            dir="ltr"
                            class="swiper tf-swiper wrap-sw-over"
                            data-preview="4"
                            data-tablet="3"
                            data-mobile-sm="2"
                            data-mobile="2"
                            data-space-lg="30"
                            data-space-md="20"
                            data-space="10"
                            data-pagination="2"
                            data-pagination-sm="2"
                            data-pagination-md="3"
                            data-pagination-lg="4"
                        >
                            <div class="swiper-wrapper">
                                @foreach ($relatedProducts as $relatedProduct)
                                    <div class="swiper-slide">
                                        <div class="card-product">
                                            <div class="card-product_wrapper">
                                                {{-- Product Image --}}
                                                <a
                                                    href="{{ route('product-detail', $relatedProduct->slug) }}"
                                                    class="product-img"
                                                >
                                                    @if ($relatedProduct->images->count() > 0)
                                                        <img
                                                            class="img-product"
                                                            loading="lazy"
                                                            width="330"
                                                            height="440"
                                                            src="{{ asset('storage/uploads/' . $relatedProduct->images->first()->image_name) }}"
                                                            alt="{{ $relatedProduct->name }}"
                                                        />

                                                        <img
                                                            class="img-hover"
                                                            loading="lazy"
                                                            width="330"
                                                            height="440"
                                                            src="{{ asset('storage/uploads/' . $relatedProduct->images->first()->image_name) }}"
                                                            alt="{{ $relatedProduct->name }}"
                                                        />
                                                    @endif
                                                </a>

                                                {{-- Product Actions --}}
                                                <ul class="product-action_list">
                                                    <li class="wishlist">
                                                        <a href="#" class="hover-tooltip tooltip-left box-icon">
                                                            <span class="icon icon-heart"></span>
                                                            <span class="tooltip"> Add to Wishlist </span>
                                                        </a>
                                                    </li>
                                                    <li class="compare">
                                                        <a
                                                            href="#compare"
                                                            data-bs-toggle="offcanvas"
                                                            class="hover-tooltip tooltip-left box-icon"
                                                        >
                                                            <span class="icon icon-ArrowsLeftRight"></span>
                                                            <span class="tooltip"> Compare </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="#quickView"
                                                            data-bs-toggle="offcanvas"
                                                            class="hover-tooltip tooltip-left box-icon"
                                                        >
                                                            <span class="icon icon-Eye"></span>
                                                            <span class="tooltip"> Quick view </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                {{-- Badge --}}
                                                <ul class="product-badge_list">
                                                    <li class="product-badge_item text-caption-01 new">NEW</li>
                                                </ul>
                                                {{-- Quick Add --}}
                                                <div class="product-action_bot">
                                                    <a
                                                        href="#quickAdd"
                                                        data-bs-toggle="modal"
                                                        class="tf-btn btn-white small w-100"
                                                    >
                                                        Quick Add
                                                    </a>
                                                </div>
                                            </div>
                                            {{-- Product Information --}}
                                            <div class="card-product_info">
                                                {{-- Product Name --}}
                                                <a
                                                    href="{{ route('product-detail', $relatedProduct->slug) }}"
                                                    class="name-product lh-24 fw-medium link-underline-text"
                                                >
                                                    {{ $relatedProduct->name }}
                                                </a>
                                                {{-- Rating --}}
                                                <div class="star-wrap d-flex align-items-center">
                                                    <i class="icon icon-Star"></i>
                                                    <i class="icon icon-Star"></i>
                                                    <i class="icon icon-Star"></i>
                                                    <i class="icon icon-Star"></i>
                                                    <i class="icon icon-Star"></i>
                                                </div>
                                                {{-- Price --}}
                                                <div class="price-wrap">
                                                    @if ($relatedProduct->sale_price)
                                                        <span class="price-new text-primary fw-semibold">
                                                            ${{ $relatedProduct->sale_price }}
                                                        </span>
                                                        <span class="price-old text-caption-01 cl-text-3">
                                                            ${{ $relatedProduct->price }}
                                                        </span>
                                                    @else
                                                        <span class="price-new text-primary fw-semibold">
                                                            ${{ $relatedProduct->price }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="sw-line-default style-2 tf-sw-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Relate Product -->
    </main>

@endsection
