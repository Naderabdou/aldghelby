@extends('dashboard.layouts-auth.app')

@section('title', 'تغيير كلمة السر')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2">
                    <div class="auth-inner py-2">
                        <!-- Reset Password v1 -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="{{ route('site.home') }}" class="brand-logo">
                                    <img src="{{ asset('site/images/logo.png') }}" width="200px" alt="">
                                </a>

                                <h4 class="card-title mb-1">تغيير كلمة المرور 🔒</h4>
                                <p class="card-text mb-2">يجب أن تكون كلمة مرورك الجديدة مختلفة عن كلمات المرور المستخدمة
                                    سابقًا</p>

                                <form class="auth-reset-password-form mt-2" action="{{ route('admin.updatePassword') }}"
                                    method="POST">
                                    @csrf

                                    <input type="hidden" value="{{ $code }}" name="code" id="">

                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="password">كلمة السر الجديدة</label>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge" id="password"
                                                name="password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password" tabindex="1" autofocus />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i
                                                        data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                        @error('password')
                                            <span class="alert alert-danger">
                                                <small class="errorTxt">{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="confirm_password">تأكيد كلمة المرور</label>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge"
                                                id="confirm_password" name="confirm_password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="confirm_password" tabindex="2" />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i
                                                        data-feather="eye"></i></span>
                                            </div>
                                            @error('confirm_password')
                                                <span class="alert alert-danger">
                                                    <small class="errorTxt">{{ $message }}</small>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-block" tabindex="3">تعيين كلمة مرور جديدة</button>
                                </form>

                                <p class="text-center mt-2">
                                    <a href="page-auth-login-v1.html"> <i data-feather="chevron-left"></i> العودة إلى تسجيل
                                        الدخول </a>
                                </p>
                            </div>
                        </div>
                        <!-- /Reset Password v1 -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
