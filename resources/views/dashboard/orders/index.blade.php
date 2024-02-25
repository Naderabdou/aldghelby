@extends('dashboard.layouts.app')

@section('title', ' طالبوا الخدمات')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">

                    <div class="d-flex justify-content-start breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb ml-1">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسيه</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">طالبوا الخدمات</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">العرض</li>
                            </ol>
                        </nav>
                    </div>


                </div>

            </div>
            <div class="content-body">
                <!-- Basic table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            {{-- <form method="post" action="{{ route('admin.services.bulk_delete') }}" style="display: inline-block;">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="record_ids" class="record-ids">
                                <button type="submit" class="btn btn-relief-danger all_delete" id="bulk-delete" disabled="true">

                                    حذف مجموعة
                                    <i
                                        class="fa-solid fa-trash-can"></i>
                                </button>
                            </form><!-- end of form --> --}}


                            {{-- <form method="post" action="{{route('admin.services.status')}}" style="display: inline-block;" id="status_sliders">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="record_ids" class="record-ids">
                                <button  type="submit" id="status_id"  class="btn btn-relief-success all_status"  disabled="disabled">


                                    تغير الحاله
                                    <i data-feather='edit'></i></button>

                            </form><!-- end of form --> --}}

                            <div class="card">
                                <div class="table-section">
                                    <table class="datatables-basic table">
                                        <thead>
                                            <tr>
                                                {{-- <th>
                                                <div class="animated-checkbox">
                                                    <label class="m-0">
                                                        <input type="checkbox" id="record__select-all">
                                                        <span class="label-text"></span>
                                                    </label>
                                                </div>
                                            </th> --}}
                                                <th>#</th>
                                                <th>الاسم بالكامل</th>

                                                <th>الهاتف</th>

                                                <th>البريد الاكتروني</th>
                                                <th>الرساله</th>
                                                <th>اسم الخدمة</th>
                                                <th>الاجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    {{-- <td class="animated-checkbox">
                                                    <label class="m-0">
                                                        <input type="checkbox" class="record__select" value="{{ $service->id }}">
                                                        <span class="label-text"></span>
                                                    </label>
                                                </td> --}}
                                                    <td>{{ $loop->iteration }}</td>

                                                    <td>{{ $order->name }}</td>
                                                    <td>
                                                        <a href="tel:{{ $order->phone }}">{{ $order->phone }}</a>
                                                    </td>
                                                    <td>
                                                        <a href="mailTo:{{ $order->email }}">{{ $order->email }}</a>
                                                    </td>
                                                    <td>{{ strip_tags(\Str::limit($order->message, 50, '...')) }}


                                                    <td>{{ $order->service->name }}</td>
                                                    </td>


                                                    {{-- <td>
                                                        <a href="{{ route('admin.servicesCategories.index') }}">
                                                            {{ $service->category->name }}
                                                        </a>
                                                    </td> --}}

                                                    {{-- <td class="image">
                                                        <a href="{{ $service->image_path }}">
                                                            <img src="{{ $service->image_path }}"
                                                                style="width: 80px; height: auto;">
                                                        </a>
                                                    </td> --}}


                                                    <td class="text-center">
                                                        <div class="btn-group" role="group" aria-label="Second group">
                                                            <a href="#" class="btn btn-info btn-circle btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#exampleModalLong{{ $order->id }}">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a href="{{ route('admin.orders.destroy', $order->id) }}"
                                                                data-id="{{ $order->id }}"
                                                                class="btn btn-sm btn-danger item-delete"><i
                                                                    class="fa-solid fa-trash-can"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>


                                                <div class="modal fade" id="exampleModalLong{{ $order->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                                    {{ __('تفاصيل طالب الخدمة') }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-12">

                                                                        <div class="row">
                                                                            <div class="col-lg-5">
                                                                                <b>{{ __('الاسم بالكامل') }} : </b>
                                                                            </div>
                                                                            <div class="col-lg-7">

                                                                                {{ $order->name }}
                                                                            </div>
                                                                        </div>




                                                                        <div class="row">
                                                                            <div class="col-lg-5">
                                                                                <b>{{ __('الهاتف') }} : </b>
                                                                            </div>
                                                                            <div class="col-lg-7">
                                                                                {{ $order->phone }}
                                                                            </div>
                                                                        </div>


                                                                        <div class="row">
                                                                            <div class="col-lg-5">
                                                                                <b>{{ __('الايميل') }} : </b>
                                                                            </div>
                                                                            <div class="col-lg-7">
                                                                                {{ $order->email }}
                                                                            </div>
                                                                        </div>


                                                                        <div class="row">
                                                                            <div class="col-lg-5">
                                                                                <b>{{ __('الرسالة') }} : </b>
                                                                            </div>
                                                                            <div class="col-lg-7">
                                                                                {{ $order->message }}
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-lg-5">
                                                                                <b>{{ __('اسم الخدمه ') }} : </b>
                                                                            </div>
                                                                            <div class="col-lg-7">
                                                                                {{  $order->service->name  }}
                                                                            </div>
                                                                        </div>



                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary"
                                                                    data-dismiss="modal">{{ __('إغلاق') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Basic table -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
    @push('js')
        <script src="{{ asset('dashboard/app-assets/js/custom/custom-delete.js') }}"></script>
    @endpush
@endsection
