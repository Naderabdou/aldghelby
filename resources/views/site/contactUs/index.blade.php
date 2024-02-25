@extends('site.layouts.app')
@section('title', __('تواصل معنا'))

@section('breadcrumb')
    <div class="title-page">
        <div class="main-container">
            <h2>{{ __('تواصل معنا') }}</h2>
            <div class="breadcrumb-header">
                <a href="{{ route('site.home') }}"> <i class="bi bi-house"></i> {{ __('الرئيسية') }}</a>
                <i class="bi bi-chevron-double-left"></i>
                <span>{{ __('تواصل معنا') }}</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="contactus-page pg-section">
        <div class="main-container ">
            <div class="info-contactus" data-scroll data-scroll-direction="horizontal" data-scroll-speed="1.5">
                <div class="row row-gap">
                    <div class="col-lg-4">
                        <a target="__blank" href="https://www.google.com/maps?q={{ getSetting('lat')->value }},{{ getSetting('lng')->value }}">
                        <div class="sub-info-contactus">
                            <div class="img-info-contactus">
                                <img src="{{ asset('site/images/c1.png') }}" alt="">
                            </div>
                            <div class="text-info-contactus">
                                <h3>{{ __('العنوان') }}</h3>
                                <p> {{ transWord(getSetting('address')->value, app()->getLocale()) }} </p>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-4">

                            <div class="sub-info-contactus">
                                <div class="img-info-contactus">
                                    <img src="{{ asset('site/images/c2.png') }}" alt="">
                                </div>
                                <div class="text-info-contactus">
                                    <h3>{{ __('رقم الجوال') }}</h3>
                                    <p>
                                        <a href="tel:{{  getSetting('phone')->value }}">{{ getSetting('phone')->value }}</a> -
                                       <a href="tel:{{  getSetting('phone_other')->value }}">{{ getSetting('phone_other')->value }}</a>


                                   </p>
                                </div>
                            </div>


                    </div>
                    <div class="col-lg-4">
                        <a target="__blank" href="mailto::{{ getSetting('email')->value }}">
                            <div class="sub-info-contactus">
                                <div class="img-info-contactus">
                                    <img src="{{ asset('site/images/c3.png') }}" alt="">
                                </div>
                                <div class="text-info-contactus">
                                    <h3>{{ __('البريد الإلكتروني') }}</h3>
                                    <p> {{ getSetting('email')->value }} </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <div class="contactus-index pg-section mr-section">
            <div class="main-container">
                <div class="title-contactus-index">
                    <img src="{{ asset('site/images/logo-contect.png') }}" alt="">
                    <h2 data-scroll data-scroll-direction="horizontal" data-scroll-speed="1.1">
                        {{ __('فى حال رغبت بالحصول على استشارة قانونية') }}</h2>
                    <p data-scroll data-scroll-direction="horizontal" data-scroll-speed="-1.1">
                        {{ __('يمكنك الاعتماد على استشاراتنا القانونية الشاملة والسريعة. كل ما عليك هو الاتصال بنا  وستحصل على إجابات') }}
                    </p>
                </div>
                <div class="main-contactus-index">
                    <form action="" id="form_contact" method="POST">
                        @csrf
                        <div class="form-contactus">
                            <div class="title-start">
                                <h2>{{ __('تواصل معنا') }}</h2>
                            </div>
                            <div class="row ">
                                <div class="col-lg-6 pg-col">
                                    <div class="input-form">
                                        <input type="text" placeholder="{{ __('الاسم الاول') }}" class="form-control"
                                            name="first_name">
                                        <div style="color: red" id="first_name_error" class="error-message"></div>

                                    </div>
                                </div>
                                <div class="col-lg-6 pg-col">
                                    <div class="input-form">
                                        <input type="text" placeholder="{{ __('الاسم الثاني') }}" class="form-control"
                                            name="last_name">
                                        <div style="color: red" id="last_name_error" class="error-message"></div>

                                    </div>
                                </div>
                                <div class="col-lg-6 pg-col">
                                    <div class="input-form">
                                        <input type="tel" placeholder="{{ __('رقم الجوال') }}" class="form-control"
                                            name="phone">
                                        <div style="color: red" id="phone_error" class="error-message"></div>

                                    </div>
                                </div>
                                <div class="col-lg-6 pg-col">
                                    <div class="input-form">
                                        <input type="email" placeholder="{{ __('البريد الالكتروني') }}"
                                            class="form-control" name="email">
                                        <div style="color: red" id="email_error" class="error-message"></div>

                                    </div>
                                </div>
                                <div class="col-lg-12 pg-col">
                                    <div class="input-form">
                                        <textarea class="form-control" placeholder="{{ __('موضوع الرسالة') }}" name="message"></textarea>
                                        <div style="color: red" id="message_error" class="error-message"></div>

                                    </div>
                                </div>
                                <div class="col-lg-12 pg-col">
                                    <button id="submit_contact" class="ctm-btn mt-2 w-100">{{ __('إرسال') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div id="map" style="height: 580px; width: 50%;"
                        data-address="{{ transWord(getSetting('address')->value, app()->getLocale()) }}"></div>

                    <input type="hidden" name="lat" value="{{ getSetting('lat')->value }}">
                    <input type="hidden" name="lng" value="{{ getSetting('lng')->value }}">
                </div>
            </div>
        </div>
    </section>
@endsection

<!-- ================================ Only Page Style and Scripts ================================ -->
@push('css')
@endpush

@push('js')
<script>
    window.language = "{{ app()->getLocale() }}";
</script>
    <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdarVlRZOccFIGWJiJ2cFY8-Sr26ibiyY&libraries=places&callback=initAutocomplete&language={{ app()->getLocale() }}" async defer></script>
    <script src="{{ asset('site/js/map.js') }}"></script>
@endpush
