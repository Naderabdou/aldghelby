@extends('dashboard.layouts.app')

@section('content')
    <!-- start error
        ================ -->
        <section class="error-pg">
        <div class="container">
            <div class="row" data-scroll data-scroll-speed="1">
                <div class="error_page">
                    <img src="{{ asset('dashboard/app-assets/images/png/404.png') }}" alt="Error">
                </div>
            </div>
        </div>
    </section>
    <!--end error-->
@endsection
