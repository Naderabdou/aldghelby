@extends('dashboard.layouts.app')

@section('title', 'تعديل الملف الشخصي')

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- account setting page -->
                <section id="page-account-settings">
                    <div class="row">

                        <!-- right content section -->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- general tab -->
                                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                            aria-labelledby="account-pill-general" aria-expanded="true">

                                            <!-- form -->
                                            <form class="form form-vertical" id="profileForm"
                                                action="{{ route('admin.update_profile') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <h2>تعديل الملف الشخصي</h2>
                                                            <label
                                                                for="first-name-vertical">الاسم</label>
                                                            <input type="text" class="form-control" name="name"
                                                                value="{{ old('name', $user->name) }}"
                                                                placeholder=""/>
                                                            @error('name')
                                                                <span class="alert alert-danger">
                                                                    <small class="errorTxt">{{ $message }}</small>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">البريد الاكترونى</label>
                                                            <input type="email" class="form-control" name="email"
                                                                value="{{ old('email', $user->email) }}"
                                                                placeholder=""/>
                                                            @error('email')
                                                                <span class="alert alert-danger">
                                                                    <small class="errorTxt">{{ $message }}</small>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>



                                                    <div class="col-12">
                                                        <button type="submit"
                                                            class="btn btn-primary mr-1">تعديل</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!--/ form -->
                                        </div>
                                        <!--/ general tab -->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ right content section -->
                    </div>
                    <div class="row">

                        <!-- right content section -->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- general tab -->
                                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                            aria-labelledby="account-pill-general" aria-expanded="true">

                                            <!-- form -->
                                            <form class="form form-vertical" id="profileForm"
                                                action="{{ route('admin.update_profile_password') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <h2>تعديل كلمة السر</h2>
                                                            <label
                                                                for="first-name-vertical">كلمة المرور القديمة</label>
                                                            <input type="password" class="form-control" name="old_password"
                                                                placeholder=""/>

                                                            @error('old_password')
                                                                <span class="alert alert-danger">
                                                                    <small class="errorTxt">{{ $message }}</small>

                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label
                                                                for="first-name-vertical">كلمة المرور الجديدة</label>
                                                            <input type="password" class="form-control" name="password"
                                                                placeholder=""/>
                                                            @error('password')
                                                                <span class="alert alert-danger">
                                                                    <small class="errorTxt">{{ $message }}</small>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label
                                                                for="first-name-vertical">تأكيد كلمة المرور</label>
                                                            <input type="password" class="form-control" name="confirm_password"
                                                                placeholder=""/>
                                                            @error('confirm_password')
                                                                <span class="alert alert-danger">
                                                                    <small class="errorTxt">{{ $message }}</small>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit"
                                                            class="btn btn-primary mr-1">تعديل</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!--/ form -->
                                        </div>
                                        <!--/ general tab -->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ right content section -->
                    </div>
                </section>
                <!-- / account setting page -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    @push('js')
        <script src="{{ asset('dashboard/assets/js/custom/validation/profileForm.js') }}"></script>
    @endpush


@endsection
