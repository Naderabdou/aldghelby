<div class="nav-bar">
    <div class="main-container">
        <div class="logo">
            <a href="{{ route('site.home') }}">
                <img src="{{ getSetting('logo', app()->getLocale())->value }}" alt="">
            </a>
        </div>

        <div class="element">
            <ul>
                <li><a href="{{ route('site.home') }}" class=" {{ isActiveRoute('site.home') }}">{{ __('الرئيسية') }}</a>
                </li>
                <li><a href="{{ route('site.aboutUs.index') }}"
                        class=" {{ isActiveRoute('site.aboutUs.index') }}">{{ __('عن المكتب') }}</a></li>
                <li><a href="{{ route('site.service.index') }}"
                        class=" {{ areActiveRoutes(['site.service.index', 'site.service.show']) }}">{{ __('خدمات المكتب') }}</a>
                </li>
                <li><a href="{{ route('site.blog.index') }}"
                        class=" {{ areActiveRoutes(['site.blog.index', 'site.blog.show']) }}">{{ __('أهم الأخبار') }}</a>
                </li>
                <li><a href="{{ route('site.contactUs.index') }}"
                        class=" {{ isActiveRoute('site.contactUs.index') }}">{{ __('تواصل معنا') }}</a></li>
            </ul>
        </div>

        <div class="btn-top-bar">
            <a href="{{ route('site.service.index') }}" class="btn-order-header ctm-btn">{{ __('طلب استشارة') }}</a>
            <div class="menu-div">
                <div class="content" id="times-ican">
                    <a href="#" title="Navigation menu" class="navicon" aria-label="Navigation">
                        <span class="navicon__item"></span>
                        <span class="navicon__item"></span>
                        <span class="navicon__item"></span>
                        <span class="navicon__item"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
