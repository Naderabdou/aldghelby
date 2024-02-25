@extends('site.layouts.app')
@section('title', __('الرئيسية'))
@title(getSetting('seo_title', app()->getLocale())->value)
@description(Str::limit(getSetting('desc_seo', app()->getLocale())->value, 160))
@keywords(implode(',', json_decode(getSetting('keyword', app()->getLocale())->value)))
@image(asset(getSetting('logo', app()->getLocale())->value))

@section('content')
    <!-- ================================ Hero Section ================================ -->
    <section class="hero">
        <div class="owl-carousel owl-theme maincarousel" id="slider-hero">
            @foreach ($sliders as $slider)
                <div class="item">
                    <div class="sub-hero">
                        <div class="sub-container">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="text-hero">
                                        <h2> {{ getSetting('main_fullname', app()->getLocale())->value }} </h2>
                                        <p>
                                            {{ Str::limit($slider->title, 100) }}
                                        </p>
                                        <a href="{{ route('site.aboutUs.index') }}"
                                            class="ctm-btn btn-b">{{ __('المزيد') }}</a>
                                    </div>
                                </div>

                                <div class="col-lg-6 pg-none">
                                    <div class="img-hero">
                                        <img src="{{ $slider->image_path }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>

    </section>

    <!-- ================================ About Us Section ================================ -->
    <section class="aboutus-index pg-section mr-section">
        <div class="main-container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-aboutus-index" data-scroll data-scroll-speed="-1.5">
                        <div class="title-start">
                            <h2>{{ __('عن المكتب') }}</h2>
                        </div>

                        <p> {{ getSetting('home_about', app()->getLocale())->value }} </p>
                        <ul>
                            @foreach ($features as $feature)
                                <li>
                                    <div class="img-text-aboutus-index">
                                        <img src="{{ $feature->icon_path }}" alt="">
                                    </div>
                                    <div class="sub-text-about-index">
                                        <h2>{{ $feature->title }}</h2>
                                        <p>{{ Str::limit($feature->desc, 150) }}</p>
                                    </div>
                                </li>
                            @endforeach


                        </ul>
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
    </section>

    <!-- ================================ Services Section ================================ -->
    <section class="services-index mr-section pg-section">
        <div class="main-container">
            <div class="title-center">
                <h2>{{ __('خدمات المكتب القانونية') }}</h2>
            </div>

            <div class="main-services-index" data-scroll data-scroll-direction="horizontal" data-scroll-speed="1.5">

                @forelse ($services as $service)
                    <div class="sub-services-index">
                        <div class="img-services-index">
                            <img src="{{ $service->icon_path }}" alt="">
                        </div>
                        <div class="text-services-index">
                            <h2>{{ $service->name }}</h2>
                            <p>
                                {{ Str::limit($service->desc, 150) }}
                            </p>
                        </div>
                        <a href="{{ route('site.service.show', $service->id) }}"><i class="bi bi-arrow-left"></i></a>
                    </div>
                @empty
                    <div class="notFound">
                        {{-- <img src="{{ asset('site/images/not.png') }}"> --}}
                        <img src="{{ asset('site/images/notFound.png') }}">

                        <h2>{{ __('لايوجد خدمات') }} </h2>
                    </div>
                @endforelse





            </div>
        </div>
    </section>

    <!-- ================================ Customers Section ================================ -->
    <section class="customers-index mr-section">
        <div class="row align-items-center pg-none">
            <div class="col-lg-5  pg-none">
                <div class="title-customers-index" data-scroll data-scroll-speed="1.5">
                    <div class="title-start title-w">
                        <h2>{{ __('اراء عملائنا') }}</h2>
                    </div>
                    <p>
                        {{ getSetting('clients_desc', app()->getLocale())->value }}
                    </p>
                </div>
            </div>
            <div class="col-lg-7 pg-none">
                <div class="slider-customers" data-scroll data-scroll-speed="-1.5">
                    <div class="lines-customers">
                        <span></span>
                        <span></span>
                    </div>
                    <div class="owl-carousel owl-theme maincarousel" id="slider-customers">
                       @forelse ($clients as $client)
                       <div class="item">
                             <div class="sub-slider-customers">
                                 <p>
                                    {{ $client->desc }}
                                </p>
                              <div class="user-customers">
                                      <div class="img-users">
                                         <img src="{{ $client->image_path }}" alt="">
                                        </div>
                                    <h2>{{ $client->name }}</h2>
                              </div>
                         </div>
                    </div>
                       @empty
                       <div class="notFound">
                        {{-- <img src="{{ asset('site/images/not.png') }}"> --}}
                        <img src="{{ asset('site/images/notFound.png') }}">

                        <h2>{{ __('لايوجد اراء عملاء') }} </h2>
                    </div>
                       @endforelse








                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================================ Blog Section ================================ -->
    <section class="blog-index mr-section">
        <div class="main-container">
            <div class="title-center">
                <h2>{{ __('أهم الأخبار') }}</h2>
            </div>
            <div class="row row-gap">

                @forelse ($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="sub-blog-index">
                            <div class="img-blog-index">
                                <img src="{{ $blog->image_path }}" alt="{{ __('لا يوجد صورة') }}">
                                <div class="date-bolg">
                                    <h3>{{ $blog->created_at }}</h3>
                                </div>
                            </div>
                            <div class="text-blog-index">
                                <h2>
                                    {{ Str::limit($blog->title, 100) }}
                                </h2>
                                <p>
                                    {{ Str::limit($blog->desc, 200) }}
                                </p>

                                <a href="{{ route('site.blog.show', $blog->id) }}"
                                    class="ctm-link">{{ __('قراءة المزيد') }}</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="notFound">
                        {{-- <img src="{{ asset('site/images/not.png') }}"> --}}
                        <img src="{{ asset('site/images/notFound.png') }}">

                        <h2>{{ __('لا يوجد اخبار') }} </h2>
                    </div>
                @endforelse





            </div>
        </div>
    </section>

    <!-- ================================ Contact Us Section ================================ -->
    <section class="contactus-index pg-section">
        <div class="main-container">
            <div class="title-contactus-index">
                <img src="{{ asset('site/images/logo-contect.png') }}" alt="">
                <h2 data-scroll data-scroll-direction="horizontal" data-scroll-speed="1.1">
                    {{ __('فى حال رغبت بالحصول على استشارة قانونية') }}
                </h2>
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
                    data-address="{{ getSetting('address')->value }}"></div>

                <input type="hidden" name="lat" value="{{ getSetting('lat')->value }}">
                <input type="hidden" name="lng" value="{{ getSetting('lng')->value }}">
            </div>
        </div>
    </section>
@endsection
@push('css')
@endpush
@push('js')
<script>
    window.language = "{{ app()->getLocale() }}";
</script>
    <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdarVlRZOccFIGWJiJ2cFY8-Sr26ibiyY&libraries=places&callback=initAutocomplete&language={{ app()->getLocale() }}" async defer></script>
    <script src="{{ asset('site/js/map.js') }}"></script>
@endpush
