@extends('layouts.website')
@section('title', 'Shop')
@section('content')
    <!-- Page Title -->
    <section class="section-page-title text-center flat-spacing-2 pb-0">
        <div class="container">
            <div class="main-page-title">
                <div class="breadcrumbs">
                    <a href="index-2.html" class="text-caption-01 cl-text-3 link">Home</a>
                    <i class="icon icon-CaretRightThin cl-text-3"></i>
                    <P class="text-caption-01">
                        Tops & Shirts
                    </P>
                </div>
                <h3>
                    Tops & Shirts
                </h3>
                <p class="text-body-1 cl-text-2">
                    Step into our Tops & Shirts Collection, where elegance meets confidence in styles
                    <br class="d-none d-lg-block">
                    that inspire every moment.
                </p>
            </div>
        </div>
    </section>
    <!-- /Page Title -->

    {{-- Form --}}
    <form id="shop-filter-form" action="{{ route('web.shop') }}" method="GET">
        <input type="hidden" name="sort" id="filter-sort" value="">
        <input type="hidden" name="color" id="filter-color" value="{{ request('color') }}">
        <input type="hidden" name="size" id="filter-size" value="{{ request('size') }}">
    </form>
    {{-- Form End --}}

    <!-- Category -->
    <section class="flat-spacing pb-0">
        <div class="container">
            <div dir="ltr" class="swiper tf-swiper" data-preview="6" data-tablet="4" data-mobile-sm="3" data-mobile="2"
                data-space-lg="30" data-space-md="15" data-space="10" data-pagination="2" data-pagination-sm="3"
                data-pagination-md="4" data-pagination-lg="6">
                <div class="swiper-wrapper">
                    <!-- slide 1 -->
                    @forelse ($categories as $category)
                        <div class="swiper-slide">
                            <a href="{{ route('web.shop-by-categories', $category->slug) }}" class="category-v01 hover-img">
                                <div class="cate-image img-style">
                                    <img loading="lazy" width="210" height="210"
                                        src="{{ asset('storage/uploads/'. $category->image->image_name) }}" alt="Image">
                                </div>
                                <h5 class="cate-name text-center link link-underline">{{ $category->category_name }}</h5>
                            </a>
                        </div>
                    @empty
                        
                    @endforelse
                    
                </div>
                <div class="sw-line-default style-2 tf-sw-pagination"></div>
            </div>
        </div>
    </section>
    <!-- /Category -->
    <!-- Filter -->
    <div class="offcanvas offcanvas-start canvas-filter" id="filterShop">
        <div class="canvas-wrapper">
            <div class="canvas-header">
                <div class="h5 title">Filters</div>
                <span class="icon-X2 fs-24 link icon-close-popup" data-bs-toggle="offcanvas"></span>
                <!-- <span class="icon-X2 link icon-close-popup fs-24 close-filter d-xl-none"></span> -->
            </div>
            <div class="canvas-body">
                <div class="widget-facet">
                    <div class="facet-title" data-bs-target="#category" role="button" data-bs-toggle="collapse"
                        aria-expanded="true" aria-controls="category">
                        <h6>Product Categories</h6>
                        <span class="icon icon-CaretDown"></span>
                    </div>
                    <div id="category" class="collapse show">
                        <ul class="collapse-body filter-group-check group-category">
                            @forelse($categories as $category)
                                <li class="list-item">
                                    <a href="{{ route('web.shop', ['category' => $category->slug]) }}" class="label link">
                                        <span class="cate-text">{{ $category->category_name }}</span>
                                        <span class="count">{{ optional($category->products)->count() ?? 0 }}</span>
                                    </a>
                                </li>
                            @empty
                                <li class="list-item">
                                    <p>No categories found.</p>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div class="br-line"></div>
                <div class="widget-facet">
                    <div class="facet-title" data-bs-target="#price" role="button" data-bs-toggle="collapse"
                        aria-expanded="true" aria-controls="price">
                        <h6>Filter By Price</h6>
                        <span class="icon icon-CaretDown"></span>
                    </div>
                    <div id="price" class="collapse show">
                        <div class="collapse-body widget-price filter-price">
                            <div class="price-val-range" id="price-value-range" data-min="0" data-max="1000"></div>
                            <div class="price-box tf-grid-layout tf-col-2">
                                <div class="box-wrap">
                                    <div class="price-val_wrap">
                                        <span class="cl-text-2 text-body-1">$</span>
                                        <div class="price-val" id="price-min-value"></div>
                                    </div>
                                </div>
                                <div class="box-wrap">
                                    <div class="price-val_wrap">
                                        <span class="cl-text-2 text-body-1">$</span>
                                        <div class="price-val" id="price-max-value"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="br-line"></div>
                <div class="widget-facet">
                    <div class="facet-title" data-bs-target="#size" role="button" data-bs-toggle="collapse"
                        aria-expanded="true" aria-controls="size">
                        <h6>Size</h6>
                        <span class="icon icon-CaretDown"></span>
                    </div>
                    <div id="size" class="collapse show">
                        <ul class="collapse-body filter-group-size">
                            <li>
                                <input class="ip-size d-none" type="checkbox" name="size" id="size-xs" value="XS" {{ request('size') == 'XS' ? 'checked' : '' }}>
                                <label for="size-xs" class="label-size">
                                    <span class="size-text fw-medium">XS</span>
                                </label>
                            </li>
                            <li>
                                <input class="ip-size d-none" type="checkbox" name="size" id="size-s" value="S" {{ request('size') == 'S' ? 'checked' : '' }}>
                                <label for="size-s" class="label-size">
                                    <span class="size-text fw-medium">S</span>
                                </label>
                            </li>
                            <li>
                                <input class="ip-size d-none" type="checkbox" name="size" id="size-m" value="M" {{ request('size') == 'M' ? 'checked' : '' }}>
                                <label for="size-m" class="label-size">
                                    <span class="size-text fw-medium">M</span>
                                </label>
                            </li>
                            <li>
                                <input class="ip-size d-none" type="checkbox" name="size" id="size-l" value="L" {{ request('size') == 'L' ? 'checked' : '' }}>
                                <label for="size-l" class="label-size">
                                    <span class="size-text fw-medium">L</span>
                                </label>
                            </li>
                            <li>
                                <input class="ip-size d-none" type="checkbox" name="size" id="size-xl" value="XL" {{ request('size') == 'XL' ? 'checked' : '' }}>
                                <label for="size-xl" class="label-size">
                                    <span class="size-text fw-medium">XL</span>
                                </label>
                            </li>
                            <li>
                                <input class="ip-size d-none" type="checkbox" name="size" id="size-2xl" value="2XL" {{ request('size') == '2XL' ? 'checked' : '' }}>
                                <label for="size-2xl" class="label-size">
                                    <span class="size-text fw-medium">2XL</span>
                                </label>
                            </li>
                            <li>
                                <input class="ip-size d-none" type="checkbox" name="size" id="size-3xl" value="3XL" {{ request('size') == '3XL' ? 'checked' : '' }}>
                                <label for="size-3xl" class="label-size">
                                    <span class="size-text fw-medium">3XL</span>
                                </label>
                            </li>
                            <li>
                                <input class="ip-size d-none" type="checkbox" name="size" id="over-size" value="free_size" {{ request('size') == 'free_size' ? 'checked' : '' }}>
                                <label for="over-size" class="label-size over-size">
                                    <span class="size-text fw-medium">Free Size</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="br-line"></div>
                <div class="widget-facet">
                    <div class="facet-title" data-bs-target="#color" role="button" data-bs-toggle="collapse"
                        aria-expanded="true" aria-controls="color">
                        <h6>Colors</h6>
                        <span class="icon icon-CaretDown"></span>
                    </div>
                    <div id="color" class="collapse show">
                        <ul class="collapse-body filter-group-check group-check-color">
                            @forelse ($colors as $color)
                                <li class="list-item">
                                    <fieldset class="field-color">
                                        <input type="radio" name="color" class="tf-check" id="color-{{ $color->name }}" value="{{ $color->code }}" {{ request('color') == $color->code ? 'checked' : '' }}>
                                        <label for="color-{{ $color->name }}" class="color bg-peach-blush" style="background-color: {{ $color->code }};"></label>
                                    </fieldset>
                                    <label for="color-{{ $color->name }}" class="label">
                                        <span class="color-text">{{ $color->name }}</span>
                                        <span class="count">({{ optional($color->products)->count() ?? 0 }})</span>
                                    </label>
                                </li>
                            @empty
                                <li>
                                    <span class="text-danger">No Colors Found</span>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div class="br-line"></div>
                <div class="widget-facet">
                    <div class="facet-title" data-bs-target="#availability" role="button" data-bs-toggle="collapse"
                        aria-expanded="true" aria-controls="availability">
                        <h6>Availability</h6>
                        <span class="icon icon-CaretDown"></span>
                    </div>
                    <div id="availability" class="collapse show">
                        <ul class="collapse-body filter-group-check">
                            <li class="list-item">
                                <input type="radio" name="availability" class="tf-check style-2" id="inStock">
                                <label for="inStock" class="label">
                                    <span class="cate-text">In stock</span>
                                    <span class="count">(32)</span>
                                </label>
                            </li>
                            <li class="list-item">
                                <input type="radio" name="availability" class="tf-check style-2" id="outStock">
                                <label for="outStock" class="label">
                                    <span class="cate-text">Out of stock</span>
                                    <span class="count">(2)</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="br-line"></div>
                <div class="widget-facet">
                    <div class="facet-title" data-bs-target="#brand" role="button" data-bs-toggle="collapse"
                        aria-expanded="true" aria-controls="availability">
                        <h6>Brands</h6>
                        <span class="icon icon-CaretDown"></span>
                    </div>
                    <div id="brand" class="collapse show">
                        <ul class="collapse-body filter-group-check">
                            <li class="list-item">
                                <input type="radio" name="brand" class="tf-check style-2" id="nike">
                                <label for="nike" class="label">
                                    <span class="brand-text">Nike</span>
                                    <span class="count">(112)</span>
                                </label>
                            </li>
                            <li class="list-item">
                                <input type="radio" name="brand" class="tf-check style-2" id="lv">
                                <label for="lv" class="label">
                                    <span class="brand-text">Louis Vuitton</span>
                                    <span class="count">(32)</span>
                                </label>
                            </li>
                            <li class="list-item">
                                <input type="radio" name="brand" class="tf-check style-2" id="hermes">
                                <label for="hermes" class="label">
                                    <span class="brand-text">Hermes</span>
                                    <span class="count">(42)</span>
                                </label>
                            </li>
                            <li class="list-item disabled">
                                <input type="radio" name="brand" class="tf-check style-2" id="gucci">
                                <label for="gucci" class="label">
                                    <span class="brand-text">Gucci</span>
                                    <span class="count">(13)</span>
                                </label>
                            </li>
                            <li class="list-item">
                                <input type="radio" name="brand" class="tf-check style-2" id="zalando">
                                <label for="zalando" class="label">
                                    <span class="brand-text">Zalando</span>
                                    <span class="count">(54)</span>
                                </label>
                            </li>
                            <li class="list-item disabled">
                                <input type="radio" name="brand" class="tf-check style-2" id="adidas">
                                <label for="adidas" class="label">
                                    <span class="brand-text">Adidas</span>
                                    <span class="count">(93)</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Filter -->
    <!-- Shop -->
    <div class="flat-spacing">
        <div class="container">
            <div class="tf-shop-control sticky-top no-offset sticky-top no-offset">
                <a href="#filterShop" data-bs-toggle="offcanvas" class="tf-btn-filter">
                    <span class="icon icon-filter"></span>
                    <span class="text">Show Filters</span>
                </a>
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
                    <li class="tf-view-layout-switch sw-layout-4 active d-none d-lg-flex" data-value-layout="tf-col-4">
                        <i class="icon-grid-4"></i>
                    </li>
                </ul>
                <div class="tf-control-sorting">
                    <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                        <div class="btn-select">
                            <span class="text-sort-value">Best Selling</span>
                            <span class="icon icon-CaretDown"></span>
                        </div>
                        <div class="dropdown-menu">
                            <div class="select-item active remove-all-filters" data-sort-value="best-selling">
                                <span class="text-value-item">Best Selling</span>
                            </div>
                            <div class="select-item dropdown-filter" data-sort-value="a-z">
                                <span class="text-value-item">Alphabetically, A-Z</span>
                            </div>
                            <div class="select-item dropdown-filter" data-sort-value="z-a">
                                <span class="text-value-item">Alphabetically, Z-A</span>
                            </div>
                            <div class="select-item dropdown-filter" data-sort-value="price-low-high">
                                <span class="text-value-item">Price, low to high</span>
                            </div>
                            <div class="select-item dropdown-filter" data-sort-value="price-high-low">
                                <span class="text-value-item">Price, high to low</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper-control-shop gridLayout-wrapper">
                <div class="meta-filter-shop">
                    <div id="product-count-list" class="count-text text-caption-01"></div>
                    <div id="product-count-grid" class="count-text text-caption-01"></div>
                    <div class="br-line type-vertical"></div>
                    <div id="applied-filters"></div>
                    <button id="remove-all" class="remove-all-filters" style="display: none;">
                        <i class="icon icon-X2"></i>
                        Clear all
                    </button>
                </div>
                <div class="tf-list-layout wrapper-shop" id="listLayout" style="display: none;">
                    <!-- Product 1 -->
                    <div class="card-product product-style_list" data-availability="In Stock" data-brand="Louis Vuitton">
                        <div class="card-product_wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="img-product" loading="lazy" width="330" height="440"
                                    src="assets/images/product/product-1.jpg" alt="Product">
                                <img class="img-hover" loading="lazy" width="330" height="440"
                                    src="assets/images/product/product-1_2.jpg" alt="Product">
                            </a>
                            <ul class="product-badge_list">
                                <li class="product-badge_item text-caption-01 new">NEW</li>
                            </ul>
                        </div>
                        <div class="card-product_info">
                            <a href="product-detail.html" class="name-product lh-24 fw-medium link-underline-text">
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
                            <p class="description text-caption-01 mb-10">
                                Button-up shirt sleeves and a relaxed silhouette. It’s tailored
                                with drapey, crinkle-texture fabric that’s made from LENZING™ ECOVERO™ Viscose —
                                responsibly sourced wood-based fibres produced through a process that reduces...
                            </p>
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
                            <ul class="product-size_list mb-10">
                                <li class="size-item text-caption-01">XS</li>
                                <li class="size-item text-caption-01">S</li>
                                <li class="size-item text-caption-01">M</li>
                            </ul>
                            <ul class="product-action_list">
                                <li>
                                    <a href="#shoppingCart" data-bs-toggle="offcanvas" class="hover-tooltip box-icon">
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
                </div>
                <div class="wrapper-shop tf-grid-layout tf-col-4" id="gridLayout">
                    <!-- Product 1 -->
                    @forelse ($products as $product)
                        <div class="card-product grid" data-availability="In Stock" data-brand="Louis Vuitton">
                            <div class="card-product_wrapper">
                                <a href="{{ route('web.product.show', $product->slug) }}" class="product-img">
                                    <img class="img-product" loading="lazy" width="330" height="440"
                                        src="{{ asset('storage/uploads/' . $product->images()->first()->image_name) }}" alt="Product">
                                    <img class="img-hover" loading="lazy" width="330" height="440"
                                        src="{{ asset('storage/uploads/' . ($product->images()->skip(1)->first()->image_name ?? $product->images()->first()->image_name)) }}" alt="Product">
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
                                </ul>
                            </div>
                        </div>
                    @empty

                    @endforelse

                    <div class="mt-2">{!! $products->links('pagination::bootstrap-5') !!}</div>
                    <!-- Pagination -->
                    {{-- <div class="wd-full justify-content-center">
                        <div class="tf-page-pagination">
                            <a href="#" class="pag-item">1</a>
                            <p class="pag-item active">2</p>
                            <a href="#" class="pag-item">3</a>
                            <a href="#" class="pag-item">
                                <i class="icon icon-CaretRightThin"></i>
                            </a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            // $('#filter-sort').val('best-selling');
            $('.dropdown-filter').on('click', function (e) {
                e.preventDefault();
                let dropDownValue = $(this).attr('data-sort-value');
                $('#filter-sort').val(dropDownValue);
                $('#shop-filter-form').submit();
                
            });

            $('.tf-check[name="color"]').on('change', function () {
                $('#filter-color').val($(this).val());
                $('#shop-filter-form').submit();
            });

            $('.ip-size[name="size"]').on('change', function () {
                $('#filter-size').val($(this).val());
                $('#shop-filter-form').submit();
            });

        });

    </script>
@endsection
