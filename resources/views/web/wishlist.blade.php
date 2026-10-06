@extends('layouts.website')
@section('title', 'Wishlist')
@section('content')
    <!-- /Header -->
    <!-- Page Title -->
    <section class="section-page-title text-center flat-spacing-2 pb-0">
        <div class="container">
            <div class="main-page-title">
                <div class="breadcrumbs">
                    <a href="{{ route('web.home') }}" class="text-caption-01 cl-text-3 link">Home</a>
                    <i class="icon icon-CaretRightThin cl-text-3"></i>
                    <P class="text-caption-01">
                        Your Wishlist
                    </P>
                </div>
                <h3>
                    Your Wishlist
                </h3>
                <p class="text-body-1 cl-text-2">
                    Explore your saved favorites, manage your wishlist effortlessly,
                    <br class="d-none d-lg-block">
                    and keep track of the items you love most.
                </p>
            </div>
        </div>
    </section>
    <!-- /Page Title -->
    <!-- Wishlist -->
    <div class="section-wishlist flat-spacing">
        <div class="container">
            <div class="tf-grid-layout tf-col-2 md-col-3 xl-col-4 wrapper-wishlist">
                @forelse ($wishlists as $wishlist)
                    @php
                        $product = $wishlist->product;
                        $images = $product->images;
                    @endphp
                    <div class="card-product wishlist-card" data-wishlist-id="{{ $wishlist->id }}">
                        <div class="card-product_wrapper">
                            {{-- Product Image --}}
                            @if ($images->count() > 0)
                                <a href="{{ route('web.product.show', $product->slug) }}" class="product-img">
                                    <img class="img-product" loading="lazy" width="330" height="440"
                                        src="{{ asset('storage/uploads/' . $images[0]->image_name) }}"
                                        alt="{{ $product->name }}">
                                    <img class="img-hover" loading="lazy" width="330" height="440"
                                        src="{{ asset('storage/uploads/' . ($images[1]->image_name ?? $images[0]->image_name)) }}"
                                        alt="{{ $product->name }}">
                                </a>
                            @endif
                            {{-- Product Actions --}}
                            <ul class="product-action_list">
                                {{-- Compare --}}
                                <li class="compare">
                                    <a href="#compare" data-bs-toggle="offcanvas"
                                        class="hover-tooltip tooltip-left box-icon">
                                        <span class="icon icon-ArrowsLeftRight"></span>
                                        <span class="tooltip">
                                            Compare
                                        </span>
                                    </a>
                                </li>
                                {{-- Quick View --}}
                                <li>
                                    <a href="#quickView" data-bs-toggle="offcanvas"
                                        class="hover-tooltip tooltip-left box-icon">
                                        <span class="icon icon-Eye"></span>
                                        <span class="tooltip">
                                            Quick view
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            {{-- New Badge --}}
                            <ul class="product-badge_list">
                                <li class="product-badge_item text-caption-01 new">
                                    NEW
                                </li>
                            </ul>
                            {{-- Remove Wishlist --}}
                            <button type="button"
                                class="product-action_remove remove box-icon hover-tooltip tooltip-left wishlist-remove-btn"
                                data-wishlist-id="{{ $wishlist->id }}">
                                <i class="icon icon-trash"></i>
                                <span class="tooltip">
                                    Remove
                                </span>
                            </button>
                            {{-- Quick Add --}}
                            <div class="product-action_bot">
                                <a href="#quickAdd" data-bs-toggle="modal" class="tf-btn btn-white small w-100">
                                    Quick Add
                                </a>
                            </div>
                        </div>
                        {{-- Product Information --}}
                        <div class="card-product_info">
                            {{-- Product Name --}}
                            <a href="{{ route('web.product.show', $product->slug) }}"
                                class="name-product lh-24 fw-medium link-underline-text">
                                {{ $product->name }}
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
                                    ${{ $product->price }}
                                </span>
                                @if ($product->sale_price)
                                    <span class="price-old text-caption-01 cl-text-3">
                                        ${{ $product->sale_price }}
                                    </span>
                                @endif
                            </div>
                            {{-- Colors --}}
                            @if (!empty($product->colors))
                                <ul class="product-color_list">
                                    @foreach ($product->colors as $color)
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="mr-2"
                                                    style="
                                                    width: 30px;
                                                    height: 30px;
                                                    background-color: {{ $color }};
                                                    border: 1px solid #ccc;
                                                    border-radius: 50%;
                                                ">
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="wd-full text-center">
                        <h4>
                            Your Wishlist is Empty
                        </h4>
                        <p class="text-body-1 cl-text-2">
                            You haven't added any products to your wishlist yet.
                        </p>
                        <a href="{{ route('web.home') }}" class="tf-btn btn-dark mt-3">
                            Continue Shopping
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- /Wishlist -->
@endsection
@section('scripts')
    <script>
        $(document).on('click', '.wishlist-remove-btn', function(e) {
            e.preventDefault();
            let button = $(this);
            let wishlistId = button.data('wishlist-id');
            let card = button.closest('.wishlist-card');

            $.ajax({
                url: "{{ url('/wishlist') }}/" + wishlistId,
                type: "DELETE",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status) {
                        card.fadeOut(300, function() {
                            $(this).remove();
                        });
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    </script>
@endsection
