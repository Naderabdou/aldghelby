@extends('site.layouts.app')
@section('title', __('عن المكتب'))

@section('breadcrumb')
    <div class="title-page">
        <div class="main-container">
            <h2>{{ __('عن المكتب') }} </h2>
            <div class="breadcrumb-header">
                <a href="{{ route('site.home') }}"> <i class="bi bi-house"></i>{{ __('الرئيسية') }} </a>
                <i class="bi bi-chevron-double-left"></i>
                <span>{{ __('من نحن') }}</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="aboutus-page pg-section">
        <!-- start about index -->
        <div class="aboutus-index mr-section">
            <div class="main-container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="text-aboutus-index" data-scroll data-scroll-speed="-1.5">
                            <h3>{{ transWord('مكتب', app()->getLocale()) }}
                                <span
                                    style="color: var(--color-Primary1);">{{ getSetting('main_fullname', app()->getLocale())->value }}</span>
                                {{ transWord(
                                    ' محامون
                                                                                           ومستشارون أحد المكاتب الرائدة في مجال تقديم الخدمات القانونية لعملائه في   المملكة العربية السعودية وخارجها',
                                    app()->getLocale(),
                                ) }}
                            </h3>


                            <p>
                                {{ getSetting('about_desc_header', app()->getLocale())->value }}
                            </p>

                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="imgs-aboutus-index">
                            <div class="sub-img-aboutus-index" data-scroll data-scroll-speed="1.2">
                                <img src="{{ asset(getSetting('image_about_header')->value) }}" alt="">
                                <div class="num-about">
                                    <div class="counter-box">
                                        <div class="text-counter-number">
                                            <span class="counter"
                                                data-number="{{ getSetting('years_of_history')->value }}"></span>
                                            <h4>{{ __('تاريخ يمتد لاكثر من') }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sub-img-aboutus-index" data-scroll data-scroll-speed="-1.2">
                                <div class="img2-about">
                                    <div class="img-small">
                                        <img src="{{ asset(getSetting('image_about_header')->value) }}" alt="">
                                    </div>
                                    <img src="{{ asset(getSetting('image_about_header')->value) }}" alt="">

                                </div>
                            </div>
                            <div class="sub-img-aboutus-index " data-scroll data-scroll-speed="1.2">
                                <img src="{{ asset(getSetting('image_about_header')->value) }}" alt="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end about index -->

        <div class="visin-aboutus pg-section">
            <div class="main-container">
                <div class="row row-gap">
                    <div class="col-lg-4">
                        <div class="sub-visin-aboutus">
                            <div class="img-visin-aboutus">
                                <img src="{{ asset('site/images/a01.png') }}" alt="">
                            </div>
                            <h2>{{ __('رؤيتنا') }}</h2>
                            <p>
                                {{ getSetting('vision', app()->getLocale())->value }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sub-visin-aboutus">
                            <div class="img-visin-aboutus">
                                <img src="{{ asset('site/images/a02.png') }}" alt="">
                            </div>
                            <h2>{{ __('رسالتنا') }}</h2>
                            <p>
                                {{ getSetting('message', app()->getLocale())->value }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sub-visin-aboutus">
                            <div class="img-visin-aboutus">
                                <img src="{{ asset('site/images/a03.png') }}" alt="">
                            </div>
                            <h2>{{ __('الأهداف') }}</h2>
                            <p>
                                {{ getSetting('goals', app()->getLocale())->value }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="main-v-aboutus mr-section">
            <div class="main-container">
                <div class="video-about">
                    <img src="{{ asset('site/images/bg-v.png') }}" alt="">
                    <div class="btn-play-video">
                        <a class="lvideo"
                            data-url="https://www.youtube.com/watch?v=Dxh4gTI88PA&list=PLF8OvnCBlEY3kbFivlWbtoDCNjo4qRAZd&index=10">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21"
                                fill="none">
                                <path
                                    d="M1 10.5024V6.61386C1 1.5956 4.57484 -0.427471 8.9441 2.06852L12.3336 4.01277L15.7231 5.95702C20.0923 8.45301 20.0923 12.5517 15.7231 15.0477L12.3336 16.9919L8.9441 18.9362C4.57484 21.4322 1 19.3828 1 14.3908V10.5024Z"
                                    fill="#BB9338" stroke="#BB9338" stroke-width="1.5" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>

            </div>

        </div>

        <div class="more-aboutus  ">
            <div class="sub-container">
                <div class="row align-items-end">
                    <div class="col-lg-7">
                        <div class="text-more-aboutus pg-section">
                            <p>
                                {{ getSetting('about_down', app()->getLocale())->value }}
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="img-more-aboutus">
                            <img src="{{ asset(getSetting('image_about_footer')->value) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<!-- ================================ Only Page Style and Scripts ================================ -->
@push('css')
@endpush

@push('js')
@endpush
