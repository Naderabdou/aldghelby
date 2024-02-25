@extends('dashboard.layouts.app')

@section('title' , 'لوحة التحكم')

@section('content')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Analytics Start -->
            <section id="dashboard-analytics">
                <div class="row match-height">
                    <!-- Greetings Card starts -->
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card card-congratulations">
                            <div class="card-body text-center">
                                <img src="{{ url('dashboard') }}/app-assets/images/elements/decore-left.png" class="congratulations-img-left" alt="card-img-left" />
                                <img src="{{ url('dashboard') }}/app-assets/images/elements/decore-right.png" class="congratulations-img-right" alt="card-img-right" />
                                <div class="avatar avatar-xl bg-primary shadow">
                                    <div class="avatar-content">
                                        <i data-feather="award" class="font-large-1"></i>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h1 class="mb-1 text-white">مرحباً {{ auth()->user()->name }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Greetings Card ends -->

                </div>

            </section>
            <!-- Dashboard Analytics end -->

        </div>
    </div>
</div>



@push('js')

@endpush
@endsection
