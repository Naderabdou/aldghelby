<div class="bg_menu "></div>
<div class="menu_responsive" id="menu-div" data-scroll-sticky>
    <div class="element_menu_responsive">
        <ul>
            <li><a href="{{ route('site.home') }}" class=" {{ isActiveRoute('site.home') }}">{{ __('الرئيسية') }}</a>
            </li>
            <li><a href="{{ route('site.aboutUs.index') }}"
                   class=" {{ isActiveRoute('site.aboutUs.index') }}">{{ __('عن المكتب') }}</a></li>
            <li><a href="{{ route('site.service.index') }}"
                   class=" {{ areActiveRoutes(['site.service.index','site.service.show']) }}">{{ __('خدمات المكتب') }}</a>
            </li>
            <li><a href="{{ route('site.blog.index') }}"
                   class=" {{ areActiveRoutes(['site.blog.index','site.blog.show']) }}">{{ __('أهم الأخبار') }}</a></li>
            <li><a href="{{ route('site.contactUs.index') }}" class=" {{ isActiveRoute('site.contactUs.index') }}">
                    {{ __('تواصل معنا') }}</a></li>
        </ul>
    </div>
    <div class="btns_menu_responsive">
        <a href="{{ route('site.service.index') }}" class="ctm-btn">{{ __('طلب استشارة') }}</a>
    </div>
    <div class="remove-mune">
        <span></span>
    </div>
</div>
