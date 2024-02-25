<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset(getSetting('logo', app()->getLocale())->value) }}" width="150px" alt="">
                </a>

            </li>

        </ul>
    </div>
    <div class="divider"></div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">

            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item {{ isActiveRoute('admin.home') }}"><a class="d-flex align-items-center"
                        href="{{ route('admin.home') }}">
                        <img src="{{ asset('dashboard/icons/home.png') }}" alt="Home Icon" width="30px"
                            style="margin-right: 5px;">
                        <span class="menu-title text-truncate" style="flex: 1; margin-right:10px">الصفحة الرئيسية</span></a>
                </li>

                <li
                    class="nav-item {{ areActiveRoutes(['admin.services.index', 'admin.services.create', 'admin.services.edit']) }}">
                    <a class="d-flex align-items-center" href="{{ route('admin.services.index') }}">
                        <img src="{{ asset('dashboard/icons/services.png') }}" alt="Home Icon" width="30px"
                            style="margin-right: 5px;">
                        <span class="menu-title text-truncate" style="flex: 1; margin-right:10px">الخدمات</span>
                    </a>

                </li>


                <li class="nav-item {{ areActiveRoutes(['admin.blogs.index', 'admin.blogs.create', 'admin.blogs.edit']) }}">
                    <a class="d-flex align-items-center" href="{{ route('admin.blogs.index') }}">
                        <img src="{{ asset('dashboard/icons/employment-applications.png') }}" alt="Home Icon"
                            width="30px" style="margin-right: 5px;">
                        <span class="menu-title text-truncate" style="flex: 1; margin-right:10px">المدونات</span></a>

                </li>

                {{-- <li
                    class="nav-item {{ areActiveRoutes(['admin.projects.index', 'admin.projects.create', 'admin.projects.edit']) }}">
                    <a class="d-flex align-items-center" href="{{ route('admin.projects.index') }}">
                        <img src="{{ asset('dashboard/icons/projects.png') }}" alt="Home Icon" width="30px"
                            style="margin-right: 5px;">
                        <span class="menu-title text-truncate" style="flex: 1; margin-right:10px">المشاريع</span>
                    </a>

                </li> --}}

                {{-- <li
                    class="nav-item {{ areActiveRoutes(['admin.gallary.index', 'admin.gallary.create', 'admin.gallary.edit']) }}">
                    <a class="d-flex align-items-center" href="{{ route('admin.gallary.index') }}">
                        <img src="{{ asset('dashboard/icons/banners.png') }}" alt="Home Icon" width="30px"
                            style="margin-right: 5px;">
                        <span class="menu-title text-truncate" style="flex: 1; margin-right:10px">صور المشاريع</span>
                    </a>

                </li> --}}

                <li class="nav-item {{ areActiveRoutes(['admin.orders.index']) }}">
                    <a class="d-flex align-items-center" href="{{ route('admin.orders.index') }}">
                        <img src="{{ asset('dashboard/icons/product-orders.png') }}" alt="Home Icon" width="30px"
                            style="margin-right: 5px;">
                        <span class="menu-title text-truncate" style="flex: 1; margin-right:10px">طالبوا الخدمات</span></a>
                </li>

                <li class="nav-item {{ areActiveRoutes(['admin.subscribe.index']) }}">
                    <a class="d-flex align-items-center" href="{{ route('admin.subscribe.index') }}">
                        <img src="{{ asset('dashboard/icons/users.png') }}" alt="Home Icon" width="30px"
                            style="margin-right: 5px;">
                        <span class="menu-title text-truncate" style="flex: 1; margin-right:10px">الاشتركات</span></a>
                </li>

                <li
                    class="nav-item {{ areActiveRoutes(['admin.features.index', 'admin.features.create', 'admin.features.edit']) }}">

                    <a class="d-flex align-items-center" href="{{ route('admin.features.index') }}">
                        <img src="{{ asset('dashboard/icons/features.png') }}" alt="Home Icon" width="30px"
                            style="margin-right: 5px;">
                        <span class="menu-title text-truncate" style="flex: 1; margin-right:10px">المميزات</span>
                    </a>
                </li>


                <li
                class="nav-item {{ areActiveRoutes(['admin.client.index', 'admin.client.create', 'admin.client.edit']) }}">

                <a class="d-flex align-items-center" href="{{ route('admin.client.index') }}">
                    <img src="{{ asset('dashboard/icons/customers.png') }}" alt="Home Icon" width="30px"
                        style="margin-right: 5px;">
                    <span class="menu-title text-truncate" style="flex: 1; margin-right:10px">اراء العملاء</span>
                </a>
            </li>

                <li class="nav-item {{ areActiveRoutes(['admin.sliders.index', 'admin.sliders.create', 'admin.sliders.edit']) }}">
                   <a class="d-flex align-items-center" href="{{ route('admin.sliders.index') }}">
                    <img src="{{ asset('dashboard/icons/sliders.png') }}" alt="Home Icon" width="30px"
                        style="margin-right: 5px;">

                    <span class="menu-title text-truncate" style="flex: 1; margin-right:10px">الاسليدر</span></a>
                </li>

                <li class="nav-item {{ isActiveRoute('admin.contacts.index') }}"><a class="d-flex align-items-center"
                    href="{{ route('admin.contacts.index') }}">
                    <img src="{{ asset('dashboard/icons/contacts.png') }}" alt="Home Icon" width="30px"
                        style="margin-right: 5px;">

                    <span class="menu-title text-truncate" style="flex: 1; margin-right:10px">{{ __('رسائل التواصل') }}</span></a>
            </li>

                <li class="nav-item {{ isActiveRoute('admin.settings.create') }}"><a class="d-flex align-items-center"
                    href="{{ route('admin.settings.create') }}">
                    <img src="{{ asset('dashboard/icons/settings.png') }}" alt="Home Icon" width="30px"
                        style="margin-right: 5px;">

                    <span class="menu-title text-truncate" style="flex: 1; margin-right:10px">الاعدادات</span></a>
                </li>

            </ul>




    </div>
</div>
<!-- END: Main Menu-->
