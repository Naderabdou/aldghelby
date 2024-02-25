@include('dashboard.layouts.header')
@include('dashboard.layouts.navbar')
@include('dashboard.layouts.sidebar')
    <!-- BEGIN: Content-->
        @yield('content')
    <!-- END: Content-->
@include('dashboard.layouts.footer')
