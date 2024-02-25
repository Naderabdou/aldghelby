@extends('dashboard.layouts.app')

@section('title', 'تعديل القيمة')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.values.index') }}"> القيمة </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">تعديل القيمة </a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                    href="{{ route('admin.values.create') }}"><i class="mr-1"
                                        data-feather="check-square"></i><span class="align-middle">اضافة القيمة
                                        جديد</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic Vertical form layout section start -->
                <section id="basic-vertical-layouts">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="card-title">تعديل القيمة </h2>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" id="createBookForm"
                                        action="{{ route('admin.values.update', $value->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="row">

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="title_ar">الاسم بالعربي</label>
                                                    <input type="text" id="title_ar" class="form-control"
                                                        name="title_ar" required value="{{ old('title_ar',$value->title_ar) }}" />
                                                    @error('title_ar')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="title_en">الاسم بالانجليزي</label>
                                                    <input type="text" id="title_en" class="form-control"
                                                        name="title_en" required value="{{ old('title_en',$value->title_en) }}" />
                                                    @error('title_en')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="desc">الوصف بالعربي</label>
                                                    <textarea class="form-control" name="services_ar" id="description_ar" rows="5" required>{{ old('services_ar',$value->services_ar) }}</textarea>
                                                    @error('services_ar')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="desc">الوصف بالانجليزي</label>
                                                    <textarea class="form-control" name="services_en" id="description_en" rows="5" required>{{ old('services_en',$value->services_en) }}</textarea>
                                                    @error('services_en')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>




                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="formFile" class="form-label">الايقونه</label>
                                                    <input class="form-control image" type="file" id="formFile"
                                                        name="icon" accept=".jpg,.jpeg,.png">
                                                    @error('icon')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group prev">
                                                    <img src="{{ $value->icon_path }}" style="width: 100px"
                                                        class="img-thumbnail preview-formFile" alt="">
                                                </div>
                                            </div>






                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1">تعديل</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Vertical form layout section end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    @push('js')
        <script src="{{ asset('dashboard/app-assets/js/custom/preview-image.js') }}"></script>
    @endpush
@endsection
