@extends('site.layouts.app')
@section('title', __('خدمات المكتب'))
@title(getSetting('seo_title', app()->getLocale())->value)
@description(Str::limit(getSetting('desc_seo', app()->getLocale())->value, 160))
@keywords(implode(',', json_decode(getSetting('keyword', app()->getLocale())->value)))
@image(asset(getSetting('logo', app()->getLocale())->value))
@section('breadcrumb')
    <div class="title-page">
        <div class="main-container">
            <h2>{{__('خدمات المكتب')}}</h2>
            <div class="breadcrumb-header">
                <a href="{{ route('site.home') }}"> <i class="bi bi-house"></i> {{__('الرئيسية')}} </a>
                <i class="bi bi-chevron-double-left"></i>
                <span>{{__('خدمات المكتب')}}</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="services-page pg-section">
        <div class="main-container">
            <div class="title-center pb-4">
                <h2>{{__('خدمات المكتب القانونية')}}</h2>
            </div>
            <div class="main-services-index" data-scroll data-scroll-direction="horizontal"
                 data-scroll-speed="1.5">
                 @forelse ($services as $service)
                 <div class="sub-services-index">
                    <div class="img-services-index">
                        <img src="{{ $service->icon_path }}" alt="">
                    </div>
                    <div class="text-services-index">
                        <h2> {{ $service->name }} </h2>
                        <p>
                            {{ Str::limit($service->desc, 150) }}
                        </p>
                    </div>
                    <a href="{{ route('site.service.show',$service->id) }}"><i class="bi bi-arrow-left"></i></a>
                </div>

                 @empty
                 <div class="notFound">
                    {{-- <img src="{{ asset('site/images/not.png') }}"> --}}
                    <img src="{{ asset('site/images/notFound.png') }}">

                    <h2>{{ __('لايوجد خدمات') }} </h2>
                </div>

                 @endforelse



            </div>
        </div>
    </section>
@endsection

<!-- ================================ Only Page Style and Scripts ================================ -->
@push('css')
@endpush

@push('js')
@endpush
