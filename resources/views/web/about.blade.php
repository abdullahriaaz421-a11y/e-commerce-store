@extends('layouts.website');
@section('title', 'About')
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
                            About Us
                        </P>
                    </div>
                    <h3>
                        About Us
                    </h3>
                    <p class="text-body-1 cl-text-2">
                        With over 15 years of experience, we craft timeless collections that transcend
                        <br class="d-none d-lg-block">
                        trends and inspire lasting elegance.
                    </p>
                </div>
            </div>
        </section>
        <!-- /Page Title -->
        <!-- Main About -->
        <section class="section-main-about flat-spacing pt-0">
            <div class="container">
                <div class="flat-spacing-2">
                    <div class="hero-image">
                        <img loading="lazy" width="1410" height="600" src="{{ asset('website/assets/images/section/s-contact-1.jpg') }}"
                            alt="Image">
                    </div>
                </div>
                <div class="row align-items-center gy-4">
                    <div class="col-md-6">
                        <h2 class="text-capitalize">
                            Design, attention to detail &
                            efficiency to delight the world
                        </h2>
                    </div>
                    <div class="col-md-6">
                        <p class="text-body-1">
                            From the moment it is conceived to the moment it is worn, every one of our garments follows
                            this
                            path. We could do it at a fast pace. However, at Mango, we choose to take care of all those
                            who
                            are walking this path with us.
                        </p>
                    </div>
                </div>
                <div class="flat-spacing pb-0">
                    <div class="position-relative flat-spacing pb-0">
                        <div class="br-line fake-class top-0"></div>
                        <div dir="ltr" class="swiper tf-swiper" data-preview="4" data-tablet="3" data-mobile-sm="2"
                            data-mobile="1" data-space-lg="40" data-space-md="20" data-space="10" data-pagination="1"
                            data-pagination-sm="2" data-pagination-md="3" data-pagination-lg="4">
                            <div class="swiper-wrapper">
                                <!-- slide 1 -->
                                <div class="swiper-slide">
                                    <div class="box-why couter-side">
                                        <p class="h1 fw-medium">
                                            8.2k
                                        </p>
                                        <p class="title h5 fw-medium">
                                            Products Available
                                        </p>
                                        <p class="sub cl-text-2">
                                            We offer a wide selection of high-quality products to meet every need.
                                        </p>
                                    </div>
                                </div>
                                <!-- slide 2 -->
                                <div class="swiper-slide">
                                    <div class="box-why view-counter">
                                        <p class="h1 fw-medium">
                                            <span class="number" data-speed="1000" data-to="10">0</span><span>k</span>
                                        </p>
                                        <p class="title h5 fw-medium">
                                            Happy Customers
                                        </p>
                                        <p class="sub cl-text-2">
                                            Serving over 10,000 delighted customers who trust us for quality and
                                            service.
                                        </p>
                                    </div>
                                </div>
                                <!-- slide 3 -->
                                <div class="swiper-slide">
                                    <div class="swiper-slide">
                                        <div class="box-why view-counter">
                                            <p class="h1 fw-medium">
                                                <span class="number" data-speed="1000" data-to="96">0</span>
                                            </p>
                                            <p class="title h5 fw-medium">
                                                Partner Brand
                                            </p>
                                            <p class="sub cl-text-2">
                                                Our top-brand partnerships bring a trusted collection for your kitchen
                                                and home.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- slide 4 -->
                                <div class="swiper-slide">
                                    <div class="swiper-slide">
                                        <div class="box-why view-counter">
                                            <p class="h1 fw-medium">
                                                <span class="number" data-speed="1000" data-to="16">0</span><span>k</span>
                                            </p>
                                            <p class="title h5 fw-medium">
                                                Products For Sale
                                            </p>
                                            <p class="sub cl-text-2">
                                                That's why we strive to offer a diverse range of products that cater to
                                                all styles.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sw-dot-default tf-sw-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Main About -->
        <!-- Banner Why Choose -->
        <section class="themesFlat">
            <div class="container">
                <div class="banner-why-choose">
                    <div class="bn-image">
                        <img loading="lazy" width="640" height="480" src="{{ asset('website/assets/images/section/s-contact-2.jpg') }}"
                            alt="Image">
                    </div>
                    <div class="bn-content">
                        <h3 class="mb-12">
                            Offering Rare And Beautiful Items Worldwide
                        </h3>
                        <div class="" id="accordion-v2">
                            <div class="accordion-item_v2">
                                <div class="accordion-action lh-24 fw-medium" data-bs-target="#faq-1"
                                    data-bs-toggle="collapse" aria-expanded="true" aria-controls="faq-1" role="button">
                                    <span>Introduction</span>
                                    <span class="icon ic-accordion-custom cl-2"></span>
                                </div>
                                <div id="faq-1" class="collapse show" data-bs-parent="#accordion-v2">
                                    <p class="faq-content cl-text-2">
                                        Welcome to Amerce Store, your premier destination for fashion-forward clothing
                                        accessories. We pride ourselves on offering a curated selection of rare
                                        beautiful items sourced both locally and globally. Our mission is to bring you
                                        the latest trends & timeless styles, ensuring every piece reflects quality and
                                        elegance.
                                    </p>
                                </div>
                            </div>
                            <div class="accordion-item_v2">
                                <div class="accordion-action collapsed lh-24 fw-medium" data-bs-target="#faq-2"
                                    data-bs-toggle="collapse" aria-expanded="true" aria-controls="faq-2" role="button">
                                    <span>Our Vision</span>
                                    <span class="icon ic-accordion-custom cl-2"></span>
                                </div>
                                <div id="faq-2" class="collapse" data-bs-parent="#accordion-v2">
                                    <p class="faq-content cl-text-2">
                                        Welcome to Amerce Store, your premier destination for fashion-forward clothing
                                        accessories. We pride ourselves on offering a curated selection of rare
                                        beautiful items sourced both locally and globally. Our mission is to bring you
                                        the latest trends & timeless styles, ensuring every piece reflects quality and
                                        elegance.
                                    </p>
                                </div>
                            </div>
                            <div class="accordion-item_v2">
                                <div class="accordion-action collapsed lh-24 fw-medium" data-bs-target="#faq-3"
                                    data-bs-toggle="collapse" aria-expanded="true" aria-controls="faq-3" role="button">
                                    <span>What Sets Us Apart</span>
                                    <span class="icon ic-accordion-custom cl-2"></span>
                                </div>
                                <div id="faq-3" class="collapse" data-bs-parent="#accordion-v2">
                                    <p class="faq-content cl-text-2">
                                        Welcome to Amerce Store, your premier destination for fashion-forward clothing
                                        accessories. We pride ourselves on offering a curated selection of rare
                                        beautiful items sourced both locally and globally. Our mission is to bring you
                                        the latest trends & timeless styles, ensuring every piece reflects quality and
                                        elegance.
                                    </p>
                                </div>
                            </div>
                            <div class="accordion-item_v2">
                                <div class="accordion-action collapsed lh-24 fw-medium" data-bs-target="#faq-4"
                                    data-bs-toggle="collapse" aria-expanded="true" aria-controls="faq-4" role="button">
                                    <span>Our Commitment</span>
                                    <span class="icon ic-accordion-custom cl-2"></span>
                                </div>
                                <div id="faq-4" class="collapse" data-bs-parent="#accordion-v2">
                                    <p class="faq-content cl-text-2">
                                        Welcome to Amerce Store, your premier destination for fashion-forward clothing
                                        accessories. We pride ourselves on offering a curated selection of rare
                                        beautiful items sourced both locally and globally. Our mission is to bring you
                                        the latest trends & timeless styles, ensuring every piece reflects quality and
                                        elegance.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Banner Why Choose -->
        <!-- Testimonial -->
        <section class="flat-spacing">
            <div class="container">
                <div class="sect-heading type-2 text-center">
                    <h3 class="s-title">
                        Customer Say!
                    </h3>
                    <p class="s-desc text-body-1 cl-text-2">
                        Our customers adore our products, and we constantly aim to delight them.
                    </p>
                </div>
                <div dir="ltr" class="swiper tf-swiper" data-preview="2" data-tablet="2" data-mobile-sm="1"
                    data-mobile="1" data-space-lg="60" data-space-md="30" data-space="15" data-pagination="1"
                    data-pagination-sm="2" data-pagination-md="2" data-pagination-lg="2">
                    <div class="swiper-wrapper">
                        <!-- slide 1 -->
                        <div class="swiper-slide">
                            <div class="testimonial-v01 style-1 style-def">
                                <div class="tes-image">
                                    <img loading="lazy" width="285" height="380"
                                        src="{{ asset('website/assets/images/testimonial/tes-1.jpg') }}" alt="Image">
                                </div>
                                <div class="tes-content">
                                    <div class="star-wrap d-flex align-items-center">
                                        <i class="icon icon-Star fs-24"></i>
                                        <i class="icon icon-Star fs-24"></i>
                                        <i class="icon icon-Star fs-24"></i>
                                        <i class="icon icon-Star fs-24"></i>
                                        <i class="icon icon-Star fs-24"></i>
                                    </div>
                                    <div class="tes_author">
                                        <p class="author-name h5 fw-medium">Emma Collins</p>
                                        <div class="br-line"></div>
                                        <div class="author-verified">
                                            <i class="icon icon-CheckCircle1"></i>
                                            <span class="cl-text-2">
                                                Verified Buyer
                                            </span>
                                        </div>
                                    </div>
                                    <p class="tes_text h6">
                                        “Totally obsessed with this outfit! The fit is perfect, the fabric feels
                                        premium,
                                        and I’ve been getting compliments non-stop. It instantly lifts my confidence —
                                        such
                                        a great find!”
                                    </p>
                                    <div class="tes_product">
                                        <div class="product-image">
                                            <img class="aspect-ratio-1 object-fit-cover" loading="lazy" width="60"
                                                height="60" src="{{ asset('website/assets/images/product/square/product-4.jpg') }}"
                                                alt="Image">
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
                            <div class="testimonial-v01 style-1 style-def">
                                <div class="tes-image">
                                    <img loading="lazy" width="285" height="380"
                                        src="{{ asset('website/assets/images/testimonial/tes-2.jpg') }}" alt="Image">
                                </div>
                                <div class="tes-content">
                                    <div class="star-wrap d-flex align-items-center">
                                        <i class="icon icon-Star fs-24"></i>
                                        <i class="icon icon-Star fs-24"></i>
                                        <i class="icon icon-Star fs-24"></i>
                                        <i class="icon icon-Star fs-24"></i>
                                        <i class="icon icon-Star fs-24"></i>
                                    </div>
                                    <div class="tes_author">
                                        <p class="author-name h5 fw-medium">Sophia Ramirez</p>
                                        <div class="br-line"></div>
                                        <div class="author-verified">
                                            <i class="icon icon-CheckCircle1"></i>
                                            <span class="cl-text-2">
                                                Verified Buyer
                                            </span>
                                        </div>
                                    </div>
                                    <p class="tes_text h6">
                                        “I’m amazed by how comfortable yet stylish this piece is. It pairs effortlessly
                                        with everything, and the quality really stands out. Definitely becoming my go-to
                                        for everyday looks!”
                                    </p>
                                    <div class="tes_product">
                                        <div class="product-image">
                                            <img class="aspect-ratio-1 object-fit-cover" loading="lazy" width="60"
                                                height="60" src="{{ asset('website/assets/images/product/square/product-6.jpg') }}"
                                                alt="Image">
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
        <!-- Member -->
        <section class="flat-spacing pt-0">
            <div class="container">
                <div class="sect-heading type-2 text-center">
                    <h3 class="s-title">
                        Meet Our Teams
                    </h3>
                    <p class="s-desc text-body-1 cl-text-2">
                        Experts committed to excellence in every detail.
                    </p>
                </div>
                <div dir="ltr" class="swiper tf-swiper" data-preview="4" data-tablet="3" data-mobile-sm="2"
                    data-mobile="1" data-space-lg="30" data-space-md="20" data-space="10" data-pagination="1"
                    data-pagination-sm="2" data-pagination-md="3" data-pagination-lg="4">
                    <div class="swiper-wrapper">
                        <!-- slide 1 -->
                        <div class="swiper-slide">
                            <div class="card-member-v01 hover-img">
                                <div class="member-image">
                                    <div class="image img-style">
                                        <img loading="lazy" width="330" height="440"
                                            src="{{ asset('website/assets/images/member/member-1.jpg') }}" alt="Image">
                                    </div>
                                    <div class="social-wrap">
                                        <ul class="tf-social-icon-2 style-2 d-grid">
                                            <li><a href="https://www.facebook.com/"><i
                                                        class="icon icon-FacebookLogo"></i></a>
                                            </li>
                                            <li><a href="https://x.com/"><i class="icon icon-XLogo"></i></a></li>
                                            <li><a href="https://www.instagram.com/"><i
                                                        class="icon icon-InstagramLogo"></i></a></li>
                                            <li><a href="https://www.tiktok.com/"><i class="icon icon-TiktokLogo"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="member-info">
                                    <a href="#" class="name h5 fw-medium link-underline link">
                                        Annette Black
                                    </a>
                                    <p class="duty cl-text-2">
                                        Founder/CEO
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- slide 2 -->
                        <div class="swiper-slide">
                            <div class="card-member-v01 hover-img">
                                <div class="member-image">
                                    <div class="image img-style">
                                        <img loading="lazy" width="330" height="440"
                                            src="{{ asset('website/assets/images/member/member-2.jpg') }}" alt="Image">
                                    </div>
                                    <div class="social-wrap">
                                        <ul class="tf-social-icon-2 style-2 d-grid">
                                            <li><a href="https://www.facebook.com/"><i
                                                        class="icon icon-FacebookLogo"></i></a>
                                            </li>
                                            <li><a href="https://x.com/"><i class="icon icon-XLogo"></i></a></li>
                                            <li><a href="https://www.instagram.com/"><i
                                                        class="icon icon-InstagramLogo"></i></a></li>
                                            <li><a href="https://www.tiktok.com/"><i class="icon icon-TiktokLogo"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="member-info">
                                    <a href="#" class="name h5 fw-medium link-underline link">
                                        Brooklyn Simmons
                                    </a>
                                    <p class="duty cl-text-2">
                                        Manager
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- slide 3 -->
                        <div class="swiper-slide">
                            <div class="card-member-v01 hover-img">
                                <div class="member-image">
                                    <div class="image img-style">
                                        <img loading="lazy" width="330" height="440"
                                            src="{{ asset('website/assets/images/member/member-3.jpg') }}" alt="Image">
                                    </div>
                                    <div class="social-wrap">
                                        <ul class="tf-social-icon-2 style-2 d-grid">
                                            <li><a href="https://www.facebook.com/"><i
                                                        class="icon icon-FacebookLogo"></i></a>
                                            </li>
                                            <li><a href="https://x.com/"><i class="icon icon-XLogo"></i></a></li>
                                            <li><a href="https://www.instagram.com/"><i
                                                        class="icon icon-InstagramLogo"></i></a></li>
                                            <li><a href="https://www.tiktok.com/"><i class="icon icon-TiktokLogo"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="member-info">
                                    <a href="#" class="name h5 fw-medium link-underline link">
                                        Jane Cooper
                                    </a>
                                    <p class="duty cl-text-2">
                                        Sales Director
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- slide 4 -->
                        <div class="swiper-slide">
                            <div class="card-member-v01 hover-img">
                                <div class="member-image">
                                    <div class="image img-style">
                                        <img loading="lazy" width="330" height="440"
                                            src="{{ asset('website/assets/images/member/member-4.jpg') }}" alt="Image">
                                    </div>
                                    <div class="social-wrap">
                                        <ul class="tf-social-icon-2 style-2 d-grid">
                                            <li><a href="https://www.facebook.com/"><i
                                                        class="icon icon-FacebookLogo"></i></a>
                                            </li>
                                            <li><a href="https://x.com/"><i class="icon icon-XLogo"></i></a></li>
                                            <li><a href="https://www.instagram.com/"><i
                                                        class="icon icon-InstagramLogo"></i></a></li>
                                            <li><a href="https://www.tiktok.com/"><i class="icon icon-TiktokLogo"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="member-info">
                                    <a href="#" class="name h5 fw-medium link-underline link">
                                        Lisa Bonet
                                    </a>
                                    <p class="duty cl-text-2">
                                        Sales Director
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sw-line-default style-2 tf-sw-pagination"></div>
                </div>
            </div>
        </section>
        <!-- /Member -->
    </main>

@endsection
