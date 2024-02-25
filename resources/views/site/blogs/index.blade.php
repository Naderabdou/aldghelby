@extends('site.layouts.app')
@section('title', __('أهم الأخبار'))

@section('breadcrumb')
    <div class="title-page">
        <div class="main-container">
            <h2>{{__('أهم الأخبار')}}</h2>
            <div class="breadcrumb-header">
                <a href="{{ route('site.home') }}"> <i class="bi bi-house"></i>{{__('الرئيسية')}}</a>
                <i class="bi bi-chevron-double-left"></i>
                <span>{{__('أهم الأخبار')}}</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="blog-page pg-section">
        <div class="main-container">
            <div class="title-center">
                <h2>{{__('أهم الأخبار')}}</h2>
            </div>
            <div class="row  row-gap">

                    @forelse ($blogs as $blog )
                    <div class="col-lg-4 col-md-6 pg-col">
                        <div class="sub-blog-index">
                            <div class="img-blog-index">
                                <img src="{{ $blog->image_path }}">
                                <div class="date-bolg">
                                    <h3>{{$blog->created_at}}</h3>
                                </div>
                            </div>
                            <div class="text-blog-index">
                                <h2>{{ $blog->title }}</h2>
                                <p>
                                    {{ Str::limit($blog->desc, 100) }}
                                </p>
                                <a href="{{ route('site.blog.show',$blog->id) }}" class="ctm-link">{{__('قراءة المزيد')}}</a>
                            </div>
                        </div>
                    </div>
                    @empty

                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <h4>{{__('لا يوجد اخبار')}}</h4>
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
