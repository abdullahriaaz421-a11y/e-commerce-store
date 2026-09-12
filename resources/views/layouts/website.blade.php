<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head>
        <meta charset="utf-8" />
        <title>
            @if (Request::routeIs('web.home'))
                {{ config('app.name') }}
            @else
                @yield('title')
            @endif
        </title>
        <meta name="author" content="themesflat.com" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta
            name="description"
            content="Themesflat Amerce - A modern and elegant Multipurpose eCommerce HTML Template, perfect for online stores selling rings, necklaces, watches, and other accessories. SEO-optimized, fast-loading, and fully customizable."
        />

        <!-- font -->
        <link rel="stylesheet" href="{{ asset('website/assets/fonts/fonts.css') }}" />
        <link rel="stylesheet" href="{{ asset('website/assets/icon/icomoon/style.css') }}" />
        <!-- css -->
        <link rel="stylesheet" href="{{ asset('website/assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('website/assets/css/swiper-bundle.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('website/assets/css/animate.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('website/assets/css/styles.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('website/assets/css/drift-basic.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('website/assets/css/photoswipe.css') }}" />

        <!-- Favicon and Touch Icons  -->
        <link rel="shortcut icon" href="{{ asset('website/assets/images/logo/favicon.svg') }}" />
        <link rel="apple-touch-icon-precomposed" href="{{ asset('website/assets/images/logo/favicon.svg') }}" />
        @yield('head')
    </head>

    <body>
        <x-header />
        @yield('content')
        <x-footer />

        <!-- Javascript -->
        <script src="{{ asset('website/assets/js/plugin/bootstrap.min.js') }}"></script>
        <script src="{{ asset('website/assets/js/plugin/jquery.min.js') }}"></script>
        <script src="{{ asset('website/assets/js/plugin/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('website/assets/js/plugin/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('website/assets/js/plugin/drift.min.js') }}"></script>
        <script src="{{ asset('website/assets/js/plugin/count-down.js') }}"></script>
        <script src="{{ asset('website/assets/js/plugin/infinityslide.js') }}"></script>
        <script src="{{ asset('website/assets/js/plugin/wow.min.js') }}"></script>

        <script src="{{ asset('website/assets/js/carousel.js') }}"></script>
        <script src="{{ asset('website/assets/js/main.js') }}"></script>
        <script src="{{ asset('website/assets/js/zoom.js') }}"></script>
        <script src="{{ asset('website/assets/js/plugin/photoswipe-lightbox.umd.min.js') }}"></script>
        <script src="{{ asset('website/assets/js/plugin/photoswipe.umd.min.js') }}"></script>
    </body>
</html>
