<footer class="footer">
    <div class="main-container">
        <div class="row" data-scroll data-scroll-speed="2">
            <div class="col-lg-4">
                <div class="sub-footer">
                    <div class="logo-footer">
                        <img src="{{ getSetting('logo_main', app()->getLocale())->value }}" alt="">
                    </div>
                    <p>
                        {{ getSetting('footer_desc', app()->getLocale())->value }}
                    </p>
                    <div class="soc-media-header">
                        <ul>
                            <li><a target="__blank" href="{{ getSetting('twitter')->value }}"><i
                                        class="bi bi-twitter-x"></i></a></li>
                            <li><a target="__blank" href="{{ getSetting('instagram')->value }}"><i
                                        class="bi bi-instagram"></i></a></li>
                            <li><a target="__blank" href="{{ getSetting('facebook')->value }}"><i
                                        class="bi bi-facebook"></i></a></li>
                            <li><a target="__blank" href="{{ getSetting('snapchat')->value }}"><i
                                        class="bi bi-snapchat"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="element-footer">
                    <h2>{{ __('روابط سريعة') }}</h2>

                    <ul>
                        <li><a href="{{ route('site.home') }}">{{ __('الرئيسية') }}</a></li>
                        <li><a href="{{ route('site.aboutUs.index') }}">{{ __('عن المكتب') }}</a></li>
                        <li><a href="{{ route('site.service.index') }}">{{ __('خدمات المكتب') }}</a></li>
                        <li><a href="{{ route('site.blog.index') }}">{{ __('أهم الأخبار') }}</a></li>
                        <li><a href="{{ route('site.contactUs.index') }}">{{ __('اتصل بنا') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="element-footer">
                    <h2>{{ __('الخدمات') }}</h2>
                    <ul>
                        @forelse ($servicesFooter as $serviceFooter)
                            <li><a
                                    href="{{ route('site.service.show', $serviceFooter->id) }}">{{ $serviceFooter->name }}</a>
                            </li>
                        @empty
                            <div class="col-12 d-flex justify-content-center align-items-center notFound">
                                {{-- <img src="{{ asset('site/images/not.png') }}"> --}}

                                <h2>{{ __('لايوجد خدمات') }} </h2>
                            </div>
                        @endforelse




                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="element-footer">
                    <h2>{{ __('بيانات التواصل') }}</h2>
                    <ul class="element-contect">
                        <li>
                            <a href="tel:{{ getSetting('phone')->value }}">
                                <img src="{{ asset('site/images/call.png') }}" alt="">
                                <div class="text-element-contect">
                                    <h4>{{ __('اتصل بنا') }}</h4>
                                    <p>0566772077 - 0114903977 </p>

                                </div>
                            </a>
                        </li>
                        <li>
                            <a target="__blank" href="mailto::{{ getSetting('email')->value }}">
                                <img src="{{ asset('site/images/message.png') }}" alt="">
                                <div class="text-element-contect">
                                    <h4>{{ __('الايميل') }}</h4>
                                    <p> {{ getSetting('email')->value }}</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <<a target="__blank"
                                href="https://www.google.com/maps?q={{ getSetting('lat')->value }},{{ getSetting('lng')->value }}">
                                <img src="{{ asset('site/images/location.png') }}" alt="">
                                <div class="text-element-contect">
                                    <h4>{{ __('العنوان') }}</h4>
                                    <p> {{ transWord(getSetting('address')->value, app()->getLocale()) }} </p>
                                </div>
                                </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="end-page">
            <p>
                {{ __('كل الحقوق محفوظة') }} {{ getSetting('main_fullname', app()->getLocale())->value }} &copy;
                {{ date('Y') }}
            </p>
            <a href=""> {{ __('صنع بكل حب') }} <i class="bi bi-heart-fill"></i> {{ __('في معامل جدارة') }} </a>
        </div>
    </div>
</footer>
