@extends('site.layouts.app')
@section('title', __('تفاصيل الخبر'))
@title($blog->title)
@description(Str::limit($blog->desc, 160))
@keywords(implode(',', json_decode(getSetting('keyword', app()->getLocale())->value)))
@image($blog->image_path)
@section('breadcrumb')
    <div class="title-page">
        <div class="main-container">
            <h2>{{__('تفاصيل الخبر')}}</h2>
            <div class="breadcrumb-header">
                <a href="{{ route('site.home') }}"> <i class="bi bi-house"></i>{{__('الرئيسية')}}</a>
                <i class="bi bi-chevron-double-left"></i>
                <a href="{{ route('site.blog.index') }}">{{__('أهم الأخبار')}}</a>
                <i class="bi bi-chevron-double-left"></i>
                <span>{{__('تفاصيل الخبر')}}</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="blog-details-page pg-section">
        <div class="main-container">
            <div class="row">

                <div class="col-lg-7">
                    <div class="img-blog-page">
                        <img src="{{ $blog->image_path }}">
                        <div class="date-bolg">
                            <h3>{{$blog->created_at}}</h3>
                        </div>
                    </div>
                    <div class="text-blog">
                        <h2>{{ $blog->title }}</h2>
                        <p>
                            {{ $blog->desc }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-5">
                    @if(count($popularBlogs) > 0)
                        <div class="more-details">
                            <h2>{{__('الفئات')}}</h2>
                            <ul>
                                @foreach($popularBlogs as $popularBlog)
                                    <li>
                                        <a  class="{{ $blog->id === $popularBlog->id ? "active" : "" }}" href="{{ route('site.blog.show',$popularBlog->id) }}">
                                            {{ $popularBlog->title }} <i class="bi bi-arrow-left"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <div class="notFound">
                            <img src="{{ asset('site/images/notFound.png') }}">
                            <h2>{{ __('لا يوجد أخبار آخرى') }}</h2>
                        </div>
                    @endif
                    <div class="blog-emails">
                        <h2>{{__('اشترك الان ليصلك اخر الاخبار')}}</h2>
                        <form method="POST" class="validated" id="form_subscribe">
                            @csrf
                            <div class="input-form mb-3">
                                <input type="email" placeholder="{{__('البريد الالكتروني')}}" name="email"
                                       value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror">

                            </div>
                            <button id="subscribe_submit" class="ctm-btn w-100">{{__('ارسال')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<!-- ================================ Only Page Style and Scripts ================================ -->

@push('css')
@endpush

@push('js')
@endpush
