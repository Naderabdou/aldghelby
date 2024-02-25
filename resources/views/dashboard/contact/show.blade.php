@extends('dashboard.layouts.app')

@section('title', 'رسائل التواصل')

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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.contacts.index') }}">رسائل التواصل</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#"> الرد على الرسائل</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ $contact->name  }} </h4>
                                <div class="card-subtitle text-muted mb-2">{{ $contact->email }}</div>
                                <p class="card-text">{{ $contact->message }}</p>
                                <a href="{{ route('admin.contacts.reply', $contact->id) }}" class="btn btn-outline-primary">الرد</a>
                            </div>
                            @php
                                \Carbon\Carbon::setLocale('ar')
                            @endphp
                            <div class="card-footer text-muted">{{ $contact->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
