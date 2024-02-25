@extends('dashboard.layouts.app')

@section('title', 'تعديل اسليدر')

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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}"> اسليدر </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">تعديل الاسبيدر </a>
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
                                    href="{{ route('admin.sliders.create') }}"><i class="mr-1"
                                        data-feather="check-square"></i><span class="align-middle">اضافة اسليدر
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
                                    <h2 class="card-title">تعديل صور</h2>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" id="updateBookForm"
                                        action="{{ route('admin.sliders.update', $slider->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="row">

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="desc">العنوان باللغة العربية</label>
                                                    <textarea class="form-control" name="title_ar" id="title_ar" rows="5">{{ old('title_ar',$slider->title_ar) }}</textarea>
                                                    @error('title_ar')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="desc">العنوان باللغه الانجليزيه</label>
                                                    <textarea class="form-control" name="title_en" id="title_en" rows="5">{{ old('title_en',$slider->title_en) }}</textarea>
                                                    @error('title_en')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="formFile" class="form-label">الصوره</label>
                                                    <input class="form-control image" type="file" id="formFile"
                                                        name="image" accept=".jpg,.jpeg,.png">
                                                    @error('image')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group preview-formFile">
                                                    <img src="{{ $slider->image_path }}" style="width: 100px"
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
    <script src="{{ asset('dashboard/assets/js/custom/validation/bookForm.js') }}"></script>

        <script src="{{ asset('dashboard/app-assets/js/custom/preview-image.js') }}"></script>
    @endpush
@endsection
