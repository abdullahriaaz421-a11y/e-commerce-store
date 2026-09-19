@extends('layouts.website')
@section('title', 'Home')
@section('content')
    <main id="wrapper">
        <!-- Slide Show -->
        <div class="tf-slideshow tf-btn-swiper-main hover-sw-nav">
            <div
                dir="ltr"
                class="swiper tf-swiper sw-slide-show slider_effect_fade"
                data-loop="true"
                data-effect="fade"
                data-delay="3000"
            >
                <!-- data-auto="true" -->
                <div class="swiper-wrapper">
                    <!-- item 1 -->
                    <div class="swiper-slide">
                        <div class="slideshow-wrap">
                            <div class="sld_image">
                                <img
                                    loading="lazy"
                                    width="1920"
                                    height="730"
                                    src="{{ asset('website/assets/images/slider/slider-1.jpg') }}"
                                    alt="Image"
                                />
                            </div>
                            <div class="sld_content pst-5">
                                <div class="container">
                                    <div class="content-sld_wrap text-center">
                                        <div class="heading">
                                            <p class="sub-text_sld text-body-1 fade-item fade-item-1 mb-15 text-white">
                                                DISCOVER THE ART OF MODERN DRESSING
                                            </p>
                                            <p class="title_sld text-display fw-medium fade-item fade-item-2 text-white">
                                                Elevate Your Style with <br class="d-none d-sm-block" />
                                                Timeless Elegance
                                            </p>
                                        </div>
                                        <div class="fade-item fade-item-3">
                                            <a href="shop-default.html" class="tf-btn btn-white"> Shop Styles </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- item 2 -->
                    <div class="swiper-slide">
                        <div class="slideshow-wrap">
                            <div class="sld_image">
                                <img
                                    loading="lazy"
                                    width="1920"
                                    height="730"
                                    src="{{ asset('website/assets/images/slider/slider-2.jpg') }}"
                                    alt="Image"
                                />
                            </div>
                            <div class="sld_content pst-5">
                                <div class="container">
                                    <div class="content-sld_wrap text-center">
                                        <div class="heading">
                                            <p class="sub-text_sld text-body-1 fade-item fade-item-1 mb-15 text-white">
                                                DISCOVER THE ART OF MODERN DRESSING
                                            </p>
                                            <p class="title_sld text-display fw-medium fade-item fade-item-2 text-white">
                                                Discover a New Level of <br class="d-none d-sm-block" />
                                                Timeless Style
                                            </p>
                                        </div>
                                        <div class="fade-item fade-item-3">
                                            <a href="shop-default.html" class="tf-btn btn-white"> Shop Styles </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- item 3 -->
                    <div class="swiper-slide">
                        <div class="slideshow-wrap">
                            <div class="sld_image">
                                <img
                                    loading="lazy"
                                    width="1920"
                                    height="730"
                                    src="{{ asset('website/assets/images/slider/slider-3.jpg') }}"
                                    alt="Image"
                                />
                            </div>
                            <div class="sld_content pst-5">
                                <div class="container">
                                    <div class="content-sld_wrap text-center">
                                        <div class="heading">
                                            <p class="sub-text_sld text-body-1 fade-item fade-item-1 mb-15 text-white">
                                                DISCOVER THE ART OF MODERN DRESSING
                                            </p>
                                            <p class="title_sld text-display fw-medium fade-item fade-item-2 text-white">
                                                Define Your Style through <br class="d-none d-sm-block" />
                                                Elegant Simplicity
                                            </p>
                                        </div>
                                        <div class="fade-item fade-item-3">
                                            <a href="shop-default.html" class="tf-btn btn-white"> Shop Styles </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sw-line-default tf-sw-pagination"></div>
            </div>
            <div class="group-nav-action">
                <div class="container-full">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="tf-sw-nav link nav-prev-swiper text-white">
                            <i class="icon icon-ArrowLongLeft"></i>
                        </div>
                        <div class="tf-sw-nav link nav-next-swiper text-white">
                            <i class="icon icon-ArrowLongRight"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Slide Show -->
        <!-- Category -->
        <section class="flat-spacing">
            <div class="container">
                <div class="sect-heading type-2 wow fadeInUp text-center">
                    <h3 class="s-title">Shop By Categories</h3>
                    <p class="s-desc text-body-1 cl-text-2">Top styles everyone’s talking about.</p>
                </div>
                <div
                    dir="ltr"
                    class="swiper tf-swiper"
                    data-preview="6"
                    data-tablet="4"
                    data-mobile-sm="3"
                    data-mobile="2"
                    data-space-lg="30"
                    data-space-md="15"
                    data-space="10"
                    data-pagination="2"
                    data-pagination-sm="3"
                    data-pagination-md="4"
                    data-pagination-lg="6"
                >
                    <div class="swiper-wrapper">
                        <!-- slide 1 -->
                        @foreach ($categories as $category)
                            <div class="swiper-slide wow fadeInUp">
                                <a
                                    href="{{ route('web.shop-by-categories', $category->slug) }}"
                                    class="category-v01 hover-img"
                                >
                                    <div class="cate-image img-style">
                                        <img
                                            loading="lazy"
                                            width="210"
                                            height="210"
                                            src="{{ asset('storage/uploads/'. $category->image->image_name) }}"
                                            alt="Image"
                                        />
                                    </div>
                                    <p class="cate-name h5 link link-underline text-center">
                                        {{ $category->category_name }}
                                    </p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="sw-line-default style-2 tf-sw-pagination"></div>
                </div>
            </div>
        </section>
        <!-- /Category -->
        <!-- Top Pick -->
        <section class="flat-spacing pt-0">
            <div class="container">
                <div class="sect-heading type-2 wow fadeInUp text-center">
                    <h3 class="s-title">Top Picks</h3>
                    <p class="s-desc text-body-1 cl-text-2">Fresh styles just in! Elevate your look.</p>
                </div>
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
                        @foreach ($products as $product)
                            <div class="swiper-slide wow fadeInUp">
                                <div class="card-product">
                                    <div class="card-product_wrapper">
                                        {{-- Product Image --}}
                                        {{-- @dd($product['images']) --}}
                                        @if (count($product['images']) > 0)
                                            <a
                                                href="{{ route('web.product.show', $product['slug']) }}"
                                                class="product-img"
                                            >
                                                <img
                                                    class="img-product"
                                                    loading="lazy"
                                                    width="330"
                                                    height="440"
                                                    src="{{ asset('storage/uploads/' . $product['images'][0]['image_name']) }}"
                                                    alt="{{ $product['name'] }}"
                                                />

                                                {{-- Same image on hover --}}
                                                <img
                                                    class="img-hover"
                                                    loading="lazy"
                                                    width="330"
                                                    height="440"
                                                    src="{{ asset('storage/uploads/' . ($product['images'][1]['image_name'] ?? $product['images'][0]['image_name'])) }}"
                                                    alt="{{ $product['name'] }}"
                                                />
                                            </a>
                                        @endif
                                        {{-- Product Actions --}}
                                        <ul class="product-action_list">
                                            <li class="wishlist">
                                                <a href="#;" class="hover-tooltip tooltip-left box-icon">
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
                                        {{-- New Badge --}}
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
                                        <a
                                            href="{{ route('web.product.show', $product['slug']) }}"
                                            class="name-product lh-24 fw-medium link-underline-text"
                                        >
                                            {{ $product['name'] }}
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
                                            <span class="price-new text-primary fw-semibold">
                                                ${{ $product['price'] }}
                                            </span>
                                            @if ($product['sale_price'])
                                                <span class="price-old text-caption-01 cl-text-3">
                                                    ${{ $product['sale_price'] }}
                                                </span>
                                            @endif
                                        </div>
                                        <ul class="product-color_list">
                                            @foreach ($product['colors'] as $color)
                                                <li>
                                                    <div class="d-flex align-items-center">
                                                        <div class="mr-2" style="width: 30px; height: 30px; 
                                                        background-color: {{ $color }}; 
                                                        border: 1px solid #ccc; border-radius: 50%;"></div>
                                                        
                                                    </div>
                                                </li>
                                            @endforeach
                                            {{-- <li class="product-color-item color-swatch hover-tooltip tooltip-bot active">
                                                <span class="tooltip color-filter">Brown</span>
                                                <span class="swatch-value bg-warm-beige"></span>
                                                <img src="{{ asset('website/assets/images/product/product-1.jpg') }}"
                                                    data-src="{{ asset('website/assets/images/product/product-1.jpg') }}"
                                                    alt="Image">
                                            </li>
                                            <li class="product-color-item color-swatch hover-tooltip tooltip-bot">
                                                <span class="tooltip color-filter">Dark Blue</span>
                                                <span class="swatch-value bg-midnight-blue"></span>
                                                <img src="{{ asset('website/assets/images/product/product-1_3.jpg') }}"
                                                    data-src="{{ asset('website/assets/images/product/product-1_3.jpg') }}"
                                                    alt="Image">
                                            </li>
                                            <li class="product-color-item color-swatch hover-tooltip tooltip-bot">
                                                <span class="tooltip color-filter">White</span>
                                                <span class="swatch-value bg-white"></span>
                                                <img src="{{ asset('website/assets/images/product/product-1_4.jpg') }}"
                                                    data-src="{{ asset('website/assets/images/product/product-1_4.jpg') }}"
                                                    alt="Image">
                                            </li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="sw-dot-default tf-sw-pagination"></div>
                </div>
            </div>
        </section>
        <!-- /Top Pick -->
        <!-- Collection -->
        <div class="section-banner-collection">
            <div class="container">
                <div class="tf-grid-layout sm-col-2 gap-10">
                    <div class="box-image_v01">
                        <a href="shop-default.html" class="box-image_img img-style">
                            <img
                                loading="lazy"
                                width="700"
                                height="933"
                                src="{{ asset('website/assets/images/collection/cls-6.jpg') }}"
                                alt="Image"
                            />
                        </a>
                        <div class="box-image_content">
                            <a
                                href="shop-default.html"
                                class="title h3 fw-medium link-underline-white text-decoration-thickness text-white"
                            >
                                Shop Women
                            </a>
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-10">
                        <div class="box-image_v01 h-100">
                            <a href="shop-default.html" class="box-image_img img-style">
                                <img
                                    loading="lazy"
                                    width="700"
                                    height="461"
                                    src="{{ asset('website/assets/images/collection/cls-7.jpg') }}"
                                    alt="Image"
                                />
                            </a>
                            <div class="box-image_content">
                                <a
                                    href="shop-default.html"
                                    class="title h3 fw-medium link-underline-white text-decoration-thickness text-white"
                                >
                                    Shop Men
                                </a>
                            </div>
                        </div>
                        <div class="box-image_v01 h-100">
                            <a href="shop-default.html" class="box-image_img img-style">
                                <img
                                    loading="lazy"
                                    width="700"
                                    height="461"
                                    src="{{ asset('website/assets/images/collection/cls-8.jpg') }}"
                                    alt="Image"
                                />
                            </a>
                            <div class="box-image_content">
                                <a
                                    href="shop-default.html"
                                    class="title h3 fw-medium link-underline-white text-decoration-thickness text-white"
                                >
                                    Shop Essentials
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Collection -->
        <!-- Top Pick -->
        <section class="flat-spacing">
            <div class="container">
                <div class="sect-heading type-2 wow fadeInUp text-center">
                    <h3 class="s-title">Top Trending</h3>
                    <p class="s-desc text-body-1 cl-text-2">Browse our Top Trending picks loved by all.</p>
                </div>
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
                        <!-- slide 1 -->
                        <div class="swiper-slide">
                            <div class="card-product wow fadeInUp">
                                <div class="card-product_wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img
                                            class="img-product"
                                            loading="lazy"
                                            width="330"
                                            height="440"
                                            src="{{ asset('website/assets/images/product/product-5.jpg') }}"
                                            alt="Product"
                                        />
                                        <img
                                            class="img-hover"
                                            loading="lazy"
                                            width="330"
                                            height="440"
                                            src="{{ asset('website/assets/images/product/product-5_2.jpg') }}"
                                            alt="Product"
                                        />
                                    </a>
                                    <ul class="product-action_list">
                                        <li class="wishlist">
                                            <a href="#;" class="hover-tooltip tooltip-left box-icon">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                            </a>
                                        </li>
                                        <li class="compare">
                                            <a
                                                href="#compare"
                                                data-bs-toggle="offcanvas"
                                                class="hover-tooltip tooltip-left box-icon"
                                            >
                                                <span class="icon icon-ArrowsLeftRight"></span>
                                                <span class="tooltip">Compare</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="#quickView"
                                                data-bs-toggle="offcanvas"
                                                class="hover-tooltip tooltip-left box-icon"
                                            >
                                                <span class="icon icon-Eye"></span>
                                                <span class="tooltip">Quick view</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="product-badge_list">
                                        <li class="product-badge_item text-caption-01 new">NEW</li>
                                    </ul>
                                    <div class="product-action_bot">
                                        <a href="#quickAdd" data-bs-toggle="modal" class="tf-btn btn-white small w-100">
                                            Quick Add
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product_info">
                                    <a
                                        href="product-detail.html"
                                        class="name-product lh-24 fw-medium link-underline-text"
                                    >
                                        High neck midi wool coat
                                    </a>
                                    <div class="star-wrap d-flex align-items-center">
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                    </div>
                                    <div class="price-wrap">
                                        <span class="price-new text-primary fw-semibold">$9,99</span>
                                        <span class="price-old text-caption-01 cl-text-3">$19,99</span>
                                    </div>
                                    <ul class="product-color_list">
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot active">
                                            <span class="tooltip color-filter">Brown</span>
                                            <span class="swatch-value bg-olive-brown"></span>
                                            <img
                                                src="{{ asset('website/assets/images/product/product-5.jpg') }}"
                                                data-src="{{ asset('website/assets/images/product/product-5.jpg') }}"
                                                alt="Image"
                                            />
                                        </li>
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot">
                                            <span class="tooltip color-filter">Blue</span>
                                            <span class="swatch-value bg-dark-blue"></span>
                                            <img
                                                src="{{ asset('website/assets/images/product/product-5_3.jpg') }}"
                                                data-src="{{ asset('website/assets/images/product/product-5_3.jpg') }}"
                                                alt="Image"
                                            />
                                        </li>
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot">
                                            <span class="tooltip color-filter">Beige</span>
                                            <span class="swatch-value bg-beige"></span>
                                            <img
                                                src="{{ asset('website/assets/images/product/product-5_4.jpg') }}"
                                                data-src="{{ asset('website/assets/images/product/product-5_4.jpg') }}"
                                                alt="Image"
                                            />
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- slide 2 -->
                        <div class="swiper-slide">
                            <div class="card-product has-size wow fadeInUp">
                                <div class="card-product_wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img
                                            class="img-product"
                                            loading="lazy"
                                            width="330"
                                            height="440"
                                            src="{{ asset('website/assets/images/product/product-6.jpg') }}"
                                            alt="Product"
                                        />
                                        <img
                                            class="img-hover"
                                            loading="lazy"
                                            width="330"
                                            height="440"
                                            src="{{ asset('website/assets/images/product/product-6_2.jpg') }}"
                                            alt="Product"
                                        />
                                    </a>
                                    <ul class="product-action_list">
                                        <li class="wishlist">
                                            <a href="#;" class="hover-tooltip tooltip-left box-icon">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                            </a>
                                        </li>
                                        <li class="compare">
                                            <a
                                                href="#compare"
                                                data-bs-toggle="offcanvas"
                                                class="hover-tooltip tooltip-left box-icon"
                                            >
                                                <span class="icon icon-ArrowsLeftRight"></span>
                                                <span class="tooltip">Compare</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="#quickView"
                                                data-bs-toggle="offcanvas"
                                                class="hover-tooltip tooltip-left box-icon"
                                            >
                                                <span class="icon icon-Eye"></span>
                                                <span class="tooltip">Quick view</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="product-badge_list">
                                        <li class="product-badge_item text-caption-01 sale">-25%</li>
                                    </ul>
                                    <div class="variant-box">
                                        <ul class="product-size_list">
                                            <li class="size-item text-caption-01">XS</li>
                                            <li class="size-item text-caption-01">S</li>
                                            <li class="size-item text-caption-01">M</li>
                                        </ul>
                                    </div>
                                    <div class="product-action_bot">
                                        <a href="#quickAdd" data-bs-toggle="modal" class="tf-btn btn-white small w-100">
                                            Quick Add
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product_info">
                                    <a
                                        href="product-detail.html"
                                        class="name-product lh-24 fw-medium link-underline-text"
                                    >
                                        Square metallic frame sunglasses
                                    </a>
                                    <div class="star-wrap d-flex align-items-center">
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                    </div>
                                    <div class="price-wrap">
                                        <span class="price-new text-primary fw-semibold">$34,99</span>
                                        <span class="price-old text-caption-01 cl-text-3">$59,99</span>
                                    </div>
                                    <ul class="product-color_list">
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot active">
                                            <span class="tooltip color-filter">Brown</span>
                                            <span class="swatch-value bg-warm-brown-2"></span>
                                            <img
                                                src="{{ asset('website/assets/images/product/product-6.jpg') }}"
                                                data-src="{{ asset('website/assets/images/product/product-6.jpg') }}"
                                                alt="Image"
                                            />
                                        </li>
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot">
                                            <span class="tooltip color-filter">Blue</span>
                                            <span class="swatch-value bg-cool-gray"></span>
                                            <img
                                                src="{{ asset('website/assets/images/product/product-6_3.jpg') }}"
                                                data-src="{{ asset('website/assets/images/product/product-6_3.jpg') }}"
                                                alt="Image"
                                            />
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- slide 3 -->
                        <div class="swiper-slide">
                            <div class="card-product wow fadeInUp">
                                <div class="card-product_wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img
                                            class="img-product"
                                            loading="lazy"
                                            width="330"
                                            height="440"
                                            src="{{ asset('website/assets/images/product/product-7.jpg') }}"
                                            alt="Product"
                                        />
                                        <img
                                            class="img-hover"
                                            loading="lazy"
                                            width="330"
                                            height="440"
                                            src="{{ asset('website/assets/images/product/product-7_2.jpg') }}"
                                            alt="Product"
                                        />
                                    </a>
                                    <ul class="product-action_list">
                                        <li class="wishlist">
                                            <a href="#;" class="hover-tooltip tooltip-left box-icon">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                            </a>
                                        </li>
                                        <li class="compare">
                                            <a
                                                href="#compare"
                                                data-bs-toggle="offcanvas"
                                                class="hover-tooltip tooltip-left box-icon"
                                            >
                                                <span class="icon icon-ArrowsLeftRight"></span>
                                                <span class="tooltip">Compare</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="#quickView"
                                                data-bs-toggle="offcanvas"
                                                class="hover-tooltip tooltip-left box-icon"
                                            >
                                                <span class="icon icon-Eye"></span>
                                                <span class="tooltip">Quick view</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="product-badge_list">
                                        <li class="product-badge_item text-caption-01 sale">-25%</li>
                                    </ul>
                                    <div class="product-action_bot">
                                        <a href="#quickAdd" data-bs-toggle="modal" class="tf-btn btn-white small w-100">
                                            Quick Add
                                        </a>
                                    </div>
                                    <div class="product-marquee_sale">
                                        <div class="marquee-wrapper">
                                            <div class="initial-child-container">
                                                <!-- 1 -->
                                                <div class="marquee-child-item">HOT SALE 25% OFF</div>
                                                <i class="icon icon-Star2"></i>
                                                <!-- 2 -->
                                                <div class="marquee-child-item">HOT SALE 25% OFF</div>
                                                <i class="icon icon-Star2"></i>
                                                <!-- 3 -->
                                                <div class="marquee-child-item">HOT SALE 25% OFF</div>
                                                <i class="icon icon-Star2"></i>
                                                <!-- 4 -->
                                                <div class="marquee-child-item">HOT SALE 25% OFF</div>
                                                <i class="icon icon-Star2"></i>
                                                <!-- 5 -->
                                                <div class="marquee-child-item">HOT SALE 25% OFF</div>
                                                <i class="icon icon-Star2"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-product_info">
                                    <a
                                        href="product-detail.html"
                                        class="name-product lh-24 fw-medium link-underline-text"
                                    >
                                        Leather shopper bag with stitching
                                    </a>
                                    <div class="star-wrap d-flex align-items-center">
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                    </div>
                                    <div class="price-wrap">
                                        <span class="price-new text-primary fw-semibold">$22,99</span>
                                        <span class="price-old text-caption-01 cl-text-3">$39,99</span>
                                    </div>
                                    <ul class="product-color_list">
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot active">
                                            <span class="tooltip color-filter">Brown</span>
                                            <span class="swatch-value bg-warm-beige"></span>
                                            <img
                                                src="{{ asset('website/assets/images/product/product-7.jpg') }}"
                                                data-src="{{ asset('website/assets/images/product/product-7.jpg') }}"
                                                alt="Image"
                                            />
                                        </li>
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot">
                                            <span class="tooltip color-filter">Warm Brown</span>
                                            <span class="swatch-value bg-caramel"></span>
                                            <img
                                                src="{{ asset('website/assets/images/product/product-7_3.jpg') }}"
                                                data-src="{{ asset('website/assets/images/product/product-7_3.jpg') }}"
                                                alt="Image"
                                            />
                                        </li>
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot">
                                            <span class="tooltip color-filter">Beige</span>
                                            <span class="swatch-value bg-sand-beige"></span>
                                            <img
                                                src="{{ asset('website/assets/images/product/product-7_4.jpg') }}"
                                                data-src="{{ asset('website/assets/images/product/product-7_4.jpg') }}"
                                                alt="Image"
                                            />
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- slide 4 -->
                        <div class="swiper-slide">
                            <div class="card-product wow fadeInUp">
                                <div class="card-product_wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img
                                            class="img-product"
                                            loading="lazy"
                                            width="330"
                                            height="440"
                                            src="{{ asset('website/assets/images/product/product-8.jpg') }}"
                                            alt="Product"
                                        />
                                        <img
                                            class="img-hover"
                                            loading="lazy"
                                            width="330"
                                            height="440"
                                            src="{{ asset('website/assets/images/product/product-8_2.jpg') }}"
                                            alt="Product"
                                        />
                                    </a>
                                    <ul class="product-action_list">
                                        <li class="wishlist">
                                            <a href="#;" class="hover-tooltip tooltip-left box-icon">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                            </a>
                                        </li>
                                        <li class="compare">
                                            <a
                                                href="#compare"
                                                data-bs-toggle="offcanvas"
                                                class="hover-tooltip tooltip-left box-icon"
                                            >
                                                <span class="icon icon-ArrowsLeftRight"></span>
                                                <span class="tooltip">Compare</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="#quickView"
                                                data-bs-toggle="offcanvas"
                                                class="hover-tooltip tooltip-left box-icon"
                                            >
                                                <span class="icon icon-Eye"></span>
                                                <span class="tooltip">Quick view</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="product-action_bot">
                                        <a href="#quickAdd" data-bs-toggle="modal" class="tf-btn btn-white small w-100">
                                            Quick Add
                                        </a>
                                    </div>
                                    <div class="product-countdown">
                                        <div
                                            class="js-countdown cd-has-zero"
                                            data-timer="1093120"
                                            data-labels="D : ,H : ,M : ,S"
                                        ></div>
                                    </div>
                                </div>
                                <div class="card-product_info">
                                    <a
                                        href="product-detail.html"
                                        class="name-product lh-24 fw-medium link-underline-text"
                                    >
                                        Leather shopper bag with stitching
                                    </a>
                                    <div class="star-wrap d-flex align-items-center">
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                    </div>
                                    <div class="price-wrap">
                                        <span class="price-new text-primary fw-semibold">$67,99</span>
                                        <span class="price-old text-caption-01 cl-text-3">$99,99</span>
                                    </div>
                                    <ul class="product-color_list">
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot active">
                                            <span class="tooltip color-filter">Pink</span>
                                            <span class="swatch-value bg-rose-taupe"></span>
                                            <img
                                                src="{{ asset('website/assets/images/product/product-8.jpg') }}"
                                                data-src="{{ asset('website/assets/images/product/product-8.jpg') }}"
                                                alt="Image"
                                            />
                                        </li>
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot">
                                            <span class="tooltip color-filter">Blue</span>
                                            <span class="swatch-value bg-dark-blue-2"></span>
                                            <img
                                                src="{{ asset('website/assets/images/product/product-8_3.jpg') }}"
                                                data-src="{{ asset('website/assets/images/product/product-8_3.jpg') }}"
                                                alt="Image"
                                            />
                                        </li>
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot">
                                            <span class="tooltip color-filter">Pink</span>
                                            <span class="swatch-value bg-blush-pink"></span>
                                            <img
                                                src="{{ asset('website/assets/images/product/product-8_4.jpg') }}"
                                                data-src="{{ asset('website/assets/images/product/product-8_4.jpg') }}"
                                                alt="Image"
                                            />
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sw-dot-default tf-sw-pagination"></div>
                </div>
            </div>
        </section>
        <!-- /Top Pick -->
        <!-- Lookbook -->
        <div class="themesFlat">
            <div class="tf-grid-layout xl-col-2 mb-10 gap-10">
                <div class="banner-lookbook wrap-lookbook_hover">
                    <img
                        class="img-banner"
                        loading="lazy"
                        width="955"
                        height="640"
                        src="{{ asset('website/assets/images/section/banner-lookbook-1.jpg') }}"
                        alt="Image"
                    />
                    <div class="lookbook-item position1">
                        <div class="dropdown dropup-center dropdown-custom dropend">
                            <div
                                role="dialog"
                                class="tf-pin-btn bundle-pin-item swiper-button"
                                data-slide="0"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                <span></span>
                            </div>
                            <div class="dropdown-menu">
                                <div class="lookbook-product">
                                    <a href="product-detail.html" class="image">
                                        <img
                                            width="88"
                                            height="88"
                                            src="{{ asset('website/assets/images/product/square/product-10.jpg') }}"
                                            alt="Product"
                                        />
                                    </a>
                                    <div class="content">
                                        <a
                                            href="product-detail.html"
                                            class="name-prd link fw-medium lh-24 text-line-clamp-2"
                                        >
                                            High neck midi wool coat
                                        </a>
                                        <div class="price-wrap">
                                            <span class="price-new text-primary fw-semibold">$29,99</span>
                                            <span class="price-old text-caption-01 cl-text-3">$39.99</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lookbook-item position2">
                        <div class="dropdown dropup-center dropdown-custom dropstart">
                            <div
                                role="dialog"
                                class="tf-pin-btn bundle-pin-item swiper-button"
                                data-slide="0"
                                id="pin2"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                <span></span>
                            </div>
                            <div class="dropdown-menu">
                                <div class="lookbook-product">
                                    <a href="product-detail.html" class="image">
                                        <img
                                            width="88"
                                            height="88"
                                            src="{{ asset('website/assets/images/product/square/product-3_3.jpg') }}"
                                            alt="Product"
                                        />
                                    </a>
                                    <div class="content">
                                        <a
                                            href="product-detail.html"
                                            class="name-prd link fw-medium lh-24 text-line-clamp-2"
                                        >
                                            High neck midi wool coat
                                        </a>
                                        <div class="price-wrap">
                                            <span class="price-new text-primary fw-semibold">$49,99</span>
                                            <span class="price-old text-caption-01 cl-text-3">$59.99</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-lookbook wrap-lookbook_hover">
                    <img
                        class="img-banner"
                        loading="lazy"
                        width="955"
                        height="640"
                        src="{{ asset('website/assets/images/section/banner-lookbook-2.jpg') }}"
                        alt="Image"
                    />
                    <div class="lookbook-item position3">
                        <div class="dropdown dropup-center dropdown-custom dropstart">
                            <div
                                role="dialog"
                                class="tf-pin-btn bundle-pin-item swiper-button"
                                data-slide="0"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                <span></span>
                            </div>
                            <div class="dropdown-menu">
                                <div class="lookbook-product">
                                    <a href="product-detail.html" class="image">
                                        <img
                                            width="88"
                                            height="88"
                                            src="{{ asset('website/assets/images/product/square/product-11.jpg') }}"
                                            alt="Product"
                                        />
                                    </a>
                                    <div class="content">
                                        <a
                                            href="product-detail.html"
                                            class="name-prd link fw-medium lh-24 text-line-clamp-2"
                                        >
                                            High neck midi wool coat
                                        </a>
                                        <div class="price-wrap">
                                            <span class="price-new text-primary fw-semibold">$69,99</span>
                                            <span class="price-old text-caption-01 cl-text-3">$79.99</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-main-2">
                <div class="infiniteSlide-cls wow fadeInUp">
                    <div class="infiniteSlide infiniteSlide-wrapper" data-clone="3">
                        <div class="infiniteSlide-item">
                            <a href="shop-default.html" class="cls-wrap">
                                <h4>Style in Motion</h4>
                                <div class="img-cls">
                                    <img
                                        loading="lazy"
                                        width="80"
                                        height="80"
                                        src="{{ asset('website/assets/images/collection/cls-1.jpg') }}"
                                        alt="Image"
                                    />
                                </div>
                            </a>
                        </div>
                        <div class="infiniteSlide-item">
                            <a href="shop-default.html" class="cls-wrap">
                                <h4>Own Your Look</h4>
                                <div class="img-cls">
                                    <img
                                        loading="lazy"
                                        width="80"
                                        height="80"
                                        src="{{ asset('website/assets/images/collection/cls-2.jpg') }}"
                                        alt="Image"
                                    />
                                </div>
                            </a>
                        </div>
                        <div class="infiniteSlide-item">
                            <a href="shop-default.html" class="cls-wrap">
                                <h4>Chic by Nature</h4>
                                <div class="img-cls">
                                    <img
                                        loading="lazy"
                                        width="80"
                                        height="80"
                                        src="{{ asset('website/assets/images/collection/cls-3.jpg') }}"
                                        alt="Image"
                                    />
                                </div>
                            </a>
                        </div>
                        <div class="infiniteSlide-item">
                            <a href="shop-default.html" class="cls-wrap">
                                <h4>Effortless Elegance</h4>
                                <div class="img-cls">
                                    <img
                                        loading="lazy"
                                        width="80"
                                        height="80"
                                        src="{{ asset('website/assets/images/collection/cls-4.jpg') }}"
                                        alt="Image"
                                    />
                                </div>
                            </a>
                        </div>
                        <div class="infiniteSlide-item">
                            <a href="shop-default.html" class="cls-wrap">
                                <h4>Made to Stand Out</h4>
                                <div class="img-cls">
                                    <img
                                        loading="lazy"
                                        width="80"
                                        height="80"
                                        src="{{ asset('website/assets/images/collection/cls-5.jpg') }}"
                                        alt="Image"
                                    />
                                </div>
                            </a>
                        </div>
                        <div class="infiniteSlide-item">
                            <a href="shop-default.html" class="cls-wrap">
                                <h4>Confidence in Every Step</h4>
                                <div class="img-cls">
                                    <img
                                        loading="lazy"
                                        width="80"
                                        height="80"
                                        src="{{ asset('website/assets/images/collection/cls-3.jpg') }}"
                                        alt="Image"
                                    />
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Lookbook -->
        <!-- Testimonial -->
        <section class="flat-spacing">
            <div class="container">
                <div class="sect-heading type-2 wow fadeInUp text-center">
                    <h3 class="s-title">Customer Say!</h3>
                    <p class="s-desc text-body-1 cl-text-2">
                        Our customers adore our products, and we constantly aim to delight them.
                    </p>
                </div>
                <div
                    dir="ltr"
                    class="swiper tf-swiper"
                    data-preview="2"
                    data-tablet="2"
                    data-mobile-sm="1"
                    data-mobile="1"
                    data-space-lg="60"
                    data-space-md="30"
                    data-space="15"
                    data-pagination="1"
                    data-pagination-sm="2"
                    data-pagination-md="2"
                    data-pagination-lg="2"
                >
                    <div class="swiper-wrapper">
                        <!-- slide 1 -->
                        <div class="swiper-slide">
                            <div class="testimonial-v01 style-1 style-def wow fadeInLeft">
                                <div class="tes-image">
                                    <img
                                        loading="lazy"
                                        width="285"
                                        height="380"
                                        src="{{ asset('website/assets/images/testimonial/tes-1.jpg') }}"
                                        alt="Image"
                                    />
                                </div>
                                <div class="tes-content">
                                    <div class="star-wrap d-flex align-items-center">
                                        <i class="icon icon-Star-thin fs-24"></i>
                                        <i class="icon icon-Star-thin fs-24"></i>
                                        <i class="icon icon-Star-thin fs-24"></i>
                                        <i class="icon icon-Star-thin fs-24"></i>
                                        <i class="icon icon-Star-thin fs-24"></i>
                                    </div>
                                    <div class="tes_author">
                                        <p class="author-name h5">Emma Collins</p>
                                        <div class="br-line"></div>
                                        <div class="author-verified">
                                            <i class="icon icon-CheckCircle1"></i>
                                            <span class="cl-text-2"> Verified Buyer </span>
                                        </div>
                                    </div>
                                    <p class="tes_text h6">
                                        “Totally obsessed with this outfit! The fit is perfect, the fabric feels
                                        premium, and I’ve been getting compliments non-stop. It instantly lifts my
                                        confidence — such a great find!”
                                    </p>
                                    <div class="tes_product">
                                        <div class="product-image">
                                            <img
                                                class="aspect-ratio-1 object-fit-cover"
                                                loading="lazy"
                                                width="60"
                                                height="60"
                                                src="{{ asset('website/assets/images/product/product-4.jpg') }}"
                                                alt="Image"
                                            />
                                        </div>
                                        <div class="product-infor">
                                            <a href="product-detail.html" class="link fw-medium lh-24">
                                                High neck midi wool coat
                                            </a>
                                            <p class="prd_price fw-semibold text-primary">$29.99</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- slide 2 -->
                        <div class="swiper-slide">
                            <div class="testimonial-v01 style-1 style-def wow fadeInLeft" data-wow-delay="0.1s">
                                <div class="tes-image">
                                    <img
                                        loading="lazy"
                                        width="285"
                                        height="380"
                                        src="{{ asset('website/assets/images/testimonial/tes-2.jpg') }}"
                                        alt="Image"
                                    />
                                </div>
                                <div class="tes-content">
                                    <div class="star-wrap d-flex align-items-center">
                                        <i class="icon icon-Star-thin fs-24"></i>
                                        <i class="icon icon-Star-thin fs-24"></i>
                                        <i class="icon icon-Star-thin fs-24"></i>
                                        <i class="icon icon-Star-thin fs-24"></i>
                                        <i class="icon icon-Star-thin fs-24"></i>
                                    </div>
                                    <div class="tes_author">
                                        <p class="author-name h5">Sophia Ramirez</p>
                                        <div class="br-line"></div>
                                        <div class="author-verified">
                                            <i class="icon icon-CheckCircle1"></i>
                                            <span class="cl-text-2"> Verified Buyer </span>
                                        </div>
                                    </div>
                                    <p class="tes_text h6">
                                        “I’m amazed by how comfortable yet stylish this piece is. It pairs effortlessly
                                        with everything, and the quality really stands out. Definitely becoming my go-to
                                        for everyday looks!”
                                    </p>
                                    <div class="tes_product">
                                        <div class="product-image">
                                            <img
                                                class="aspect-ratio-1 object-fit-cover"
                                                loading="lazy"
                                                width="60"
                                                height="60"
                                                src="{{ asset('website/assets/images/product/product-6.jpg') }}"
                                                alt="Image"
                                            />
                                        </div>
                                        <div class="product-infor">
                                            <a href="product-detail.html" class="link fw-medium lh-24">
                                                Square metallic frame sunglasses
                                            </a>
                                            <p class="prd_price fw-semibold text-primary">$29.99</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sw-line-default style-2 tf-sw-pagination"></div>
                </div>
            </div>
        </section>
        <!-- /Testimonial -->
        <!-- Gallery -->
        <section class="themesFlat">
            <div class="container">
                <div class="sect-heading type-2 wow fadeInUp text-center">
                    <h3 class="s-title">Shop Instagram</h3>
                    <p class="s-desc text-body-1 cl-text-2">Elevate your wardrobe with fresh finds today!</p>
                </div>
                <div
                    dir="ltr"
                    class="swiper tf-swiper"
                    data-preview="5"
                    data-tablet="3"
                    data-mobile-sm="3"
                    data-mobile="2"
                    data-space="10"
                    data-pagination="2"
                    data-pagination-sm="3"
                    data-pagination-md="4"
                    data-pagination-lg="5"
                >
                    <div class="swiper-wrapper">
                        <!-- slide 1 -->
                        <div class="swiper-slide">
                            <div class="gallery-item hover-img hover-overlay wow fadeInUp">
                                <div class="image img-style">
                                    <img
                                        loading="lazy"
                                        width="274"
                                        height="274"
                                        src="{{ asset('website/assets/images/gallery/gallery-1.jpg') }}"
                                        alt="Image"
                                    />
                                </div>
                                <a href="product-detail.html" class="box-icon hover-tooltip">
                                    <span class="icon icon-Eye"></span>
                                    <span class="tooltip">View product</span>
                                </a>
                            </div>
                        </div>
                        <!-- slide 2 -->
                        <div class="swiper-slide">
                            <div class="gallery-item hover-img hover-overlay wow fadeInUp">
                                <div class="image img-style">
                                    <img
                                        loading="lazy"
                                        width="274"
                                        height="274"
                                        src="{{ asset('website/assets/images/gallery/gallery-2.jpg') }}"
                                        alt="Image"
                                    />
                                </div>
                                <a href="product-detail.html" class="box-icon hover-tooltip">
                                    <span class="icon icon-Eye"></span>
                                    <span class="tooltip">View product</span>
                                </a>
                            </div>
                        </div>
                        <!-- slide 3 -->
                        <div class="swiper-slide">
                            <div class="gallery-item hover-img hover-overlay wow fadeInUp">
                                <div class="image img-style">
                                    <img
                                        loading="lazy"
                                        width="274"
                                        height="274"
                                        src="{{ asset('website/assets/images/gallery/gallery-3.jpg') }}"
                                        alt="Image"
                                    />
                                </div>
                                <a href="product-detail.html" class="box-icon hover-tooltip">
                                    <span class="icon icon-Eye"></span>
                                    <span class="tooltip">View product</span>
                                </a>
                            </div>
                        </div>
                        <!-- slide 4 -->
                        <div class="swiper-slide">
                            <div class="gallery-item hover-img hover-overlay wow fadeInUp">
                                <div class="image img-style">
                                    <img
                                        loading="lazy"
                                        width="274"
                                        height="274"
                                        src="{{ asset('website/assets/images/gallery/gallery-4.jpg') }}"
                                        alt="Image"
                                    />
                                </div>
                                <a href="product-detail.html" class="box-icon hover-tooltip">
                                    <span class="icon icon-Eye"></span>
                                    <span class="tooltip">View product</span>
                                </a>
                            </div>
                        </div>
                        <!-- slide 5 -->
                        <div class="swiper-slide">
                            <div class="gallery-item hover-img hover-overlay wow fadeInUp">
                                <div class="image img-style">
                                    <img
                                        loading="lazy"
                                        width="274"
                                        height="274"
                                        src="{{ asset('website/assets/images/gallery/gallery-5.jpg') }}"
                                        alt="Image"
                                    />
                                </div>
                                <a href="product-detail.html" class="box-icon hover-tooltip">
                                    <span class="icon icon-Eye"></span>
                                    <span class="tooltip">View product</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="sw-dot-default tf-sw-pagination"></div>
                </div>
            </div>
        </section>
        <!-- /Gallery -->
        <!-- Box Icon -->
        <div class="flat-spacing">
            <div class="container">
                <div
                    dir="ltr"
                    class="swiper tf-swiper"
                    data-preview="4"
                    data-tablet="3"
                    data-mobile-sm="2"
                    data-mobile="1"
                    data-space-lg="30"
                    data-space-md="20"
                    data-space="10"
                    data-pagination="1"
                    data-pagination-sm="2"
                    data-pagination-md="3"
                    data-pagination-lg="4"
                >
                    <div class="swiper-wrapper">
                        <!-- slide 1 -->
                        <div class="swiper-slide">
                            <div class="box-icon_V01 wow fadeInLeft">
                                <span class="icon">
                                    <i class="icon-ArrowUDownLeft"></i>
                                </span>
                                <div class="content">
                                    <p class="title h6">14-Day Returns</p>
                                    <p class="text cl-text-2">Risk-free shopping with easy returns.</p>
                                </div>
                            </div>
                        </div>
                        <!-- slide 2 -->
                        <div class="swiper-slide">
                            <div class="box-icon_V01 wow fadeInLeft">
                                <span class="icon">
                                    <i class="icon-Package"></i>
                                </span>
                                <div class="content">
                                    <p class="title h6">Free Shipping</p>
                                    <p class="text cl-text-2">No extra costs, just the price you see.</p>
                                </div>
                            </div>
                        </div>
                        <!-- slide 3 -->
                        <div class="swiper-slide">
                            <div class="box-icon_V01 wow fadeInLeft">
                                <span class="icon">
                                    <i class="icon-Headset"></i>
                                </span>
                                <div class="content">
                                    <p class="title h6">24/7 Support</p>
                                    <p class="text cl-text-2">24/7 support, always here just for you.</p>
                                </div>
                            </div>
                        </div>
                        <!-- slide 4 -->
                        <div class="swiper-slide">
                            <div class="box-icon_V01 wow fadeInLeft">
                                <span class="icon">
                                    <i class="icon-SealPercent"></i>
                                </span>
                                <div class="content">
                                    <p class="title h6">Member Discounts</p>
                                    <p class="text cl-text-2">Special prices for our loyal customers.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sw-line-default style-2 tf-sw-pagination"></div>
                </div>
            </div>
        </div>
        <!-- /Box Icon -->
    </main>
@endsection
