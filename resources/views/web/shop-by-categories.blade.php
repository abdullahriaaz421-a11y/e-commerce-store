@extends('layouts.website')
@section('title', 'Shop By Categories')
@section('content')
    <main id="wrapper">
        <!-- Shop -->
        <div class="flat-spacing">
            <div class="container">
                <div class="tf-shop-control sticky-top no-offset sticky-top no-offset d-flex justify-content-center">
                    <ul class="tf-control-layout">
                        <li class="tf-view-layout-switch sw-layout-list list-layout" data-value-layout="list">
                            <i class="icon-List"></i>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-2" data-value-layout="tf-col-2">
                            <i class="icon-grid-2"></i>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-3 d-none d-md-flex" data-value-layout="tf-col-3">
                            <i class="icon-grid-3"></i>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-4 active d-none d-lg-flex"
                            data-value-layout="tf-col-4">
                            <i class="icon-grid-4"></i>
                        </li>
                    </ul>
                </div>
                <div class="wrapper-control-shop gridLayout-wrapper">
                    <div class="tf-list-layout wrapper-shop" id="listLayout" style="display: none;">
                        <!-- Product 1 -->

                        @foreach($products as $product)
                            <div class="card-product product-style_list" data-availability="In Stock"
                                data-brand="Louis Vuitton">
                                <div class="card-product_wrapper">
                                    <a href="{{ route('web.product.show', $product->slug) }}" class="product-img">
                                        <img class="img-product" loading="lazy" width="330" height="440"
                                            src="{{ asset('storage/uploads/' . $product->images->first()->image_name) }}" alt="Product">
                                        <img class="img-hover" loading="lazy" width="330" height="440"
                                            src="{{ asset('storage/uploads/' . $product->images->first()->image_name) }}" alt="Product">
                                    </a>
                                </div>
                                <div class="card-product_info">
                                    <a href="{{ route('web.product.show', $product->slug) }}" class="name-product lh-24 fw-medium link-underline-text">
                                        {{ $product->name }}
                                    </a>
                                    <div class="star-wrap d-flex align-items-center">
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                    </div>
                                    <div class="price-wrap">
                                        <span class="price-new text-primary fw-semibold">{{ $product->price }}</span>
                                        <span class="price-old text-caption-01 cl-text-3">{{ $product->sale_price }}</span>
                                    </div>
                                    <p class="description text-caption-01 mb-10">
                                        {{ $product->description }}
                                    </p>
                                    {{-- <ul class="product-color_list">
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot active">
                                            <span class="tooltip color-filter">Brown</span>
                                            <span class="swatch-value bg-muted-brown"></span>
                                            <img src="assets/images/product/product-1.jpg"
                                                data-src="assets/images/product/product-1.jpg" alt="Image">
                                        </li>
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot">
                                            <span class="tooltip color-filter">Dark Blue</span>
                                            <span class="swatch-value bg-dark-blue-gray"></span>
                                            <img src="assets/images/product/product-1_3.jpg"
                                                data-src="assets/images/product/product-1_3.jpg" alt="Image">
                                        </li>
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot">
                                            <span class="tooltip color-filter">Gray</span>
                                            <span class="swatch-value bg-soft-gray"></span>
                                            <img src="assets/images/product/product-1_4.jpg"
                                                data-src="assets/images/product/product-1_4.jpg" alt="Image">
                                        </li>
                                    </ul> --}}
                                    <ul class="product-size_list mb-10">
                                        <li class="size-item text-caption-01">{{ implode(',', $product->sizes) }}</li>
                                    </ul>
                                    <ul class="product-action_list">
                                        <li>
                                            <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                class="hover-tooltip box-icon">
                                                <span class="icon icon-Handbag"></span>
                                                <span class="tooltip">Add to Cart</span>
                                            </a>
                                        </li>
                                        <li class="wishlist">
                                            <a href="#;" class="hover-tooltip box-icon">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                            </a>
                                        </li>
                                        <li class="compare">
                                            <a href="#compare" data-bs-toggle="offcanvas" class="hover-tooltip box-icon">
                                                <span class="icon icon-ArrowsLeftRight"></span>
                                                <span class="tooltip">Compare</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#quickView" data-bs-toggle="offcanvas" class="hover-tooltip box-icon">
                                                <span class="icon icon-Eye"></span>
                                                <span class="tooltip">Quick view</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach

                        <!-- Pagination -->
                        <div class="wd-full justify-content-center">
                            <div class="tf-page-pagination">
                                <a href="#" class="pag-item">1</a>
                                <p class="pag-item active">2</p>
                                <a href="#" class="pag-item">3</a>
                                <a href="#" class="pag-item">
                                    <i class="icon icon-CaretRightThin"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper-shop tf-grid-layout tf-col-4" id="gridLayout">
                        <!-- Product 1 -->

                        @foreach ($products as $product)
                            <div class="card-product grid" data-availability="In Stock" data-brand="Louis Vuitton">
                                <div class="card-product_wrapper">
                                    <a href="{{ route('web.product.show', $product->slug) }}" class="product-img">
                                        <img class="img-product" loading="lazy" width="330" height="440"
                                            src="{{ asset('storage/uploads/' . $product->images->first()->image_name) }}" alt="Product">
                                        <img class="img-hover" loading="lazy" width="330" height="440"
                                            src="{{ asset('storage/uploads/' . $product->images->first()->image_name) }}" alt="Product">
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
                                        <a href="#quickAdd" data-bs-toggle="modal" class="tf-btn btn-white small  w-100">
                                            Quick Add
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product_info">
                                    <a href="{{ route('web.product.show', $product->slug) }}" class="name-product lh-24 fw-medium link-underline-text">
                                        {{ $product->name }}
                                    </a>
                                    <div class="star-wrap d-flex align-items-center">
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                    </div>
                                    <div class="price-wrap">
                                        <span class="price-new text-primary fw-semibold">${{ number_format($product->price, 2) }}</span>
                                        <span class="price-old text-caption-01 cl-text-3">${{ number_format($product->sale_price, 2) }}</span>
                                    </div>
                                    <ul class="product-color_list">
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot active">
                                            <span class="tooltip color-filter">Brown</span>
                                            <span class="swatch-value bg-muted-brown"></span>
                                            <img src="assets/images/product/product-1.jpg"
                                                data-src="assets/images/product/product-1.jpg" alt="Image">
                                        </li>
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot">
                                            <span class="tooltip color-filter">Dark Blue</span>
                                            <span class="swatch-value bg-dark-blue-gray"></span>
                                            <img src="assets/images/product/product-1_3.jpg"
                                                data-src="assets/images/product/product-1_3.jpg" alt="Image">
                                        </li>
                                        <li class="product-color-item color-swatch hover-tooltip tooltip-bot">
                                            <span class="tooltip color-filter">Gray</span>
                                            <span class="swatch-value bg-soft-gray"></span>
                                            <img src="assets/images/product/product-1_4.jpg"
                                                data-src="assets/images/product/product-1_4.jpg" alt="Image">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach

                        <!-- Pagination -->
                        <div class="wd-full justify-content-center">
                            <div class="tf-page-pagination">
                                <a href="#" class="pag-item">1</a>
                                <p class="pag-item active">2</p>
                                <a href="#" class="pag-item">3</a>
                                <a href="#" class="pag-item">
                                    <i class="icon icon-CaretRightThin"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Shop -->
    </main>
@endsection
