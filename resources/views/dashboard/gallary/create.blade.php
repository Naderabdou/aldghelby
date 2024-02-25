@extends('dashboard.layouts.app')

@section('title', 'اضافه صور جديده')

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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.gallary.index') }}"> الصور </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">اضافة صور </a>
                                    </li>
                                </ol>
                            </div>
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
                                    <h2 class="card-title">اضافة صور</h2>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" id="createBookForm"
                                        action="{{ route('admin.gallary.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="select-country">المشاريع</label>
                                                    <select class="form-control select2" id="select-country"
                                                        name="project_id">
                                                        <option value="">اختر المشروع</option>
                                                        @foreach ($projects as $project)
                                                            <option value="{{ $project->id }}"
                                                                {{ old('project_id') == $project->id ? 'selected' : '' }}>
                                                                {{ $project->name_ar }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                @error('project_id')
                                                <span class="alert alert-danger">
                                                    <small class="errorTxt">{{ $message }}</small>
                                                </span>
                                            @enderror
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="formFile" class="form-label">الصوره</label>
                                                    <input class="form-control image image_Slider" type="file"
                                                        id="files" name="image[]" accept=".jpg,.jpeg,.png" required
                                                        multiple>
                                                    @error('image')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group preview-formFile upload-img image-container">
                                                    <img src="" style="width: 100px"
                                                        class="img-thumbnail image-preview" alt="">
                                                </div>


                                            </div>




                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1">اضافة</button>
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
        <script src="{{ asset('dashboard/app-assets/js/custom/preview-multi-image.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/custom/validation/bookForm.js') }}"></script>


        <script>
            $('.select2').select2({
                dir: "rtl",
                language: "ar",
                placeholder: "اختر المشروع",
                allowClear: true,
                width: '100%'
            });


            $(document).on('click', '.remove-btn', function(e) {
                e.preventDefault();
                $(this).closest('.row').remove();
            });

            $('.add-btn').click(function(e) {
                e.preventDefault();
                var content = `<div class="row my-2">
                                    <div class="col-md-8">
                                        <input type="text" name="keywords[]"
                                            class="form-control"
                                            value="">
                                    </div>
                                    <div class="col-md-4">
                                        <a class="btn btn-danger remove-btn">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>
                                </div>`;
                $(this).parent().prepend(content);
            });
        </script>
    @endpush
@endsection
