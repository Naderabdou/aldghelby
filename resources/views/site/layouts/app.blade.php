<!DOCTYPE html>

<html>

<head>
    <title> {{ getSetting('main_fullname',app()->getLocale())->value }} | @yield('title') </title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content=" website"/>
    <meta name="keywords" content=""/>
    <meta name="author" content=""/>
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="msapplication-TileColor" content="">
    <link rel="shortcut icon" href="{{ asset('site/images/title.png') }}">
    @seo

    <!-- ================================ Style Section ================================ -->
    @include('site.layouts.partials.style')

</head>

<body>


<div class="main-scroll-page" data-scroll-container>

    <!-- ================================ Header Section ================================ -->
    @include('site.layouts.partials.header')
    <!-- ================================ App Section ================================ -->
    <main id="app" data-scroll-section>
        <!-- ================================ Content Section ================================ -->
        <div class="page-scroll">
            @yield('content')
        </div>
        <!-- ================================ Footer Section ================================ -->
        @include('site.layouts.partials.footer')
    </main>

    <!-- ================================ Responsive Menu Section ================================ -->
    @include('site.layouts.partials.responsive-menu')

</div>

<!-- ================================ Scripts Section ================================ -->
@include('site.layouts.partials.script')

</body>
</html>
