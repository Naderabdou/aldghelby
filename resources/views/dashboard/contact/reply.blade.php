@extends('dashboard.layouts.app')

@section('title' , 'الرسائل')

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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.contacts.index') }}">الرسائل</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">ارسال رد للعميل</a>
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
                                    <h2 class="card-title">إرسال رد للعميل</h2>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" id="replyForm" action="{{ route('admin.contacts.sendReply') }}" method="POST">
                                        @csrf

                                        <input type="hidden" value="{{ $contact->email }}" name="email">
                                        <input type="hidden" value="{{ $contact->id }}" name="id">

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="reply" cols="30" rows="10" required></textarea>
                                                    @error('reply')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-outline-primary">إرسال</button>
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
        <script src="{{ asset('dashboard/assets/js/custom/validation/replyForm.js') }}"></script>
    @endpush
@endsection


